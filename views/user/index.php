<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_login',
            'email:email',
            'user_fname',
            'user_lname',
            'stat' => [
                'attribute' => 'stat',
                'filter' => User::getStatOptions(),
                'value' => function (User $data) {
                    return $data->getStat();
                },
            ],
            'has_car' => [
                'attribute' => 'has_car',
                'filter' => User::getHasCarOptions(),
                'value' => function (User $data) {
                    return $data->getHasCar();
                },
            ],
            'dtFrom',
            'dtTo',
            'id_role',

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 100px; text-align: center;']
            ],
        ],
    ]); ?>

</div>
