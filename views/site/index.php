<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->registerCssFile('css/pages/home.css');
$this->title = 'Cushon';

$underContructionUrl = Url::to(['site/under-construction']);

$menuButtons = [
    [
        'label' => 'View Investments',
        'url' => '#',
        'icon' => 'images/user_outline.svg',
        'alt' => 'user outline',
    ],
    [
        'label' => 'Deposit Funds',
        'url' => 'test',
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

<h1>Welcome back to Cushon Win Barua!</h1>
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
