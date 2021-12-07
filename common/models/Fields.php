<?php

namespace common\models;

//use Yii;

class Fields
{
	//определение локальных констант
	const TAB_NEWS = 'News';
	const TAB_DOCS_GROUP = 'Docs_group';
	const TAB_OPEN_DOCS = 'Open_docs';

	/**
	 * @param     $tableName
	 *
	 * @return array|array[]|null
	 */
	static public function getRules($tableName) {
		if ($tableName == self::TAB_NEWS) {
			return [
				[['news_date', 'pub_date_start', 'pub_date_end'], 'safe'],
				[['news_text', 'news_anons'], 'string'],
				[['published'], 'boolean'],
			];
		}

		if ($tableName == self::TAB_DOCS_GROUP) {
			return [
				[['name_group', 'dir_group'], 'required'],
				[['name_group', 'dir_group'], 'string'],
				[['dir_group'], 'unique'],
				[['name_group'], 'unique'],
			];
		}

		if ($tableName == self::TAB_OPEN_DOCS) {
			return [
				[['docs_group_id', 'system_file_name'], 'required'],
				[['docs_group_id'], 'default', 'value' => null],
				[['docs_group_id'], 'integer'],
				[['original_file_name', 'system_file_name'], 'string'],
				[['pub_date_start', 'pub_date_end'], 'safe'],
				[['docs_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => DocsGroup::class, 'targetAttribute' => ['docs_group_id' => 'id']],
			];
		}

		return null;
	}

	/**
	 * @param $tableName
	 *
	 * @return string[]|null
	 */
	static public function getAttributes($tableName) {
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
				'name_group' => 'Name Group',
				'dir_group' => 'Dir Group',
			];
		}

		if ($tableName == self::TAB_OPEN_DOCS) {
			return [
				'id' => 'ID',
				'docs_group_id' => 'Docs Group ID',
				'original_file_name' => 'Original File Name',
				'system_file_name' => 'System File Name',
				'pub_date_start' => 'Pub Date Start',
				'pub_date_end' => 'Pub Date End',
			];
		}

		return null;
	}
}
