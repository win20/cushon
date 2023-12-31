<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\base\Model;

class User extends Model
{
    private const CURRENT_USER_ID = 1;  // would not need this in real application

    public function getCurrentUserDetails(): array
    {
        $userId = Yii::$app->session->get('currentUserDetails')['id'] ?? self::CURRENT_USER_ID;

        $queryBuilder = new Query();

        $rows = $queryBuilder
            ->from('user')
            ->where(['in', 'id', $userId])
            ->one();

        return $rows;
    }

    public function getEnabledFundsForUser(int $userId = 1): array
    {
        $queryBuilder = new Query();

        $rows = $queryBuilder
            ->select(['f.id AS fund_id', 'f.name AS fund_name'])
            ->from('user u')
            ->innerJoin('user_fund uf', 'u.id = uf.fk_user')
            ->innerJoin('fund f', 'f.id = uf.fk_fund')
            ->where(['in', 'u.id', $userId])
            ->where(['f.is_enabled' => 1])
            ->all();

        return $rows;
    }

    public function getInvestmentsForUser(int $userId): array
    {
        $queryBuilder = new Query();

        $rows = $queryBuilder
            ->select(['f.name AS fund_name', 'i.amount', 'i.date_added'])
            ->from('fund f')
            ->innerJoin('investment i', 'f.id = i.fk_fund')
            ->where(['in', 'i.fk_user', $userId])
            ->orderBy('i.date_added DESC')
            ->all();

        return $rows;
    }

    public function getFundsInvestedInByUser(int $userId): array
    {
        $queryBuilder = new Query();

        $rows = $queryBuilder
            ->select(['f.id', 'f.name'])
            ->distinct()
            ->from('fund f')
            ->innerJoin('investment i', 'f.id = i.fk_fund')
            ->all();

        return $rows;
    }

    public function getInvestmentsForUserByFund(int $userId, int $fundId): array
    {
        $queryBuilder = new Query();
        $rows = [];

        if (isset($fundId)) {
            $rows = $queryBuilder
                ->select(['f.name AS fund_name', 'i.amount', 'i.date_added'])
                ->from('fund f')
                ->innerJoin('investment i', 'f.id = i.fk_fund')
                ->where(['in', 'i.fk_user', $userId])
                ->where(['in', 'i.fk_fund', $fundId])
                ->orderBy('i.date_added DESC')
                ->all();
        } else {
            $rows = $this->getInvestmentsForUser($userId);
        }

        return $rows;
    }
}