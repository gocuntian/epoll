<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\QuestionAnswer;

/* @var $this yii\web\View */
/* @var $model app\models\QuestionAnswer */
/* @var $form yii\widgets\ActiveForm */
/* @var $id_q integer */

?>

<div class="question-answer-form" style="display: none;">
    <?php $form = ActiveForm::begin([
        'options' => [
            'class' => 'question-answer',
        ],
        'id' => 'question-answer-form',
        'action' => $model->isNewRecord ? Url::to(['/question-answer/save']) : Url::to(['/question-answer/save', 'id' => $model->id_av])
    ]); ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <div style="display: none;">
                                <?= $form->field($model, 'id_q')->hiddenInput()->label(false) ?>
                            </div>
                            <?= $form->field($model, 'npp')->textInput() ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'name_ua')
                                ->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'name_ru')
                                ->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <?= $form->field($model, 'isHidden')
                                ->dropDownList(QuestionAnswer::getIsHiddenOptions()) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($model, 'isNoRandomized')
                                ->dropDownList(QuestionAnswer::getIsNoRandomizedOptions()) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($model, 'hasText')
                                ->dropDownList(QuestionAnswer::getHasTextOptions()) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($model, 'textMaxLength')->textInput() ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'separator')
                                ->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app',
                'Create') : Yii::t('app',
                'Update'),
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
