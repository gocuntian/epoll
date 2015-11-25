<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\AddressCity;
use app\models\AddressStreetType;

/* @var $this yii\web\View */
/* @var $model app\models\AddressStreet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="address-street-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 's_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php
            $ownerIdOptions = ($model->isNewRecord && !empty($model->owner_id)) ? ['disabled' => 1] : [];

            ?>
            <?= $form->field($model, 'owner_id')
                ->dropDownList(AddressCity::getAllOwnerIdOptions(), ['prompt' => ''] + $ownerIdOptions) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 's_type_id')
                ->dropDownList(AddressStreetType::getAddressStreetTypeOptions(), ['prompt' => '']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
                    ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
