<?php

namespace backend\controllers;

use common\models\User;
use Throwable;
use Yii;
use yii\base\Exception;
use yii\data\ActiveDataProvider;
use yii\db\StaleObjectException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
//class UserController extends MyController
{
	/**
	 * @return array
	 */
	public function behaviors(): array
	{
		return array_merge(
			parent::behaviors(),
			[
				'verbs' => [
					'class' => VerbFilter::class,
					'actions' => [
						'delete' => ['POST'],
					],
				],
			]
		);
	}

	/**
	 * Lists all User models.
	 * @return string
	 */
	public function actionIndex(): string
	{
		$dataProvider = new ActiveDataProvider([
			'query' => User::find(),
			/*
			'pagination' => [
				'pageSize' => 50
			],
			'sort' => [
				'defaultOrder' => [
					'id' => SORT_DESC,
				]
			],
			*/
		]);

		return $this->render('index', [
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single User model.
	 *
	 * @param int $id
	 *
	 * @return string
	 * @throws NotFoundHttpException
	 */
	public function actionView(int $id): string
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new User model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 *
	 * @return string|Response
	 */
	public function actionCreate()
	{
		$model = new User();

		if ($this->request->isPost) {
			if ($model->load($this->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->id]);
			}
		} else {
			$model->loadDefaultValues();
		}

		return $this->render('create', [
			'model' => $model,
		]);
	}

	/**
	 * Updates an existing User model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param int $id
	 *
	 * @return string|Response
	 * @throws NotFoundHttpException
	 */
	public function actionUpdate(int $id)
	{
		$model = $this->findModel($id);

//		if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
		if ($this->request->isPost) {
			$post = $this->request->post();
			if ($model->load($this->request->post())) {
				$model->password_hash = $post['User']['pswd_hash'] ?: $model->password_hash;

				if ($model->save()) {
					return $this->redirect(['view', 'id' => $model->id]);
				} else {
					Yii::$app->session->addFlash('error', 'Ошибка сохранения!!!');
				}
			} else {
				Yii::$app->session->addFlash('error', 'Ошибка загрузки!!!');
			}
		}

		return $this->render('update', [
			'model' => $model,
		]);
	}

	/**
	 * Deletes an existing User model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param int $id
	 *
	 * @return Response
	 * @throws NotFoundHttpException
	 * @throws Throwable
	 * @throws StaleObjectException
	 */
	public function actionDelete(int $id): Response
	{
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the User model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param int $id
	 *
	 * @return User|null
	 * @throws NotFoundHttpException
	 */
	protected function findModel(int $id)
	{
		if (($model = User::findOne($id)) !== null) {
			return $model;
		}

		throw new NotFoundHttpException(Yii::$app->params['messages']['throwNotFound']);
	}

	/**
	 * Генерация парольного хэша.
	 *
	 * @return array
	 * @throws Exception
	 */
	public function actionGeneratePswd(): array
	{
		$pswd = '---';

		if (Yii::$app->request->isAjax) {

			if (!$_POST['pswd']) {
				$msg = '';
			} else {
				$msg = 'Пароль НЕ пустой!';
				$pswd = Yii::$app->security->generatePasswordHash($_POST['pswd']);
			}

		} else {
			$msg = "Какие-то неполадки обработки!!!";
		}

		Yii::$app->response->format = Response::FORMAT_JSON;
		return [
			'alert' => $msg,
			'pswd' => $pswd,
		];
	}
}
