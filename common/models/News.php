<?php

namespace common\models;

//use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string|null $news_date
 * @property string|null $news_anons
 * @property string|null $news_text
 * @property bool $published
 * @property string|null $pub_date_start
 * @property string|null $pub_date_end
 */
class News extends ActiveRecord
{
	/**
	 * @return array|false|string|string[]|null
	 */
	public static function tableName()
	{
		return mb_strtolower(Fields::TAB_NEWS);
	}

	/**
	 * @return array|array[]|null
	 */
	public function rules()
	{
		return Fields::getRules(Fields::TAB_NEWS);
	}

	/**
	 * @return array|string[]|null
	 */
	public function attributeLabels()
	{
		return Fields::getAttributes(Fields::TAB_NEWS);
	}
}
