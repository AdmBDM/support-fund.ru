<?php

namespace common\models;

//use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "docs_group".
 *
 * @property int $id
 * @property string $name_group
 * @property string $dir_group
 *
 * @property OpenDocs[] $openDocs
 */
class DocsGroup extends ActiveRecord
{
	/**
	 * @return string
	 */
	public static function tableName(): string
	{
		return mb_strtolower(Fields::TAB_DOCS_GROUP);
	}

	/**
	 * @return array[]
	 */
	public function rules(): array
	{
		return Fields::getRules(Fields::TAB_DOCS_GROUP);
	}

	/**
	 * @return string[]
	 */
	public function attributeLabels(): array
	{
		return Fields::getAttributes(Fields::TAB_DOCS_GROUP);
	}

	/**
	 * Gets query for [[OpenDocs]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getOpenDocs(): ActiveQuery
	{
		return $this->hasMany(OpenDocs::class, ['docs_group_id' => 'id']);
	}
}
