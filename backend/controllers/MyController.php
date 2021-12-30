<?php

namespace backend\controllers;

use common\components\UserSession;
use yii\filters\AccessControl;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class MyController extends Controller
{
	/**
	 * @return array
	 */
	public function behaviors(): array
	{
		return array_merge(
			parent::behaviors(),
			[
				'access' => [
					'class' => AccessControl::class,
					'rules' => [
						[
							'actions' => ['login', 'error'],
							'allow' => true,
							'roles' => ['?']
						],
						[
							'actions' => ['login', 'error', 'create-user', 'params', 'session',],
							'allow' => true,
						],
						[
							'actions' => ['logout', 'index', 'session', 'view', 'update', 'create', 'generate-pswd',],
							'allow' => true,
							'roles' => ['@'],
						],
//						[
//							'actions' => ['login', 'error'],
//							'allow' => true,
//						],
//						[
//							'actions' => ['logout', 'index'],
//							'allow' => true,
//							'roles' => ['@'],
//						],
					],
				],
			]
		);
	}

	/**
	 * @param $action
	 * @return bool
	 * @throws BadRequestHttpException
	 */
	public function beforeAction($action): bool
	{
		UserSession::startSession();
		return parent::beforeAction($action);
	}
}