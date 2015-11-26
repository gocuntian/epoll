<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Questionnaire */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Questionnaire',
]) . ' ' . $model->name_ua;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Questionnaires'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name_ua, 'url' => ['view', 'id' => $model->id_ank]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');

?>

<div class="questionnaire-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
