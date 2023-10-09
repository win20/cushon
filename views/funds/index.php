<?php

/** @var yii\web\View $this */

/**
 * @param array<array<string,mixed>> $funds
 * @param array<array<string,string>> $validation (optional)
 */

use yii\bootstrap5\Dropdown;
use yii\helpers\Url;

$this->registerCssFile('/css/pages/deposit.css');
$this->title = 'Cushon - Deposit Funds';
$postUrl = Url::to(['/funds/deposit']);

$fundErrors = isset($validation['fundId']) ? $validation['fundId'] : [];
$amountErrors = isset($validation['amount']) ? $validation['amount'] : [];

$fundId = $_POST['fundId'] ?? '';
$amount = $_POST['amount'] ?? '';

$selectedFund = $_GET['selectedFund'] ?? null;
?>

<div class="deposit-funds-container">
    <form action="<?= htmlspecialchars($postUrl) ?>" method="POST">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />

        <div class="form-group">
            <label>Which fund would you like to deposit into ?</label>
            <select name='fundId' class="form-select form-select-lg" aria-label=".form-select-lg example">
                <option selected>Select a fund</option>
                <?php foreach ($funds as $fund): ?>
                    <option value="<?= $fund['fund_id'] ?>" <?= $fund['fund_id'] == $fundId || $fund['fund_id'] == $selectedFund ? 'selected' : '' ?> ><?= $fund['fund_name'] ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($fundErrors)): ?>
                <div class='error-msg-group'>
                    <?php foreach ($fundErrors as $error): ?>
                        <div><?= $error ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Amount to deposit (GBP)</label>
            <input type="number" min='1' step='any' name='amount' value='<?= $amount ?>' class="form-control form-control-lg" id="amount-to-deposit" placeholder="1000">
            <?php if (isset($amountErrors)): ?>
                <div class="error-msg-group">
                    <?php foreach ($amountErrors as $error): ?>
                        <div><?= $error ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Deposit</button>
    </form>

    <?php if (isset($success) && $success): ?>
        <div class='success-msg'>
            You have successfully deposited £<?= $success['amount'] ?> into "<?= $success['fund'] ?>".
        </div>
    <?php endif; ?>
</div>
