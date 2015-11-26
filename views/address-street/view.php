<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AddressStreet */

$this->title = $model->s_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Streets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="address-street-view">
    <?= $this->render('/common/_address_tabs'); ?>
    <h1><?= Yii::t('app', 'Street') . ' ' . Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= Html::a(Html::tag('i', '', ['class' => 'glyphicon glyphicon-pencil']) . ' ' . Yii::t('app',
                            'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a(Html::tag('i', '', ['class' => 'glyphicon glyphicon-trash']) . ' ' . Yii::t('app',
                            'Delete'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]) ?>
                </div>
                <div class="panel-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            's_name',
                            's_type_id' => [
                                'attribute' => 's_type_id',
                                'value' => $model->getSTypeId(),
                            ],
                            'owner_id' => [
                                'attribute' => 'owner_id',
                                'value' => $model->getOwnerId(),
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
