<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\User;

class FundsController extends Controller
{
    public function actionIndex()
    {
        $userModel = new User();
        $funds = $userModel->getFundsForUser(1);

        return $this->render('index', ['funds' => $funds]);
    }

    public function actionCreateFund()
    {

    }

    public function actionWithdrawFromFund()
    {

    }

    public function actionDepositIntoFund()
    {

    }
}