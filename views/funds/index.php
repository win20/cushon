<?php

/** @var yii\web\View $this */

/**
 * @var array<string,mixed> $funds
 */

use yii\bootstrap5\Dropdown;


$this->registerCssFile('/css/pages/deposit.css');
$this->title = 'Cushon - Deposit Funds';
?>

<div class="deposit-funds-container">

    <form action="POST">
        <div class="form-group">
            <label>Which fund would you like to deposit into ?</label>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option selected>Select a fund</option>
                <?php foreach ($funds as $fund): ?>
                    <option value="<?= $fund['fund_id'] ?>"><?= $fund['fund_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Amount to deposit (GBP)</label>
            <input type="currency" class="form-control form-control-lg" id="amount-to-deposit" placeholder="1000">
        </div>

        <button type="submit" class="btn btn-primary">Deposit</button>
    </form>
</div>
