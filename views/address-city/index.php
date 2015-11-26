<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\AddressCity;
use app\models\AddressCityType;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AddressCitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cities');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="address-city-index">
    <?= $this->render('/common/_address_tabs'); ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= Html::a(Html::tag('i', '', ['class' => 'glyphicon glyphicon-plus']) . ' ' . Yii::t('app',
                            'Create City'), ['create'], ['class' => 'btn btn-success']) ?>
                </div>
                <div class="panel-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            'c_name',
                            'c_type_id' => [
                                'filter' => AddressCityType::getAddressCityTypeOptions(),
                                'attribute' => 'c_type_id',
                                'value' => function (AddressCity $data) {
                                    return $data->getCTypeId();
                                },
                            ],
                            'is_grp' => [
                                'filter' => AddressCity::getIsGrpOptions(),
                                'attribute' => 'is_grp',
                                'value' => function (AddressCity $data) {
                                    return $data->getIsGrp();
                                },
                            ],
                            'parent_id' => [
                                'filter' => AddressCity::getParentIdOptions(),
                                'attribute' => 'parent_id',
                                'value' => function (AddressCity $data) {
                                    return $data->getParentId();
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
