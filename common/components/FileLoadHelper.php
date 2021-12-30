<?php
/**
 * Created by PhpStorm.
 * User: mv
 * Date: 06.11.2017
 * Time: 16:48
 */

namespace common\components;

use common\models\OpenDocs;
use common\models\UkpFiles;
use Yii;


class FileLoadHelper
{

	const DEFAULT_EXT = 'no-ext';

	/**
	 * генерация случайной 32-байтной строки
	 *  - md5(time())
	 *  - bin2hex(openssl_random_pseudo_bytes(16))
	 *  - uniqid($prefix, true)
	 *
	 * @param string $prefix
	 * @return string
	 */
	private static function generateFilename(string $prefix = ''): string
	{
//		return uniqid($prefix, true);
		return $prefix . bin2hex(openssl_random_pseudo_bytes(16));
	}

	/**
	 * @param string $curGr
	 * @return string
	 */
	public static function getDocsPath(string $curGr = '0'): string
	{
//		return '/' .
		return '' .
			Yii::$app->params['dir']['files'] .
			Yii::$app->params['dir']['docs'] .
			$curGr . '/';
	}


/* --------------- модули для до(пере)работки --------------- */

	/**
	 * @param int $fileId
	 * @param $options
	 * @return mixed
	 */
	public static function getFileData(int $fileId, $options)
	{
		$document = UkpFiles::find()->where('id=' . $fileId)->one();
		if ($document) {
			$fileData = self::getFileExt($document->system_file_name);
			$options['data-filename'] = $document->original_file_name . '.' . $document->file_ext ;
			$options['data-fileid'] = $document->id;
		}
		return $options;
	}

	/**
	 * Загружает файл на сервер
	 *
	 * @param      $files           ; глобальный массив $_FILES
	 * @param      $field           ; поле для обработки в $_FILES
	 * @param      $docName         ; название документа
	 * @param      $declarantId     ; номер заявления
	 * @param int  $mode            ; права доступа к файлу
	 *
	 * @return bool|int
	 */
	public static function loadFiles(
		  $files
		, $field
	    , $docName
	    , $declarantId
	    , $model
	    , $mode = 0755
	)
	{
		if (!isset($files) || !isset($files['name'][$field])) {
			// Если не были загружены файлы
			self::$error = 'файлы не были загружены.';
			return false;
		}
		$fileError = $files['error'][$field] ?: null;

		// В случае если файл был загружен ранее, то на текущем шаге файл не передается
		// В этом случае не загружаем файл заново, а отдаем данные по ранее загруженному
		if ($fileError == UPLOAD_ERR_NO_FILE && $model->$field) {
			$loadedDocument = UkpFiles::findOne(['id' => (int)$model->$field]);
			self::$error = false;
			if (!$loadedDocument) {
				return false;
			}
			return $loadedDocument->id;
		}

		if (
			$fileError != UPLOAD_ERR_OK
			&& $fileError != UPLOAD_ERR_NO_FILE
			// Если файл был загружен ранее, то на текущем шаге файл отсутствует
			// в этом случае ошибка UPLOAD_ERR_NO_FILE не мешает
			//&& ($fileError == UPLOAD_ERR_NO_FILE && !$model->$field)
		) {
			// если файл не был корректно загружен
			switch ($fileError) {
				case UPLOAD_ERR_INI_SIZE:
					self::$error = 'Размер файла превышает максимально допустимый';
					break;
				case UPLOAD_ERR_FORM_SIZE:
					self::$error = 'Размер загружаемого файла превысил значение MAX_FILE_SIZE, указанное в HTML-форме';
					break;
				case UPLOAD_ERR_PARTIAL:
					self::$error = 'Загружаемый файл был получен только частично';
					break;
				case UPLOAD_ERR_NO_FILE:
					self::$error = 'Файл не был загружен';
					break;
				case UPLOAD_ERR_NO_TMP_DIR:
					self::$error = 'Отсутствует временная папка для загрузки файла';
					break;
				case UPLOAD_ERR_CANT_WRITE:
					self::$error = 'Не удалось записать файл на диск';
					break;
				case UPLOAD_ERR_EXTENSION:
					self::$error = 'PHP-расширение остановило загрузку файла';
					break;
				default:
					self::$error = 'Неизвестная ошибка при загрузке файла';
			}
			return false;
		}
		$fileType = $files['type'][$field];
		$fileSize = $files['size'][$field];
		$modelRules = $model->rules();
		foreach ($modelRules as $modelRule) {
			if (
				$modelRule['0'] == $field
				&& $modelRule['1'] == 'file'
				&& $fileSize > $modelRule['maxSize']
			) {
				self::$error = $modelRule['message'];
				return false;
			}
		}
		$fileNameWithExtension = $files['name'][$field];
		if ($fileNameWithExtension == '') {
			self::$error = false;
			return false;
		}

		// убираем расширение имени файла для совместимости со старыми заявлениями
		$fileData = self::getFileExt($fileNameWithExtension);
		$fileName = $fileData['name'];
		$fileExt = $fileData['ext'];
		$fileTmpName = $files['tmp_name'][$field];

		// сохраняем файл на сервере
		$file = file_get_contents($fileTmpName);
		$filename = self::generateFilename('loaded.');
		$path = self::getDocsPath();
		$rootSitePath = $path . $filename . '.' . $fileExt;
		file_put_contents($rootSitePath, $file, FILE_APPEND);
		//@todo: раскомментировать следующую строку
//		chmod($path, $mode);

		// Сохраняем в базе запись
		$loadedDocument = new OpenDocs();
//		$loadedDocument->declarant_id = $declarantId;
		// название документа
//		$loadedDocument->name = $docName;
		// название файла у пользователя
		$loadedDocument->original_file_name = $fileName;
//		$loadedDocument->upload = '1';
		// название файла на сервере
		$loadedDocument->system_file_name = $filename;
		$loadedDocument->file_ext = $fileExt;
//        $loadedDocument->created_at = date('Y-m-d H:i:s');
		$result = $loadedDocument->save();
		if (!$result) {
			// Ошибка при сохранении записи о документе
			self::$error = 'невозможно сохранить файл';
			return false;
		}
		self::$error = false;
		return $loadedDocument->id;
	}

	/**
	 * Возвращает полный путь к файлу по идентификатору
	 *
	 * @param int $fileId ; Идентификатор файла
	 *
	 * @return bool|string
	 */
	public static function getDocFullpath(int $fileId)
	{
		if (!$fileId) {
			return false;
		}
		$model = OpenDocs::findOne($fileId);
//		$user = Yii::$app->user->identity;
//		if ($model && $user->is_operator || $model->declarant->user_id == $user->id) {
		if ($model) {
			return self::getDocsPath() . $model->system_file_name . '.' . $model->file_ext;
		}
		return false;
	}

	/**
	 * @param int $fileId
	 * @return void
	 */
	public static function getDocument(int $fileId)
	{
		$model = OpenDocs::findOne($fileId);
//		$user = Yii::$app->user->identity;
//		if ($user->is_operator || $model->declarant->user_id == $user->id) {
//			$array = mb_split('\.', $model->scan);
			Yii::$app->response->SendFile(
				self::getDocsPath() . $model->system_file_name . '.' . $model->file_ext,
				$model->original_file_name . '.' . $model->file_ext
			);
//		}
	}

	/**
	 * @param $fileNameWithExtension
	 * @return array
	 */
	public static function getFileExt($fileNameWithExtension): array
	{
		$pos = strrpos($fileNameWithExtension, '.'); // поиск позиции точки с конца строки
		if (!$pos) {
//			return $fileNameWithExtension; // если точка не найдена - возвращаем строку
//			return self::DEFAULT_EXT; // если точка не найдена - возвращаем строку-по-умолчанию
			$fileName = $fileNameWithExtension;
			$fileExt = self::DEFAULT_EXT;
		} else {
			$fileName = substr($fileNameWithExtension, 0, $pos);
			$fileExt = substr($fileNameWithExtension,$pos + 1);
		}
		return [
			'name' => $fileName,
			'ext' => $fileExt,
		];
	}

	private static $error;

	public static function getError()
	{
		return self::$error;
	}
}