<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AddressCity */

$this->title = $model->c_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="address-city-view">

    <?= $this->render('/common/_address_tabs'); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Html::tag('i', '', ['class' => 'glyphicon glyphicon-road']) . ' ' . Yii::t('app', 'Add Street'), ['/address-street/create', 'owner_id' => $model->id], ['class' => 'btn btn-success']) ?>
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
            'c_name',
            'c_type_id' => [
                'attribute' => 'c_type_id',
                'value' => $model->getCTypeId(),
            ],
            'is_grp' => [
                'attribute' => 'is_grp',
                'value' => $model->getIsGrp(),
            ],
            'parent_id' => [
                'attribute' => 'parent_id',
                'value' => $model->getParentId(),
            ],
        ],
    ]) ?>

</div>

<div class="address-street">

</div>
