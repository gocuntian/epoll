<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Question;
use app\models\search\QuestionAnswerSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use app\models\QuestionAnswer;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Question */
/* @var $form yii\widgets\ActiveForm */
/* @var $questionAnswerSearchModel QuestionAnswerSearch */
/* @var $questionAnswerDataProvider ActiveDataProvider */
/* @var $questionAnswerModel QuestionAnswer */

$this->registerJsFile('/js/question/form.js', ['depends' => '\yii\web\JqueryAsset'])

?>

<div class="question-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <?= $form->field($model, 'name_ua')->textInput(['maxlength' => true]) ?>
                                    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
                                    <?= $form->field($model, 'q_type')->dropDownList(Question::getQTypeOptions()) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <?= $form->field($model, 'npp')->textInput() ?>
                                    <?= $form->field($model, 'answ_min')->textInput() ?>
                                    <?= $form->field($model, 'answ_max')->textInput() ?>
                                    <?= $form->field($model, 'isRandom')
                                        ->dropDownList(Question::getIsRandomOptions()) ?>
                                    <?= $form->field($model, 'bbPresent')
                                        ->dropDownList(Question::getBBPresentOptions()) ?>
                                    <?= $form->field($model, 'ivPresent')
                                        ->dropDownList(Question::getIVPresentOptions()) ?>
                                    <?= $form->field($model, 'openQuestionAnswerMaxLength')->textInput() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Save') : Yii::t('app', 'Update'),
                        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
        <div class="col-md-6">
            <?php if (isset($questionAnswerDataProvider)): ?>
                <div class="panel panel-default question-answer-panel">
                    <div class="panel-heading">
                        <?= Html::a(Html::tag('i', '', ['class' => 'glyphicon glyphicon-plus']) . ' ' . Yii::t('app',
                                'Create Answer Variant'),
                            ['/question-answer/save'],
                            [
                                'type' => 'button',
                                'class' => 'btn btn-success btn-create-answer-variant'
                            ]) ?>
                    </div>
                    <div class="panel-body">
                        <?= $this->render('/question-answer/_form', [
                            'id_q' => $model->id_q,
                            'model' => $questionAnswerModel,
                        ]) ?>
                        <?= GridView::widget([
                            'dataProvider' => $questionAnswerDataProvider,
                            'columns' => [
                                'name_ua',
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'template' => '{view} {update} {delete}',
                                    'buttons' => [
                                        'view' => function ($url, $model) {
                                            return Html::a(Html::tag('span', '', [
                                                'class' => 'glyphicon glyphicon-eye-open',
                                            ]),
                                                ['/question-answer/view', 'id' => $model->id_av],
                                                [
                                                    'title' => Yii::t('app', 'View'),
                                                    'class' => 'question-answer-view',
                                                ]);
                                        },
                                        'update' => function ($url, $model) {
                                            return Html::a(Html::tag('span', '', [
                                                'class' => 'glyphicon glyphicon-pencil',
                                            ]),
                                                ['/question-answer/save', 'id' => $model->id_av],
                                                [
                                                    'title' => Yii::t('app', 'Update'),
                                                    'class' => 'question-answer-update',
                                                ]);
                                        },
                                        'delete' => function ($url, $model) {
                                            return Html::a(Html::tag('span', '', [
                                                'class' => 'glyphicon glyphicon-trash',
                                            ]),
                                                ['/question-answer/delete', 'id' => $model->id_av],
                                                [
                                                    'title' => Yii::t('app', 'Delete'),
                                                    'class' => 'question-answer-delete',
                                                ]);
                                        },
                                    ],
                                    'contentOptions' => ['style' => 'width: 100px; text-align: center;'],
                                ],
                            ],
                        ]); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
