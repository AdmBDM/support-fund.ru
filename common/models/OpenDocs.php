<?php

namespace common\models;

//use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "open_docs".
 *
 * @property int $id
 * @property int $docs_group_id
 * @property string $original_file_name
 * @property string $system_file_name
 * @property string $pub_date_start
 * @property string|null $pub_date_end
 *
 * @property int $curGr
 *
 * @property DocsGroup $docsGroup
 */
class OpenDocs extends ActiveRecord
{
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
