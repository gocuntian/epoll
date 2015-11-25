<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AddressStreet */

$this->title = Yii::t('app', 'Create Street');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Streets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-street-create">

    <?= $this->render('/common/_address_tabs'); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
