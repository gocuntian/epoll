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
    <li role="presentation" class="dropdown <?= ($controllerId == 'address-city-type') ? 'active' : '' ?>">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
           aria-expanded="false">
            <?= Yii::t('app', 'City Types') ?> <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li><?= Html::a('<i class="glyphicon glyphicon-plus"></i> ' . Yii::t('app', 'Create'), Url::to(['/address-city-type/create'])); ?></li>
            <li><?= Html::a('<i class="glyphicon glyphicon-list"></i> ' . Yii::t('app', 'Show All'), Url::to(['/address-city-type'])); ?></li>
        </ul>
    </li>
    <li role="presentation" class="dropdown <?= ($controllerId == 'address-street-type') ? 'active' : '' ?>">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
           aria-expanded="false">
            <?= Yii::t('app', 'Street Types') ?> <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li><?= Html::a('<i class="glyphicon glyphicon-plus"></i> ' . Yii::t('app', 'Create'), Url::to(['/address-street-type/create'])); ?></li>
            <li><?= Html::a('<i class="glyphicon glyphicon-list"></i> ' . Yii::t('app', 'Show All'), Url::to(['/address-street-type'])); ?></li>
        </ul>
    </li>
    <li role="presentation" class="dropdown <?= ($controllerId == 'address-city') ? 'active' : '' ?>">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
           aria-expanded="false">
            <?= Yii::t('app', 'Cities') ?> <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li><?= Html::a('<i class="glyphicon glyphicon-plus"></i> ' . Yii::t('app', 'Create new'), Url::to(['/address-city/create'])); ?></li>
            <li><?= Html::a('<i class="glyphicon glyphicon-list"></i> ' . Yii::t('app', 'Show All'), Url::to(['/address-city'])); ?></li>
        </ul>
    </li>
    <li role="presentation" class="dropdown <?= ($controllerId == 'address-street') ? 'active' : '' ?>">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
           aria-expanded="false">
            <?= Yii::t('app', 'Streets') ?> <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li><?= Html::a('<i class="glyphicon glyphicon-plus"></i> ' . Yii::t('app', 'Create'), Url::to(['/address-street/create'])); ?></li>
            <li><?= Html::a('<i class="glyphicon glyphicon-list"></i> ' . Yii::t('app', 'Show All'), Url::to(['/address-street'])); ?></li>
        </ul>
    </li>
</ul>
