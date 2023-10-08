<?php

/**
 * @var yii\web\View $this
 * @var array<string,mixed> $currentUser
*/

use yii\helpers\Url;

$this->registerCssFile('/css/pages/investments')
?>

<div class="investments-container">
    <h1>Your Investments</h1>
    <?php if (!empty($investments)): ?>
        <?php foreach($investments as $investment): ?>
            <?= $this->render('../components/investment_display', ['investment' => $investment]) ?>
        <?php endforeach; ?>
    <?php else: ?>
        <div class='mb-4'>You currently don't have any investments.</div>

       <?= $this->render('../components/menu_btn', [
            'label' => 'Make your first investment',
            'url' => Url::to(['funds/index']),
            'icon' => '/images/piggy_bank.svg',
            'alt' => 'piggy bank outline'
        ]) ?>
    <?php endif; ?>
</div>