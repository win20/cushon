<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\assets\FontAsset;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Button;
use yii\helpers\Url;

AppAsset::register($this);
FontAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
$this->registerCssFile('/css/layouts/main.css');

$session = Yii::$app->session;
$currentUser = $session->get('currentUserDetails');
$underContructionUrl = Url::to('/site/under-construction');
$equitiesFundUrl = Url::to('/funds/index?selectedFund=equities');

$userFullName = $currentUser['fname'] . ' ' . $currentUser['lname'];

$funds = $session->get('userFunds');
$fundsLinks = [];
foreach ($funds as $fund) {
    $fundsLinks[] = [
        'label' => $fund['fund_name'],
        'url' => Url::to('/funds/index?selectedFund=' . $fund['fund_id']),
    ];
}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'About', 'url' => ['#']],
            [
                'label' => 'Products',
                'items' => $fundsLinks,
            ],
            ['label' => 'Solutions', 'url' => ['#']],
            ['label' => 'Tools & more', 'url' => ['#']],
        ]
    ]);

    echo Html::a($userFullName, ['/site/under-construction'], ['class'=>'btn navbar-user-btn']);

    NavBar::end();

    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?= $content ?>
    </div>
</main>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
