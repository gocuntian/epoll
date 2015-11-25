<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Question */

$this->title = $model->name_ua;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Questionnaires'), 'url' => ['/questionnaire']];
$this->params['breadcrumbs'][] = [
    'label' => $model->questionnaire->name_ua,
    'url' => ['/questionnaire/view', 'id' => $model->questionnaire->id_ank]
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_q], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_q], [
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
            'id_q',
            'id_ank',
            'npp',
            'name_ua',
            'name_ru',
            'q_type',
            'answ_min',
            'answ_max',
            'isRandom',
            'bbPresent',
            'ivPresent',
            'openQuestionAnswerMaxLength',
        ],
    ]) ?>

</div>
