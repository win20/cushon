<?php

namespace app\models;

use Yii;
use app\models\User;
use yii\db\Query;
use yii\base\Model;

class Fund extends Model
{
    public function getFundById(int $id)
    {
        $query = new Query();
        $data = $query
            ->from('fund')
            ->where(['in', 'id', $id])
            ->one();

        return $data;
    }
}