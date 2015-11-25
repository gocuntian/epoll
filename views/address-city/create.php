<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AddressCity */

$this->title = Yii::t('app', 'Create City');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Address Cities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-city-create">

    <?= $this->render('/common/_address_tabs'); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
