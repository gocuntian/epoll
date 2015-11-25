<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AddressCityType */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'City Type',
    ]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'City Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="address-city-type-update">

    <?= $this->render('/common/_address_tabs'); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
