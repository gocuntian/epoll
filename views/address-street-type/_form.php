<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AddressStreetType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="address-street-type-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?= $form->field($model, 's_name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'f_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="panel-footer">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
                        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
