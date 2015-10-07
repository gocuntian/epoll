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

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Street'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            's_name',
            's_type_id' => [
                'filter' => AddressStreetType::getAddressStreetTypeOptions(),
                'attribute' => 's_type_id',
                'value' => function (AddressStreet $data) {
                    return $data->getSTypeId();
                },
            ],
            'owner_id' =>  [
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
