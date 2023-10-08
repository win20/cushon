<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

class User extends ActiveRecord
{
    private const CURRENT_USER_ID = 1;  // would not need this in real application

    public function getCurrentUserDetails()
    {
        $userId = Yii::$app->session->get('currentUserDetails')['id'] ?? self::CURRENT_USER_ID;

        $queryBuilder = new Query();

        $rows = $queryBuilder
            ->from('user')
            ->where(['in', 'id', $userId])
            ->one();

        return $rows;
    }

    public function getEnabledFundsForUser(int $userId): array
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
}