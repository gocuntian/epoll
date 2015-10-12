<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->user_login;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		<?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
				'method' => 'post',
			],
		]) ?>
	</p>

	<div class="row">
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading"><span
						class="glyphicon glyphicon-lock"></span> <?= Yii::t('app', 'Authentication') ?></div>
				<div class="panel-body">
					<?= DetailView::widget([
						'model' => $model,
						'attributes' => [
							'id',
							'user_login',
							'email:email',
							'id_role',
						],
					]) ?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><span
						class="glyphicon glyphicon-user"></span> <?= Yii::t('app', 'Profile') ?></div>
				<div class="panel-body">
					<?= DetailView::widget([
						'model' => $model,
						'attributes' => [
							'user_fname',
							'user_mname',
							'user_lname',
							'stat' => [
								'attribute' => 'stat',
								'value' => $model->getStat(),
							],
							'date_nar',
							'dom_addr',
							'tel_num',
							'has_car' => [
								'attribute' => 'has_car',
								'value' => $model->getHasCar(),
							],
						],
					]) ?>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading"><span
						class="glyphicon glyphicon-plus-sign"></span> <?= Yii::t('app', 'Additional') ?></div>
				<div class="panel-body">
					<?= DetailView::widget([
						'model' => $model,
						'attributes' => [
							'hw_id',
							'dtFrom',
							'dtTo',
							'lang' => [
								'attribute' => 'lang',
								'value' => $model->getLang(),
							],
						],
					]) ?>
				</div>
			</div>
		</div>
	</div>

</div>
