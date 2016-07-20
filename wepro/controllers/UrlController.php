<?php

namespace app\controllers;
use Yii;
use yii\web\app;
use yii\web\UploadedFile;
use yii\web\Controller;

class UrlController extends Controller
{
    public function actionValid()
    {
        $re=Yii::$app->request;
        $echoStr=$re->get("echostr");

        //valid signature , option
        if($this->checkSignature()){

            //$this->responseMsg();
            echo $echoStr;
            exit;
        }
    }
    public function responseMsg()
    {
        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        //extract post data
        if (!empty($postStr)){
            /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
               the best way is to check the validity of xml by yourself */
            libxml_disable_entity_loader(true);
            $postObj = simplexml_load_string($postStr,'SimpleXMLElement',LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
            if(!empty( $keyword ))
            {
                $msgType = "text";
                $contentStr = "Welcome to wechat world!";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }else{
                echo "Input something...";
            }
        }else {
            echo "";
            exit;
        }
    }

    private function checkSignature()
    {
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        $result=Yii::$app->request;
        $id=$result->get("id");
        $sql="select * from addpublicnumber WHERE id='$id'";
        $re=Yii::$app->db->createCommand("$sql")->queryOne();
        //echo $re;
        $rea=$re['token'];
        $signature =$result->get("signature");
        $timestamp = $result->get("timestamp");
        $nonce = $result->get("nonce");

        $token =$rea;
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
}

?>
}