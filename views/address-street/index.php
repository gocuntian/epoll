<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\AddressStreet;
use app\models\AddressStreetType;
use app\models\AddressCity;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AddressStreetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Streets');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="address-street-index">
    <?= $this->render('/common/_address_tabs'); ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= Html::a(Html::tag('i', '', ['class' => 'glyphicon glyphicon-plus']) . ' ' . Yii::t('app',
                            'Create Street'), ['create'], ['class' => 'btn btn-success']) ?>
                </div>
                <div class="panel-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            'id',
                            's_name',
                            's_type_id' => [
                                'filter' => AddressStreetType::getAddressStreetTypeOptions(),
                                'attribute' => 's_type_id',
                                'value' => function (AddressStreet $data) {
                                    return $data->getSTypeId();
                                },
                            ],
                            'owner_id' => [
                                'filter' => AddressCity::getAllOwnerIdOptions(),
                                'attribute' => 'owner_id',
                                'value' => function (AddressStreet $data) {
                                    return $data->getOwnerId();
                                },
                            ],

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
