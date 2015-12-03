<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\QuestionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_q') ?>

    <?= $form->field($model, 'id_ank') ?>

    <?= $form->field($model, 'npp') ?>

    <?= $form->field($model, 'name_ua') ?>

    <?= $form->field($model, 'name_ru') ?>

    <?php // echo $form->field($model, 'q_type') ?>

    <?php // echo $form->field($model, 'answ_min') ?>

    <?php // echo $form->field($model, 'answ_max') ?>

    <?php // echo $form->field($model, 'isRandom') ?>

    <?php // echo $form->field($model, 'bbPresent') ?>

    <?php // echo $form->field($model, 'ivPresent') ?>

    <?php // echo $form->field($model, 'openQuestionAnswerMaxLength') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
