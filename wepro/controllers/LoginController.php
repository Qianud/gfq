<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class LoginController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        return $this->renderPartial('login');
    }
    public function actionUserout(){
        //echo 1;die;
        $session=Yii::$app->session;
        unset($session);
        //return $this->redirect(['login/login']);
        //return $this->redirect('web/index.php?r=login/login');
        echo "<script>alert('成功退出');location.href='index.php?r=login/index';</script>";
    }
    public function actionHand(){
        //echo 1;
        return $this->renderPartial("hand");
    }
}
