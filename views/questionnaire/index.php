<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Questionnaire */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Questionnaires');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="questionnaire-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= Html::a(Html::tag('i', '', ['class' => 'glyphicon glyphicon-plus']) . ' ' . Yii::t('app',
                            'Create Questionnaire'), ['create'], ['class' => 'btn btn-success']) ?>
                </div>
                <div class="panel-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            'name_ua',
                            'name_ru',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'contentOptions' => ['style' => 'width: 100px; text-align: center;']
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
