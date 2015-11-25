<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AddressCityType */

$this->title = $model->f_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'City Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-city-type-view">

    <?= $this->render('/common/_address_tabs'); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Html::tag('i', '', ['class' => 'glyphicon glyphicon-pencil']) . ' ' . Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Html::tag('i', '', ['class' => 'glyphicon glyphicon-trash']) . ' ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            's_name',
            'f_name',
        ],
    ]) ?>

</div>
