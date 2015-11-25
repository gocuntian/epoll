<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Question */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Question',
]) . ' ' . $model->name_ua;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Questionnaires'), 'url' => ['/questionnaire']];
$this->params['breadcrumbs'][] = [
    'label' => $model->questionnaire->name_ua,
    'url' => ['/questionnaire/view', 'id' => $model->questionnaire->id_ank]
];
$this->params['breadcrumbs'][] = ['label' => $model->name_ua, 'url' => ['view', 'id' => $model->id_q]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="question-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
