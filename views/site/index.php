<?php

/**
 * @var yii\web\View $this
 * @var array<string,mixed> $currentUser
*/

use yii\helpers\Url;

$this->registerCssFile('/css/pages/home.css');
$this->title = 'Cushon - Home';

$underContructionUrl = Url::to(['site/under-construction']);
$depositFundsUrl = Url::to(['funds/index']);
$url = Url::to(['site/test']);

$session = Yii::$app->session;
$currentUser = $session->get('currentUserDetails');

$menuButtons = [
    [
        'label' => 'View Investments',
        'url' => $url,
        'icon' => 'images/user_outline.svg',
        'alt' => 'user outline',
    ],
    [
        'label' => 'Deposit Funds',
        'url' => $depositFundsUrl,
        'icon' => 'images/piggy_bank.svg',
        'alt' => 'piggy bank outline',
    ],
    [
        'label' => 'Set up new ISA Pot',
        'url' => $underContructionUrl,
        'icon' => 'images/plus.svg',
        'alt' => 'plus',
    ],
];
?>

<h1>Welcome back to Cushon <?= $currentUser['fname'] . ' ' . $currentUser['lname'] ?>!</h1>
<h3>What would you like to do today?</h2>

<div class='menu-btn-container'>
    <?php foreach($menuButtons as $button): ?>
        <?=
            $this->render(
                '../components/menu_btn',
                [
                    'label' => $button['label'],
                    'url' => $button['url'],
                    'icon' => $button['icon'],
                    'alt' => $button['alt'],
                ]
            )
        ?>
    <?php endforeach; ?>
</div>
