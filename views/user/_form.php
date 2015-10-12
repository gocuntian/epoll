<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

	<?php $form = ActiveForm::begin(); ?>

	<div class="row">
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading"><span class="glyphicon glyphicon-lock"></span> <?= Yii::t('app', 'Authentication') ?></div>
				<div class="panel-body">
					<?= $form->field($model, 'user_login')->textInput(['maxlength' => true]) ?>
					<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
					<?php if ($model->scenario === $model::SCENARIO_CREATE): ?>
						<?= $form->field($model, 'user_pass')->passwordInput(['maxlength' => true]) ?>
					<?php endif; ?>
					<?= $form->field($model, 'id_role')->textInput() ?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><span class="glyphicon glyphicon-user"></span> <?= Yii::t('app', 'Profile') ?></div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<?= $form->field($model, 'user_fname')->textInput(['maxlength' => true]) ?>
							<?= $form->field($model, 'user_mname')->textInput(['maxlength' => true]) ?>
							<?= $form->field($model, 'user_lname')->textInput(['maxlength' => true]) ?>
							<?= $form->field($model, 'stat')->dropDownList(User::getStatOptions()) ?>
						</div>
						<div class="col-md-6">
							<?= $form->field($model, 'date_nar')->widget(DatePicker::className(), ['options' => ['class' => 'form-control']]) ?>
							<?= $form->field($model, 'dom_addr')->textarea(['maxlength' => true, 'rows' => 4]) ?>
							<?= $form->field($model, 'tel_num')->textInput(['maxlength' => true]) ?>
							<?= $form->field($model, 'has_car')->dropDownList(User::getHasCarOptions(), ['prompt' => '']) ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading"><span class="glyphicon glyphicon-plus-sign"></span> <?= Yii::t('app', 'Additional') ?></div>
				<div class="panel-body">
					<?= $form->field($model, 'hw_id')->textInput() ?>
					<?= $form->field($model, 'dtFrom')->widget(DatePicker::className(), ['options' => ['class' => 'form-control']]) ?>
					<?= $form->field($model, 'dtTo')->widget(DatePicker::className(), ['options' => ['class' => 'form-control']]) ?>
					<?= $form->field($model, 'lang')->dropDownList(User::getLangOptions()) ?>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<hr>
			<div class="form-group">
				<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>
		</div>
	</div>

	<?php ActiveForm::end(); ?>

</div>
