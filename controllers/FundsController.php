<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;
use app\models\Investment;
use app\models\Fund;

class FundsController extends Controller
{
    public function actionIndex()
    {
        $userModel = new User();
        $session = Yii::$app->session;

        $funds = $session->get('userFunds');

        return $this->render('index', ['funds' => $funds]);
    }

    public function actionDeposit()
    {
        $investmentModel = new Investment();
        $userModel = new User();

        $session = Yii::$app->session;
        $funds = $session->get('userFunds');
        $userId = $this->getCurrentUserId();

        $result = $investmentModel->store($userId);

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
        $userId = $this->getCurrentUserId();

        $investments = $userModel->getInvestmentsForUser($userId);
        $fundsInvestedByUser = $userModel->getFundsInvestedInByUser($userId);

        return $this->render('investments', ['investments' => $investments, 'fundsInvestedByUser' => $fundsInvestedByUser]);
    }

    public function actionFilterInvestments()
    {
        $userId = $this->getCurrentUserId();
        $fundId = $_GET['fundId'] ?? null;

        $userModel = new User();
        $investmentsByFund = $userModel->getInvestmentsForUserByFund($userId, $fundId);
        $fundsInvestedByUser = $userModel->getFundsInvestedInByUser($userId);

        return $this->render('investments', ['investments' => $investmentsByFund, 'fundsInvestedByUser' => $fundsInvestedByUser]);
    }

    private function getCurrentUserId(): int
    {
        $session = Yii::$app->session;
        return $session->get('currentUserDetails')['id'];
    }
}