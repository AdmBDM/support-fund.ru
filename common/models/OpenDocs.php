<?php

namespace common\models;

//use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * This is the model class for table "open_docs".
 *
 * @var UploadedFile
 * Здесь хранится экземпляр класса UploadedFile
 *
 * @property int $id
 * @property int $docs_group_id
 * @property string $original_file_name
 * @property string $system_file_name
 * @property string $pub_date_start
 * @property string|null $pub_date_end
 * @property string $file_ext
 * @property string $image
 * @property integer $image_id
 *
 * @property DocsGroup $docsGroup
 */
class OpenDocs extends ActiveRecord
{

	public $imageFile;

	/**
	 * @return string
	 */
	public static function tableName(): string
	{
		return mb_strtolower(Fields::TAB_OPEN_DOCS);
	}

	/**
	 * @return array
	 */
	public function rules(): array
	{
		return Fields::getRules(Fields::TAB_OPEN_DOCS);
	}

	/**
	 * @return string[]
	 */
	public function attributeLabels(): array
	{
		return Fields::getAttributes(Fields::TAB_OPEN_DOCS);
	}

	/**
	 * Gets query for [[DocsGroup]].
	 *
	 * @return ActiveQuery
	 */
	public function getDocsGroup(): ActiveQuery
	{
		return $this->hasOne(DocsGroup::class, ['id' => 'docs_group_id']);
	}
}
