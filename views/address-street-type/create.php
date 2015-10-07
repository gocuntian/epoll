<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AddressStreetType */

$this->title = Yii::t('app', 'Create Street Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Street Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-street-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
