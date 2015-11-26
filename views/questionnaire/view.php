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
    <h1><?= Yii::t('app', 'Questionnaire') . ' ' . Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= Html::a(Html::tag('i', '', ['class' => 'glyphicon glyphicon-pencil']) . ' ' . Yii::t('app',
                            'Update'), ['update', 'id' => $model->id_ank],
                        ['class' => 'btn btn-primary']) ?>
                    <?= Html::a(Html::tag('i', '', ['class' => 'glyphicon glyphicon-trash']) . ' ' . Yii::t('app',
                            'Delete'), ['delete', 'id' => $model->id_ank],
                        [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                'method' => 'post',
                            ],
                        ]) ?>
                </div>
                <div class="panel-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'template' => '<tr><th width="50%">{label}</th><td width="50%">{value}</td></tr>',
                        'attributes' => [
                            'name_ua',
                            'name_ru',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= Html::a(Html::tag('i', '', ['class' => 'glyphicon glyphicon-plus']) . ' ' . Yii::t('app',
                            'Create Question'), ['/question/create', 'id_ank' => $model->id_ank],
                        ['class' => 'btn btn-success']) ?>
                </div>
                <div class="panel-body">
                    <?php Pjax::begin(); ?>
                    <?= GridView::widget([
                        'dataProvider' => $questionDataProvider,
                        'columns' => [
                            [
                                'class' => 'yii\grid\SerialColumn',
                                'contentOptions' => [
                                    'style' => 'width: 70px;',
                                ],
                            ],
                            'name_ua',
                            'q_type' => [
                                'format' => 'html',
                                'attribute' => 'q_type',
                                'value' => function (Question $data) {
                                    return Html::tag('span', $data->getQType(), ['class' => 'label label-primary']);
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
