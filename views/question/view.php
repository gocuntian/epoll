<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

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
        <?= Html::a(Html::tag('i', '', ['class' => 'glyphicon glyphicon-pencil']) . ' ' . Yii::t('app', 'Update'),
            ['update', 'id' => $model->id_q], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Html::tag('i', '', ['class' => 'glyphicon glyphicon-trash']) . ' ' . Yii::t('app', 'Delete'),
            ['delete', 'id' => $model->id_q], [
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
            'id_ank' => [
                'format' => 'html',
                'attribute' => 'id_ank',
                'value' => Html::a($model->questionnaire->name_ua,
                    Url::to(['/questionnaire/view', 'id' => $model->id_ank]))
            ],
//            'npp',
            'name_ua',
            'name_ru',
            'q_type' => [
                'attribute' => 'q_type',
                'value' => $model->getQType(),
            ],
            'answ_min',
            'answ_max',
            'isRandom' => [
                'attribute' => 'idRandom',
                'value' => $model->getIsRandom(),
            ],
            'bbPresent' => [
                'attribute' => 'bbPresent',
                'value' => $model->getBBPresent(),
            ],
            'ivPresent' => [
                'attribute' => 'ivPresent',
                'value' => $model->getIVPresent(),
            ],
            'openQuestionAnswerMaxLength',
        ],
    ]) ?>

</div>
