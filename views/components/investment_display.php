<?php

/**
 * @var yii\web\View $this
 * @var array<string,mixed> $investment
*/

use yii\helpers\Url;

$this->registerCssFile('/css/components/investment_display.css')
?>

<div class='investment-item'>
    <div class='fund-name'><?= $investment['fund_name'] ?></div>
    <div class='amount'>Deposit: £<?= $investment['amount'] ?></div>
</div>