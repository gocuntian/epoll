<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::tag('i', null, ['class' => 'glyphicon glyphicon-dashboard']) . ' ' . Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
        'innerContainerOptions' => [
            'class' => 'container-fluid',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => [
            [
                'label' => Html::tag('i', null, ['class' => 'glyphicon glyphicon-home']) . ' ' . Yii::t('app', 'Home'),
                'url' => ['/site/index'],
            ],
            [
                'label' => Html::tag('i', null, ['class' => 'glyphicon glyphicon-user']) . ' ' . Yii::t('app', 'Users'),
                'url' => ['/user/index'],
            ],
            [
                'label' => Html::tag('i', null, ['class' => 'glyphicon glyphicon-question-sign']) . ' ' . Yii::t('app',
                        'Questionnaires'),
                'url' => ['/questionnaire'],
            ],
            [
                'label' => Html::tag('i', null, ['class' => 'glyphicon glyphicon-ok-sign']) . ' ' . Yii::t('app',
                        'Answers'),
                'url' => '#',
            ],
            [
                'label' => Html::tag('i', null, ['class' => 'glyphicon glyphicon-globe']) . ' ' . Yii::t('app',
                        'Addresses'),
                'url' => ['/address-city'],
            ],
            Yii::$app->user->isGuest ?
                [
                    'label' => Html::tag('i', null, ['class' => 'glyphicon glyphicon-log-in']) . ' ' . Yii::t('app',
                            'Login'),
                    'url' => ['/site/login']
                ] :
                [
                    'label' => Html::tag('i', null, ['class' => 'glyphicon glyphicon-log-out']) . ' ' . Yii::t('app',
                            'Logout') . ' (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container-fluid">
        <?= $this->render('/common/_breadcrumbs') ?>
        <?= $this->render('/common/_flashes') ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container-fluid">
        <p class="pull-left">&copy; <?= Yii::$app->name ?> <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
