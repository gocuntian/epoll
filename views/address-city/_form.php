<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\AddressCity;
use app\models\AddressCityType;

/* @var $this yii\web\View */
/* @var $model app\models\AddressCity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="address-city-form">

	<?php $form = ActiveForm::begin(); ?>

	<div class="row">
		<div class="col-md-6">
			<?= $form->field($model, 'c_name')->textInput(['maxlength' => true]) ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<?= $form->field($model, 'c_type_id')->dropDownList(AddressCityType::getAddressCityTypeOptions(), ['prompt' => '']) ?>
			<?= $form->field($model, 'is_grp')->dropDownList(AddressCity::getIsGrpOptions(), ['prompt' => '']) ?>
		</div>
		<div class="col-md-3">
			<?= $form->field($model, 'parent_id')->dropDownList(AddressCity::getParentIdOptions($model->id), ['prompt' => '']) ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>
		</div>
	</div>

	<?php ActiveForm::end(); ?>

</div>
