<?php

namespace common\models;

use yii\db\ActiveRecord;

class MyActiveRecords extends ActiveRecord
{
	/**
	 * @return false|string
	 */
	public function getDateTime()
	{
		return $this->time ? date('d.m.Y', $this->time) : '';
	}

	/**
	 * @param $date
	 */
	public function setDateTime($date)
	{
		$this->time = $date ? strtotime($date) : null;
	}
}
