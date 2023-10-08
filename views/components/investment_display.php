<?php

/**
 * @var yii\web\View $this
 * @var array<string,mixed> $investment
*/

use yii\helpers\Url;

$this->registerCssFile('/css/components/investment_display.css');

$date = date_create($investment['date_added']);
$dateAdded = date_format($date, 'd-m-Y');
?>

<div class='investment-item'>
    <div>
        <span class='fund-name'><?= $investment['fund_name'] ?></span>
        <span class='date-added'><?= $dateAdded ?></span>
    </div>
    <div class='amount'>Deposit: £<?= $investment['amount'] ?></div>
</div>