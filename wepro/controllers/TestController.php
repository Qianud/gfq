<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Account;


class ManageController extends Controller
{
    public function actionValid()
    {
        $request = Yii::$app->request;
        $echoStr = $request->get('echostr');

        //shlalid signature , option
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }

    private function checkSignature()
    {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $account = new account;
        $account = $account->find()->where(['Id' => $id])->asArray()->one();
        $token = $account['token'];

        $signature =  $request->get('signature');
        $timestamp = $request->get('timestamp');
        $nonce = $request->get('nonce');

        $tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
