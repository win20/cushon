<?php

/** @var yii\web\View $this */

/**
 * @param array<string,mixed> $currentUser
 * @param array<array<string,mixed>> $fundsInvestedByUser
*/

use yii\helpers\Url;

$this->registerCssFile('/css/pages/investments.css');
?>

<div class="investments-container">
    <h1>Your Investments</h1>

    <?php if (count($fundsInvestedByUser) > 1): ?>
        <div class='filter-container'>
            <span>Filter funds:</span>
            <?php foreach ($fundsInvestedByUser as $fund): ?>
                <a href='/funds/filter-investments?fundId=<?= $fund['id'] ?>' class='filter-btn' id='fund-<?= $fund['id'] ?>'><?= $fund['name'] ?></a>
            <?php endforeach; ?>
            <a href='/funds/show-investments' class='clear-filter-btn filter-btn' id='fund-<?= $fund['id'] ?>'>Clear filters</a>
        </div>
    <?php endif; ?>

    <?php if (!empty($investments)): ?>
        <?php foreach($investments as $investment): ?>
            <?= $this->render('../components/investment_display', ['investment' => $investment]) ?>
        <?php endforeach; ?>
    <?php else: ?>
        <div class='mb-4'>You currently don't have any investments.</div>

       <?= $this->render('../components/menu_btn', [
            'label' => 'Make your first investment',
            'url' => Url::to(['/funds/index']),
            'icon' => '/images/piggy_bank.svg',
            'alt' => 'piggy bank outline'
        ]) ?>
    <?php endif; ?>
</div>