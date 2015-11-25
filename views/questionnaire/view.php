<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\search\QuestionSearch;
use app\models\Question;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Questionnaire */
/* @var $questionSearchModel QuestionSearch */
/* @var $questionDataProvider \yii\data\ActiveDataProvider */

$this->title = $model->name_ua;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Questionnaires'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="questionnaire-view">
    <div class="row">
        <div class="col-md-12">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= Yii::t('app', 'Questionnaire') ?>
                    <div class="btn-group pull-right">
                        <?= Html::a(Html::tag('i', '', ['class' => 'glyphicon glyphicon-pencil']) . ' ' . Yii::t('app',
                                'Update'), ['update', 'id' => $model->id_ank],
                            ['class' => 'btn btn-xs btn-primary']) ?>
                        <?= Html::a(Html::tag('i', '', ['class' => 'glyphicon glyphicon-trash']) . ' ' . Yii::t('app',
                                'Delete'), ['delete', 'id' => $model->id_ank],
                            [
                                'class' => 'btn btn-xs btn-danger',
                                'data' => [
                                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                    'method' => 'post',
                                ],
                            ]) ?>
                    </div>
                </div>
                <div class="panel-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id_ank',
                            'name_ua',
                            'name_ru',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= Yii::t('app', 'Questions') ?>
                    <div class="btn-group pull-right">
                        <?= Html::a(Html::tag('i', '', ['class' => 'glyphicon glyphicon-plus']) . ' ' . Yii::t('app',
                                'Create'), ['/question/create', 'id_ank' => $model->id_ank],
                            ['class' => 'btn btn-xs btn-success']) ?>
                    </div>
                </div>
                <div class="panel-body">
                    <?php Pjax::begin(); ?>
                    <?= GridView::widget([
                        'dataProvider' => $questionDataProvider,
                        'layout' => '{items}' . PHP_EOL . '{pager}',
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'name_ua',
                            'q_type' => [
                                'format' => 'html',
                                'attribute' => 'q_type',
                                'value' => function (Question $data) {
                                    return Html::tag('span', $data->getQType(), ['class' => 'label label-primary']);
                                },
                            ],
                            'bbPresent' => [
                                'format' => 'html',
                                'attribute' => 'bbPresent',
                                'value' => function (Question $data) {
                                    return Html::tag('span', $data->getBBPresent(), ['class' => $data->bbPresent ? 'label label-success' : 'label label-danger']);
                                },
                            ],
                            'ivPresent' => [
                                'format' => 'html',
                                'attribute' => 'ivPresent',
                                'value' => function (Question $data) {
                                    return Html::tag('span', $data->getIVPresent(), ['class' => $data->ivPresent ? 'label label-success' : 'label label-danger']);
                                },
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{view} {update} {delete}',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                        return Html::a(Html::tag('span', '',
                                            ['class' => 'glyphicon glyphicon-eye-open']),
                                            ['/question/view', 'id' => $model->id_q],
                                            ['data-pjax' => '0', 'title' => Yii::t('app', 'View')]);
                                    },
                                    'update' => function ($url, $model) {
                                        return Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-pencil']),
                                            ['/question/update', 'id' => $model->id_q],
                                            ['data-pjax' => '0', 'title' => Yii::t('app', 'Update')]);
                                    },
                                    'delete' => function ($url, $model) {
                                        return Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-trash']),
                                            ['/question/delete', 'id' => $model->id_q], [
                                                'data-pjax' => '0',
                                                'data-confirm' => Yii::t('app',
                                                    'Are you sure you want to delete the item?'),
                                                'data-method' => 'post',
                                                'title' => Yii::t('app', 'Delete')
                                            ]);
                                    },
                                ],
                                'contentOptions' => ['style' => 'width: 100px; text-align: center;'],
                            ],
                        ],
                    ]); ?>
                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
