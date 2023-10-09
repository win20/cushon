<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;

class SiteController extends Controller
{
    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);

        // Pretend a user has logged in, store data in session
        $userModel = new User();
        $session = Yii::$app->session;

        $currentUserDetails = $userModel->getCurrentUserDetails();
        $session->set('currentUserDetails', $currentUserDetails);

        $funds = $userModel->getEnabledFundsForUser();
        $session->set('userFunds', $funds);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUnderConstruction()
    {
        return $this->render('under_construction');
    }
}
