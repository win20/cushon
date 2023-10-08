<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Investment;

class FundsController extends Controller
{
    public function actionIndex()
    {
        $userModel = new User();
        $funds = $userModel->getEnabledFundsForUser(1);

        return $this->render('index', ['funds' => $funds]);
    }

    public function actionCreateFund()
    {

    }

    public function actionWithdrawFromFund()
    {

    }

    public function actionDeposit()
    {
        $investmentModel = new Investment();

        $userModel = new User();
        $funds = $userModel->getEnabledFundsForUser(1);
        $currentUserId = $userModel->getCurrentUserDetails()['id'];

        $result = $investmentModel->store($currentUserId);

        if (!empty($result)) {
            return $this->render('index', ['funds' => $funds, 'validation' => $result]);
        }
    }
}