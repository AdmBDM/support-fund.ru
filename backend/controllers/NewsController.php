<?php

namespace backend\controllers;

use common\models\News;
use backend\models\NewsSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * NewsController implements the CRUD actions for News model.
 */
//class NewsController extends Controller
class NewsController extends MyController
{
	/**
	 * @return array|\string[][][][]|\yii\filters\VerbFilter[][]
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
	 * Lists all News models.
	 * @return string
	 */
	public function actionIndex(): string
	{
		$searchModel = new NewsSearch();
		$dataProvider = $searchModel->search($this->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single News model.
	 * @param int $id ID
	 * @return string
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionView(int $id): string
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new News model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return string|\yii\web\Response
	 */
	public function actionCreate()
	{
		$model = new News();

		if ($this->request->isPost) {

//			if ($model->load($this->request->post()) && $model->save()) {
			if ($model->load($this->request->post())) {

				$post = $this->request->post();
				$model->news_date = date('Y-m-d', strtotime($post['News']['news_date']));
				$model->pub_date_start = date('Y-m-d H:i', strtotime($post['News']['pub_date_start']));
				$model->pub_date_end = $post['News']['pub_date_end'] ? date('Y-m-d H:i', strtotime($post['News']['pub_date_end'])) : null;

				myDebug($post);
				myDebug($model);

				if ($model->save()) {
					return $this->redirect(['view', 'id' => $model->id]);
				}
			}
		} else {
			$model->loadDefaultValues();
		}

		return $this->render('create', [
			'model' => $model,
		]);
	}

	/**
	 * Updates an existing News model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param int $id ID
	 * @return string|\yii\web\Response
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionUpdate(int $id)
	{
		$model = $this->findModel($id);

//		if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
		if ($this->request->isPost && $model->load($this->request->post())) {

			$post = Yii::$app->request->post();
//			$model->news_date = date('Y-m-d', strtotime($this->news_date));
			$model->news_date = date('Y-m-d', strtotime($post['News']['news_date']));
//			$model->pub_date_start = date('Y-m-d H:i', strtotime($this->pub_date_start));
			$model->pub_date_start = date('Y-m-d H:i', strtotime($post['News']['pub_date_start']));
//			$model->pub_date_end = $this->pub_date_end ? date('Y-m-d H:i', strtotime($this->pub_date_end)) : null;
			$model->pub_date_end = $post['News']['pub_date_end'] ? date('Y-m-d H:i', strtotime($post['News']['pub_date_end'])) : null;
			$model->save();

			return $this->redirect(['view', 'id' => $model->id]);
		}

		return $this->render('update', [
			'model' => $model,
		]);
	}

	/**
	 * Deletes an existing News model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param int $id ID
	 * @return \yii\web\Response
	 * @throws \Throwable
	 * @throws \yii\db\StaleObjectException
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete(int $id): Response
	{
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the News model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param int $id ID
	 * @return News the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel(int $id): News
	{
		if (($model = News::findOne($id)) !== null) {
			return $model;
		}

		throw new NotFoundHttpException(Yii::$app->params['messages']['throwNotFound']);
	}
}
