<?php

namespace app\models;

use Yii;
use app\models\User;
use yii\db\QueryBuilder;
use yii\base\Model;

class Investment extends Model
{
    public $userId;
    public $fundId;
    public $amount;

    private function validateData()
    {
        $errorMessages = ['fundId' => [], 'amount' => []];
        $isError = false;

        if (empty($_POST['fundId']) || !is_numeric($_POST['fundId'])) {
            $errorMessages['fundId'][] = 'Please select a fund.';
            $isError = true;
        }
        if (empty($_POST['amount'])) {
            $errorMessages['amount'][] = 'Please enter an amount to deposit.';
            $isError = true;
        }
        if (floatval($_POST['amount']) > 20000) {
            $errorMessages['amount'][] = 'Please enter an amount lower than 20,000';
            $isError = true;
        }

        if ($isError) {
            return $errorMessages;
        }

        return null;
    }

    public function store($userId): array | null
    {
        $errorMessages = $this->validateData();

        if (!empty($errorMessages)) {
            return $errorMessages;
        }

        $db = Yii::$app->db;

        $db->createCommand()->insert('investment', [
            'fk_user' => $userId,
            'fk_fund' => $_POST['fundId'],
            'amount' => $_POST['amount'],
        ])->execute();

        return [
            'success',
            'fund' => $_POST['fundId'],
            'amount' => $_POST['amount'],
        ];
    }
}