<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_fname') ?>

    <?= $form->field($model, 'user_lname') ?>

    <?= $form->field($model, 'user_mname') ?>

    <?= $form->field($model, 'user_login') ?>

    <?php // echo $form->field($model, 'user_pass') ?>

    <?php // echo $form->field($model, 'hw_id') ?>

    <?php // echo $form->field($model, 'date_nar') ?>

    <?php // echo $form->field($model, 'stat') ?>

    <?php // echo $form->field($model, 'dom_addr') ?>

    <?php // echo $form->field($model, 'tel_num') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'has_car') ?>

    <?php // echo $form->field($model, 'dtFrom') ?>

    <?php // echo $form->field($model, 'dtTo') ?>

    <?php // echo $form->field($model, 'id_role') ?>

    <?php // echo $form->field($model, 'lang') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
