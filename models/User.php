<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

class User extends ActiveRecord
{
    public function getCurrentUserDetails()
    {
        $userId = Yii::$app->session->get('loggedInUserId');

        $queryBuilder = new Query();

        $rows = $queryBuilder
            ->select(['id', 'fname', 'lname'])
            ->from('user')
            ->where(['in', 'id', $userId])
            ->one();

        return $rows;
    }

    public function getFundsForUser(int $userId): array
    {
        $queryBuilder = new Query();

        $rows = $queryBuilder
            ->select(['f.id AS fund_id', 'f.name AS fund_name'])
            ->from('user u')
            ->innerJoin('user_fund uf', 'u.id = uf.fk_user')
            ->innerJoin('fund f', 'f.id = uf.fk_fund')
            ->where(['in', 'u.id', $userId])
            ->all();

        return $rows;
    }
}