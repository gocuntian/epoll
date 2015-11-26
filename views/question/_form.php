<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Question;

/* @var $this yii\web\View */
/* @var $model app\models\Question */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile('/js/question/form.js', ['depends' => '\yii\web\JqueryAsset'])

?>

<div class="question-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?= Yii::t('app', 'Main Information') ?>
                                </div>
                                <div class="panel-body">
                                    <?= $form->field($model, 'name_ua')->textInput(['maxlength' => true]) ?>
                                    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
                                    <?= $form->field($model, 'q_type')->dropDownList(Question::getQTypeOptions()) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?= Yii::t('app', 'Settings') ?>
                                </div>
                                <div class="panel-body">
                                    <?= $form->field($model, 'answ_min')->textInput() ?>
                                    <?= $form->field($model, 'answ_max')->textInput() ?>
                                    <?= $form->field($model, 'isRandom')->dropDownList(Question::getIsRandomOptions()) ?>
                                    <?= $form->field($model, 'bbPresent')->dropDownList(Question::getBBPresentOptions()) ?>
                                    <?= $form->field($model, 'ivPresent')->dropDownList(Question::getIVPresentOptions()) ?>
                                    <?= $form->field($model, 'openQuestionAnswerMaxLength')->textInput() ?>
                                </div>
                            </div>
                        </div>
                    </div>
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
