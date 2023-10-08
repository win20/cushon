<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Investment;
use app\models\Fund;

class FundsController extends Controller
{
    public function actionIndex()
    {
        $userModel = new User();
        $funds = $userModel->getEnabledFundsForUser(1);

        return $this->render('index', ['funds' => $funds]);
    }

    public function actionDeposit()
    {

        $investmentModel = new Investment();

        $userModel = new User();
        $funds = $userModel->getEnabledFundsForUser(1);
        $currentUserId = $userModel->getCurrentUserDetails()['id'];

        $result = $investmentModel->store($currentUserId);

        if (!in_array('success', $result)) {
            return $this->render('index', ['funds' => $funds, 'validation' => $result]);
        }

        $model = new Fund();
        $fundDetails = $model->getFundById($result['fund']);
        $result['fund'] = $fundDetails['name'];

        return $this->render('index', ['funds' => $funds, 'success' => $result]);
    }

    public function actionShowInvestments()
    {
        $userModel = new User();
        $investments = $userModel->getInvestmentsForUser(1);

        return $this->render('investments', ['investments' => $investments]);
    }
}