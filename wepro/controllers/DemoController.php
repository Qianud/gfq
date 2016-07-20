<?php

namespace app\controllers;
use Yii;
use yii\web\app;
use yii\web\UploadedFile;
use yii\web\Controller;

class DemoController extends Controller
{
    public $enableCsrfValidation = false;
    public $layout="index";
    public function actionIndex()
    {
        //echo 1;die;

        $name = $_POST['user_name'];

        $pwd = $_POST['pwd'];
        $pwda = md5($pwd);
        $session = Yii::$app->session;
        $sql = "select * from wp_user where name='$name' and pwd='$pwda'";
        //echo $sql;die;
        $re = Yii::$app->db->createCommand("$sql")->queryAll();
        //var_dump($re);die;
        if ($re) {
            $session->set("username", $name);
            return $this->render("index");
        }
        else
        {
            //echo 2;die;
            echo "<script>alert('账号名或密码不正确');location.href='index.php?r=login/index';</script>";
        }

    }
    public function actionAdd(){
        return $this->render("add");
    }
    function actionShow(){
        return $this->render("musicshow");
    }
    public function actionSho(){
        return $this->render("add");
    }
    public function actionAdd2(){
        $show['name']=Yii::$app->db->createCommand('select * from addpublicnumber')->queryAll();
        return $this->render("show",$show);
    }
    public function actionUploada(){
        $upload=new UploadedFile(); //实例化上传类
        //print_r($upload);die;
        $name=$upload->getInstanceByName("u_file"); //获取文件原名称
        //print_r($name);die;
        $img=$_FILES["u_file"]; //获取上传文件参数
        $upload->tempName=$img['tmp_name']; //设置上传的文件的临时名称
        $img_path='uploads/'.$name; //设置上传文件的路径名称(这里的数据进行入库)
        $arr=$upload->saveAs($img_path); //保存文件
        var_dump($arr);
    }
    public function actionAddpublicnumber(){
        $id=rand(1,9);
        $cname=$_POST['cname'];
        $description=$_POST['description'];
        $account=$_POST['account'];
        $original=$_POST['original'];
        $level=$_POST['level'];
        $key=$_POST['key'];
        $secret=$_POST['secret'];
        $time=date("Y-m-d H:s:m");

        $sql="insert into addpublicnumber(cname,description,account,original,levela,keya,secreta,time) VALUES ('$cname','$description','$account','$original','$level','$key','$secret','$time')";
//        //echo $cname;die;
//        $row = Yii::$app->db->createCommand("$sql")->execute();
        $row=Yii::$app->db->createCommand("$sql")->execute();
        if($row)
        {
            $id=Yii::$app->db->getLastInsertID();
            //echo $id;die;
            $token=md5(rand(1,999));
            $url="http://"."121.196.220.6/gfq/wepro/web/index.php?r=url/valid&id=".$id;
            $sql="update addpublicnumber set url='$url',token='$token' where id=$id";
            Yii::$app->db->createCommand("$sql")->execute();
            return $this->redirect("index.php?r=demo/add2");
        }
        else
        {
            echo "<script>alert('添加失败，检查是否非法添加！');location.href='index.php?r=demo/add2';</script>";
        }
    }
    public function actionDeletes(){
        $id=$_GET['id'];
        $sql="delete from addpublicnumber WHERE id='$id'";
        //echo $sql;die;
        $del=Yii::$app->db->createCommand("delete from addpublicnumber WHERE id='$id'")->execute();
        if($del)
        {
            return $this->redirect("index.php?r=demo/add2");
        }
        else
        {
            echo "<script>alert('删除失败，检查是否非法删除！');location.href='index.php?r=demo/add2';</script>";
        }
    }
    public function actionCeshi(){
        return $this->render("ceshi");
    }
    public function actionIdex(){
        return $this->render("index");
    }
    public function actionDels(){
        $id=$_POST['id'];
        //return $id;
        //return $del=Yii::$app->db->createCommand("delete from addpublicnumber WHERE id='$id'")->execute();;
        $sh=Yii::$app->db->createCommand("delete from addpublicnumber WHERE id='$id'")->execute();
        if($sh)
        {
            return true;
        }
       else
       {
           return false;
       }
    }
    public function actionLooks(){
        $id=$_GET['id'];
        $sql="select * from addpublicnumber WHERE id='$id'";
        $re['name']=Yii::$app->db->createCommand("$sql")->queryOne();
        //print_r($re);die;
        return $this->render("xiangxi",$re);
    }
}