<?php

namespace common\models;

class Fields
{
	//определение локальных констант
	const TAB_NEWS = 'News';
	const TAB_DOCS_GROUP = 'Docs_group';
	const TAB_OPEN_DOCS = 'Open_docs';
	const TAB_SF_FILES = 'Sf_files';
	const TAB_USER = 'User';
	const FORM_LOGIN = 'Login';

	/**
	 * @param	$tableName
	 *
	 * @return array|array[]|false|string[]
	 */
	static public function getRules($tableName)
	{
		if ($tableName == self::TAB_NEWS) {
			return [
				[['news_date', 'pub_date_start', 'pub_date_end'], 'safe'],
				[['news_text', 'news_anons'], 'string'],
				[['published'], 'boolean'],
			];
		}

		if ($tableName == self::TAB_DOCS_GROUP) {
			return [
				[['name_group', 'short_name_group', 'dir_group'], 'required'],
				[['name_group', 'short_name_group', 'dir_group'], 'string'],
				[['dir_group'], 'unique'],
				[['name_group'], 'unique'],
			];
		}

		if ($tableName == self::TAB_OPEN_DOCS) {
			return [
				[['docs_group_id', 'system_file_name'], 'required'],
				[['docs_group_id', 'image_id'], 'default', 'value' => 0],
				[['docs_group_id', 'image_id'], 'integer'],
				[['original_file_name', 'system_file_name', 'image'], 'string'],
				['file_ext', 'string', 'min' => 2, 'max' => 7],
				[['pub_date_start', 'pub_date_end', 'image', 'imageFile'], 'safe'],
				[['docs_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => DocsGroup::class, 'targetAttribute' => ['docs_group_id' => 'id']],
			];
		}

		if ($tableName == self::TAB_SF_FILES) {
			return [
				[['full_path', 'internal_file_name', 'external_file_name', 'file_ext', 'controller'], 'string'],
				[['when_add', 'when_ed'], 'safe'],
			];
		}

		if ($tableName == self::TAB_USER) {
			return [
				['status', 'default', 'value' => User::STATUS_INACTIVE],
				['status', 'in', 'range' => [User::STATUS_ACTIVE, User::STATUS_INACTIVE, User::STATUS_DELETED]],
				['username', 'string'],
				['password_hash', 'string'],
				[['pswd_hash', 'pswd', ], 'string'],
				['password_reset_token', 'string'],
				['verification_token', 'string'],
				['email', 'email'],
				['auth_key', 'string'],
				['created_at', 'integer'],
				['updated_at', 'integer'],
				['phone_number', 'string'],
				['admin', 'boolean'],
				['oper', 'boolean'],
				[['username', 'password_hash', 'password_reset_token', 'verification_token', ], 'safe'],
				[['email', 'auth_key', 'status', 'created_at', 'updated_at', ], 'safe'],
				[['phone_number', 'admin', 'oper', 'when_ed', ], 'safe'],
			];
		}

		if ($tableName == self::FORM_LOGIN) {
			return [
//				// username and password are both required
				[['username', 'password'], 'required'],
				// phone_number and password are both required
//				[['phone_number', 'password'], 'required'],
				// rememberMe must be a boolean value
				['rememberMe', 'boolean'],
				// password is validated by validatePassword()
				['password', 'validatePassword'],
			];
		}

		// возвращаем, если объект не описан
		return false;
	}

	/**
	 * @param $tableName
	 *
	 * @return false|string[]
	 */
	static public function getAttributes($tableName)
	{
		if ($tableName == self::TAB_NEWS) {
			return [
				'id' => 'ID',
				'news_date' => 'Дата',
				'news_anons' => 'Анонс',
				'news_text' => 'Полный текст',
				'published' => 'Опубликовано',
				'pub_date_start' => 'Начало публикации',
				'pub_date_end' => 'Окончание публикации',
			];
		}

		if ($tableName == self::TAB_DOCS_GROUP) {
			return [
				'id' => 'ID',
				'name_group' => 'Наименование',
				'short_name_group' => 'Наименование кратко',
				'dir_group' => 'Каталог',
			];
		}

		if ($tableName == self::TAB_OPEN_DOCS) {
			return [
				'id' => 'ID',
				'docs_group_id' => 'Группа',
				'original_file_name' => 'Наименование документа',
				'system_file_name' => 'Имя файла',
				'file_ext' => 'Тип файла',
				'pub_date_start' => 'Дата начала публикации',
				'pub_date_end' => 'Дата окончания публикации',
				'image' => 'Полный путь',
				'image_id' => 'ID файла',
			];
		}

		if ($tableName == self::TAB_SF_FILES) {
			return [
				'id' => 'ID',
				'full_path' => 'Full Path',
				'internal_file_name' => 'Internal File Name',
				'external_file_name' => 'External File Name',
				'file_ext' => 'File Ext',
				'controller' => 'Controller',
				'when_add' => 'When Add',
				'when_ed' => 'When Ed',
			];
		}

		if ($tableName == self::TAB_USER) {
			return [
				'id' => 'ID',
				'username' => 'Имя пользователя',
				'auth_key' => 'Ключ авторизации',
				'password_hash' => 'Хэш пароля',
				'password_reset_token' => 'Токен замены пароля',
				'email' => 'Эл.почта',
				'status' => 'Статус',
				'created_at' => 'Создан',
				'updated_at' => 'Изменён',
				'verification_token' => 'Токен проверки',
				'phone_number' => 'Мобильный',
				'admin' => 'Админ',
				'oper' => 'Оператор',
				'image' => 'Фото',
				'when_ed' => 'Редакция',
			];
		}

		if ($tableName == self::FORM_LOGIN) {
			return [
				'username' => 'Имя пользователя',
				'email' => 'Эл.почта',
				'phone_number' => 'Мобильный',
				'password' => 'Пароль',
				'rememberMe' => 'Запомнить меня',
			];
		}

		// возвращаем, если объект не описан
		return false;
	}
}
