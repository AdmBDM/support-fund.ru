<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Пользователь', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>

<div class="user-view">
	<p>
		<?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
	</p>

	<?php try {
		echo DetailView::widget([
			'model' => $model,
			'attributes' => [
				'id',
				'username',
				'auth_key',
				'password_hash',
				//			'password_reset_token',
				'email:email',
				'status',
				//			'created_at',
				//			'updated_at',
				//			'verification_token',
				'phone_number',
				'admin:boolean',
				'oper:boolean',
				//			'when_ed',
			],
		]);
	} catch (Exception $e) {
		echo $e->getMessage('Ошибка вышла!');
	} ?>

</div>
