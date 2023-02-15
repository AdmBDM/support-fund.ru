<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "ukp_files".
 *
 * @property int $id
 * @property string $full_path
 * @property string $internal_file_name
 * @property string $external_file_name
 * @property string $file_ext
 * @property string|null $controller
 * @property string|null $when_add
 * @property string|null $when_ed
 */
class UkpFiles extends ActiveRecord
{
	/**
	 * @return string
	 */
	public static function tableName(): string
	{
		return mb_strtolower(Fields::TAB_UKP_FILES);
	}

	/**
	 * @return array[]
	 */
	public function rules(): array
	{
		return Fields::getRules(Fields::TAB_UKP_FILES);
	}

	/**
	 * @return array
	 */
	public function attributeLabels(): array
	{
		return Fields::getAttributes(Fields::TAB_UKP_FILES);
	}
}
