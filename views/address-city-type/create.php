<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AddressCityType */

$this->title = Yii::t('app', 'Create City Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'City Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-city-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
