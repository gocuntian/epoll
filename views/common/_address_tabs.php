<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AddresssCityTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $controllerId string */

$controllerId = Yii::$app->controller->id;

?>

<ul class="nav nav-tabs">
    <li class="<?= ($controllerId == 'address-city-type') ? 'active' : '' ?>"><?= Html::a(Yii::t('app', 'City Types'),
            Url::to(['/address-city-type'])); ?></li>
    <li class="<?= ($controllerId == 'address-street-type') ? 'active' : '' ?>"><?= Html::a(Yii::t('app',
            'Street Types'),
            Url::to(['/address-street-type'])); ?></li>
    <li class="<?= ($controllerId == 'address-city') ? 'active' : '' ?>"><?= Html::a(Yii::t('app', 'Cities'),
            Url::to(['/address-city'])); ?></li>
    <li class="<?= ($controllerId == 'address-street') ? 'active' : '' ?>"><?= Html::a(Yii::t('app', 'Streets'),
            Url::to(['/address-street'])); ?></li>
</ul>
