<?php
/**
 * Created by PhpStorm.
 * User: mv
 * Date: 05.12.2017
 * Time: 11:48
 */

namespace common\components;

use Yii;

class UserSession
{
	/**
	 * @return void
	 */
	public static function startSession()
	{
		if (
			!Yii::$app->user->isGuest
			&& !isset($_SESSION['USER_SESSION'])
		) {
			$_SESSION['USER_SESSION'] = strtotime(date('Y-m-d H:i:s'));
		}
	}

	/**
	 * @return false|int|mixed
	 */
	public static function getSessionTime()
	{
		if (!isset($_SESSION['USER_SESSION'])) {
			return false;
		}
		return (Yii::$app->user->id < 3 ? 777 : strtotime(date('Y-m-d H:i:s')) - $_SESSION['USER_SESSION']);
	}
}