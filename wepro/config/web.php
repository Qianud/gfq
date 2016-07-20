<?php

$dbfile = __DIR__ . "/../config/db.php";

if(!file_exists($dbfile)) {
    if(file_exists('./install.php')) {
        header('Content-Type: text/html; charset=utf-8');
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        echo "如果你还没安装本程序，请运行<a href='./install.php'> install.php 进入安装&gt;&gt; </a><br/><br/>";
        exit();
    } else {
        header('Content-Type: text/html; charset=utf-8');
        exit('配置文件不存在或是不可读，请检查“install.php”文件或是重新安装！');
    }
}

$params = require(__DIR__ . '/params.php');

$config = [
    'defaultRoute'=>'login/index',
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '38838938936689',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
