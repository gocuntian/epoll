<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\QuestionAnswer */

$this->title = $model->id_av;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Question Answers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="question-answer question-answer-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name_ua',
            'name_ru',
            'npp',
            'isHidden' => [
                'attribute' => 'isHidden',
                'value' => $model->getIsHidden(),
            ],
            'hasText' => [
                'attribute' => 'hasText',
                'value' => $model->getHasText(),
            ],
            'textMaxLength',
            'isNoRandomized' => [
                'attribute' => 'isNoRandomized',
                'value' => $model->getIsNoRandomized(),
            ],
            'separator',
        ],
    ]) ?>
</div>
