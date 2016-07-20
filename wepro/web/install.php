<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
error_reporting(E_ALL ^ E_NOTICE);
@set_time_limit(0);
@set_magic_quotes_runtime(0);
ob_start();
define('IA_ROOT', str_replace("\\",'/', dirname(__FILE__)));
if($_GET['res']) {
	$res = $_GET['res'];
	$reses = tpl_resources();
	if(array_key_exists($res, $reses)) {
		if($res == 'css') {
			header('content-type:text/css');
		} else {
			header('content-type:image/png');
		}
		echo base64_decode($reses[$res]);
		exit();
	}
}
$actions = array('license', 'env', 'db', 'finish');
$action = $_COOKIE['action'];
$action = in_array($action, $actions) ? $action : 'license';
$ispost = strtolower($_SERVER['REQUEST_METHOD']) == 'post';

if(file_exists(IA_ROOT . '/../config/install.lock') && $action != 'finish') {
	header('location: ./index.php');
	exit;
}
header('content-type: text/html; charset=utf-8');
if($action == 'license') {
	if($ispost) {
		setcookie('action', 'env');
		header('location:?refresh');
		exit;
	}
	tpl_install_license();
}
if($action == 'env') {
	if($ispost) {
		setcookie('action', $_POST['do'] == 'continue' ? 'db' : 'license');
		header('location: ?refresh');
		exit;
	}
	$ret = array();
	$ret['server']['os']['value'] = php_uname();
	if(PHP_SHLIB_SUFFIX == 'dll') {
		$ret['server']['os']['remark'] = '建议使用 Linux 系统以提升程序性能';
		$ret['server']['os']['class'] = 'warning';
	}
	$ret['server']['sapi']['value'] = $_SERVER['SERVER_SOFTWARE'];
	if(PHP_SAPI == 'isapi') {
		$ret['server']['sapi']['remark'] = '建议使用 Apache 或 Nginx 以提升程序性能';
		$ret['server']['sapi']['class'] = 'warning';
	}
	$ret['server']['php']['value'] = PHP_VERSION;
	$ret['server']['dir']['value'] = IA_ROOT;
	if(function_exists('disk_free_space')) {
		$ret['server']['disk']['value'] = floor(disk_free_space(IA_ROOT) / (1024*1024)).'M';
	} else {
		$ret['server']['disk']['value'] = 'unknow';
	}
	$ret['server']['upload']['value'] = @ini_get('file_uploads') ? ini_get('upload_max_filesize') : 'unknow';

	$ret['php']['version']['value'] = PHP_VERSION;
	$ret['php']['version']['class'] = 'success';
	if(version_compare(PHP_VERSION, '5.4.0') == -1) {
		$ret['php']['version']['class'] = 'danger';
		$ret['php']['version']['failed'] = true;
		$ret['php']['version']['remark'] = 'PHP版本必须为 5.4.0 以上. <a href="http://bbs.we7.cc/forum.php?mod=redirect&goto=findpost&ptid=3564&pid=58062">详情</a>';
	}

	$ret['php']['mysql']['ok'] = function_exists('mysql_connect');
	if($ret['php']['mysql']['ok']) {
		$ret['php']['mysql']['value'] = '<span class="glyphicon glyphicon-ok text-success"></span>';
	} else {
		$ret['php']['pdo']['failed'] = true;
		$ret['php']['mysql']['value'] = '<span class="glyphicon glyphicon-remove text-danger"></span>';
	}

	$ret['php']['pdo']['ok'] = extension_loaded('pdo') && extension_loaded('pdo_mysql');
	if($ret['php']['pdo']['ok']) {
		$ret['php']['pdo']['value'] = '<span class="glyphicon glyphicon-ok text-success"></span>';
		$ret['php']['pdo']['class'] = 'success';
		if(!$ret['php']['mysql']['ok']) {
			$ret['php']['pdo']['remark'] = '您的PHP环境不支持 mysql_connect，请开启此扩展. <a target="_blank" href="http://bbs.we7.cc/forum.php?mod=redirect&goto=findpost&ptid=3564&pid=58073">详情</a>';
		}
	} else {
		$ret['php']['pdo']['failed'] = true;
		if($ret['php']['mysql']['ok']) {
			$ret['php']['pdo']['value'] = '<span class="glyphicon glyphicon-remove text-warning"></span>';
			$ret['php']['pdo']['class'] = 'warning';
			$ret['php']['pdo']['remark'] = '您的PHP环境不支持PDO, 请开启此扩展. <a target="_blank" href="http://bbs.we7.cc/forum.php?mod=redirect&goto=findpost&ptid=3564&pid=58074">详情</a>';
		} else {
			$ret['php']['pdo']['value'] = '<span class="glyphicon glyphicon-remove text-danger"></span>';
			$ret['php']['pdo']['class'] = 'danger';
			$ret['php']['pdo']['remark'] = '您的PHP环境不支持PDO, 也不支持 mysql_connect, 系统无法正常运行. <a target="_blank" href="http://bbs.we7.cc/forum.php?mod=redirect&goto=findpost&ptid=3564&pid=58074">详情</a>';
		}
	}

	$ret['php']['fopen']['ok'] = @ini_get('allow_url_fopen') && function_exists('fsockopen');
	if($ret['php']['fopen']['ok']) {
		$ret['php']['fopen']['value'] = '<span class="glyphicon glyphicon-ok text-success"></span>';
	} else {
		$ret['php']['fopen']['value'] = '<span class="glyphicon glyphicon-remove text-danger"></span>';
	}

	$ret['php']['curl']['ok'] = extension_loaded('curl') && function_exists('curl_init');
	if($ret['php']['curl']['ok']) {
		$ret['php']['curl']['value'] = '<span class="glyphicon glyphicon-ok text-success"></span>';
		$ret['php']['curl']['class'] = 'success';
		if(!$ret['php']['fopen']['ok']) {
			$ret['php']['curl']['remark'] = '您的PHP环境虽然不支持 allow_url_fopen, 但已经支持了cURL, 这样系统是可以正常高效运行的, 不需要额外处理. <a target="_blank" href="http://bbs.we7.cc/forum.php?mod=redirect&goto=findpost&ptid=3564&pid=58076">详情</a>';
		}
	} else {
		if($ret['php']['fopen']['ok']) {
			$ret['php']['curl']['value'] = '<span class="glyphicon glyphicon-remove text-warning"></span>';
			$ret['php']['curl']['class'] = 'warning';
			$ret['php']['curl']['remark'] = '您的PHP环境不支持cURL, 但支持 allow_url_fopen, 这样系统虽然可以运行, 但还是建议你开启cURL以提升程序性能和系统稳定性. <a target="_blank" href="http://bbs.we7.cc/forum.php?mod=redirect&goto=findpost&ptid=3564&pid=58086">详情</a>';
		} else {
			$ret['php']['curl']['value'] = '<span class="glyphicon glyphicon-remove text-danger"></span>';
			$ret['php']['curl']['class'] = 'danger';
			$ret['php']['curl']['remark'] = '您的PHP环境不支持cURL, 也不支持 allow_url_fopen, 系统无法正常运行. <a target="_blank" href="http://bbs.we7.cc/forum.php?mod=redirect&goto=findpost&ptid=3564&pid=58086">详情</a>';
			$ret['php']['curl']['failed'] = true;
		}
	}

	$ret['php']['ssl']['ok'] = extension_loaded('openssl');
	if($ret['php']['ssl']['ok']) {
		$ret['php']['ssl']['value'] = '<span class="glyphicon glyphicon-ok text-success"></span>';
		$ret['php']['ssl']['class'] = 'success';
	} else {
		$ret['php']['ssl']['value'] = '<span class="glyphicon glyphicon-remove text-danger"></span>';
		$ret['php']['ssl']['class'] = 'danger';
		$ret['php']['ssl']['failed'] = true;
		$ret['php']['ssl']['remark'] = '没有启用OpenSSL, 将无法访问公众平台的接口, 系统无法正常运行. <a target="_blank" href="http://bbs.we7.cc/forum.php?mod=redirect&goto=findpost&ptid=3564&pid=58109">详情</a>';
	}

	$ret['php']['gd']['ok'] = extension_loaded('gd');
	if($ret['php']['gd']['ok']) {
		$ret['php']['gd']['value'] = '<span class="glyphicon glyphicon-ok text-success"></span>';
		$ret['php']['gd']['class'] = 'success';
	} else {
		$ret['php']['gd']['value'] = '<span class="glyphicon glyphicon-remove text-danger"></span>';
		$ret['php']['gd']['class'] = 'danger';
		$ret['php']['gd']['failed'] = true;
		$ret['php']['gd']['remark'] = '没有启用GD, 将无法正常上传和压缩图片, 系统无法正常运行. <a target="_blank" href="http://bbs.we7.cc/forum.php?mod=redirect&goto=findpost&ptid=3564&pid=58110">详情</a>';
	}

	$ret['php']['dom']['ok'] = class_exists('DOMDocument');
	if($ret['php']['dom']['ok']) {
		$ret['php']['dom']['value'] = '<span class="glyphicon glyphicon-ok text-success"></span>';
		$ret['php']['dom']['class'] = 'success';
	} else {
		$ret['php']['dom']['value'] = '<span class="glyphicon glyphicon-remove text-danger"></span>';
		$ret['php']['dom']['class'] = 'danger';
		$ret['php']['dom']['failed'] = true;
		$ret['php']['dom']['remark'] = '没有启用DOMDocument, 将无法正常安装使用模块, 系统无法正常运行. <a target="_blank" href="http://bbs.we7.cc/forum.php?mod=redirect&goto=findpost&ptid=3564&pid=58111">详情</a>';
	}

	$ret['php']['session']['ok'] = ini_get('session.auto_start');
	if($ret['php']['session']['ok'] == 0 || strtolower($ret['php']['session']['ok']) == 'off') {
		$ret['php']['session']['value'] = '<span class="glyphicon glyphicon-ok text-success"></span>';
		$ret['php']['session']['class'] = 'success';
	} else {
		$ret['php']['session']['value'] = '<span class="glyphicon glyphicon-remove text-danger"></span>';
		$ret['php']['session']['class'] = 'danger';
		$ret['php']['session']['failed'] = true;
		$ret['php']['session']['remark'] = '系统session.auto_start开启, 将无法正常注册会员, 系统无法正常运行. <a target="_blank" href="http://bbs.we7.cc/forum.php?mod=redirect&goto=findpost&ptid=3564&pid=58111">详情</a>';
	}

	$ret['php']['asp_tags']['ok'] = ini_get('asp_tags');
	if(empty($ret['php']['asp_tags']['ok']) || strtolower($ret['php']['asp_tags']['ok']) == 'off') {
		$ret['php']['asp_tags']['value'] = '<span class="glyphicon glyphicon-ok text-success"></span>';
		$ret['php']['asp_tags']['class'] = 'success';
	} else {
		$ret['php']['asp_tags']['value'] = '<span class="glyphicon glyphicon-remove text-danger"></span>';
		$ret['php']['asp_tags']['class'] = 'danger';
		$ret['php']['asp_tags']['failed'] = true;
		$ret['php']['asp_tags']['remark'] = '请禁用可以使用ASP 风格的标志，配置php.ini中asp_tags = Off';
	}

	$ret['write']['data']['ok'] = local_writeable(IA_ROOT . '/../config');
	if($ret['write']['data']['ok']) {
		$ret['write']['data']['value'] = '<span class="glyphicon glyphicon-ok text-success"></span>';
		$ret['write']['data']['class'] = 'success';
	} else {
		$ret['write']['data']['value'] = '<span class="glyphicon glyphicon-remove text-danger"></span>';
		$ret['write']['data']['class'] = 'danger';
		$ret['write']['data']['failed'] = true;
		$ret['write']['data']['remark'] = 'data目录无法写入, 将无法写入配置文件, 系统无法正常安装. ';
	}

	$ret['continue'] = true;
	foreach($ret['php'] as $opt) {
		if($opt['failed']) {
			$ret['continue'] = false;
			break;
		}
	}
	if($ret['write']['failed']) {
		$ret['continue'] = false;
	}
	tpl_install_env($ret);
}
if($action == 'db') {
	if($ispost) {
		if($_POST['do'] != 'continue') {
			setcookie('action', 'env');
			header('location: ?refresh');
			exit();
		}
		$family = $_POST['family'] == 'x' ? 'x' : 'v';
		$db = $_POST['db'];
		$user = $_POST['user'];
		$link = mysql_connect($db['server'], $db['username'], $db['password']);
		if(empty($link)) {
			$error = mysql_error();
			if (strpos($error, 'Access denied for user') !== false) {
				$error = '您的数据库访问用户名或是密码错误. <br />';
			} else {
				$error = iconv('gbk', 'utf8', $error);
			}
		} else {
			mysql_query("SET character_set_connection=utf8, character_set_results=utf8, character_set_client=binary");
			mysql_query("SET sql_mode=''");
			if(mysql_errno()) {
				$error = mysql_error();
			} else {
				$query = mysql_query("SHOW DATABASES LIKE  '{$db['name']}';");
				if (!mysql_fetch_assoc($query)) {
					if(mysql_get_server_info() > '4.1') {
						mysql_query("CREATE DATABASE IF NOT EXISTS `{$db['name']}` DEFAULT CHARACTER SET utf8", $link);
					} else {
						mysql_query("CREATE DATABASE IF NOT EXISTS `{$db['name']}`", $link);
					}
				}
				$query = mysql_query("SHOW DATABASES LIKE  '{$db['name']}';");
				if (!mysql_fetch_assoc($query)) {
					$error .= "数据库不存在且创建数据库失败. <br />";
				}
				if(mysql_errno()) {
					$error .= mysql_error();
				}
			}
		}
		if(empty($error)) {
			mysql_select_db($db['name']);
			$query = mysql_query("SHOW TABLES LIKE '{$db['prefix']}%';");
			if (mysql_fetch_assoc($query)) {
				$error = '您的数据库不为空，请重新建立数据库或是清空该数据库或更改表前缀！';
			}
		}
		if(empty($error)) {
			$pieces = explode(':', $db['server']);
			$db['port'] = !empty($pieces[1]) ? $pieces[1] : '3306';
			$config = local_config();

			// --------- 随机的Cookie前缀，第二个不知道
			$cookiepre = local_salt(4) . '_';
			$authkey = local_salt(8);
			// ------------------------------------------

			$config = str_replace(array(
				'{db_host}', '{db_username}', '{db_password}', '{db_port}', '{db_name}', '{db_prefix}', '{cookiepre}', '{authkey}', '{attachdir}'
			), array(
				$pieces[0], $db['username'], $db['password'], $db['port'], $db['name'], $db['prefix'], $cookiepre, $authkey, 'attachment'
			), $config);
			$dbfile = IA_ROOT . '/../config/install.sql';

			if(file_exists(IA_ROOT . '/index.php') && file_exists($dbfile)) {
//				$dat = require $dbfile;
				$sql = file_get_contents($dbfile);
				if(empty($sql)) {
					die('<script type="text/javascript">alert("安装包不正确, 数据安装脚本缺失.");history.back();</script>');
				}
				local_run($sql);
			} else {
				die('<script type="text/javascript">alert("你正在使用的安装包不完整, 请从WePro官网下载完整安装包后重试.");history.back();</script>');
			}

			$salt = local_salt(8);
//			$password = sha1("{$user['password']}-{$salt}-{$authkey}");
			$password = md5($user['password']);
			mysql_query("INSERT INTO {$db['prefix']}user (name, pwd) VALUES('{$user['username']}', '{$password}')");
			file_put_contents(IA_ROOT . '/../config/db.php', $config);
			touch(IA_ROOT . '/../config/install.lock');
			setcookie('action', 'finish');
			header('location: ?refresh');
			exit();
		}
	}
	tpl_install_db($error);

}
if($action == 'finish') {
	setcookie('action', '', time()-10);

//	是否删除安装所需的sql文件呢？
//	$dbfile = IA_ROOT . '../config/install.sql';
//	@unlink($dbfile);

	tpl_install_finish();
}

function local_writeable($dir) {
	$writeable = 0;
	if(!is_dir($dir)) {
		@mkdir($dir, 0777);
	}
	if(is_dir($dir)) {
		if($fp = fopen("$dir/test.txt", 'w')) {
			fclose($fp);
			unlink("$dir/test.txt");
			$writeable = 1;
		} else {
			$writeable = 0;
		}
	}
	return $writeable;
}

function local_salt($length = 8) {
	$result = '';
	while(strlen($result) < $length) {
		$result .= sha1(uniqid('', true));
	}
	return substr($result, 0, $length);
}

function local_config() {
	$cfg = <<<EOF
<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host={db_host};port={db_port};dbname={db_name}',
    'username' => '{db_username}',
    'password' => '{db_password}',
    'charset' => 'utf8',
    'tablePrefix' => '{db_prefix}',
];

EOF;
	return trim($cfg);
}

function local_run($sql) {
	global $link, $db;

	if(!isset($sql) || empty($sql)) return;

	$sql = str_replace("\r", "\n", str_replace(' wp_', ' '.$db['prefix'], $sql));
	$sql = str_replace("\r", "\n", str_replace(' `wp_', ' `'.$db['prefix'], $sql));
	$ret = array();
	$num = 0;
	foreach(explode(";\n", trim($sql)) as $query) {
		$ret[$num] = '';
		$queries = explode("\n", trim($query));
		foreach($queries as $query) {
			$ret[$num] .= (isset($query[0]) && $query[0] == '#') || (isset($query[1]) && isset($query[1]) && $query[0].$query[1] == '--') ? '' : $query;
		}
		$num++;
	}
	unset($sql);
	foreach($ret as $query) {
		$query = trim($query);
		if($query) {
			if(!mysql_query($query, $link)) {
				echo mysql_errno() . ": " . mysql_error() . "<br />";
				exit($query);
			}
		}
	}
}

function tpl_frame() {
	global $action, $actions;
	$action = $_COOKIE['action'];
	$step = array_search($action, $actions);
	$steps = array();
	for($i = 0; $i <= $step; $i++) {
		if($i == $step) {
			$steps[$i] = ' list-group-item-info';
		} else {
			$steps[$i] = ' list-group-item-success';
		}
	}
	$progress = $step * 25 + 25;
	$content = ob_get_contents();
	ob_clean();
	$tpl = <<<EOF
<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>安装系统 - 微擎 - 公众平台自助开源引擎</title>
		<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<style>
			html,body{font-size:13px;font-family:"Microsoft YaHei UI", "微软雅黑", "宋体";}
			.pager li.previous a{margin-right:10px;}
			.header a{color:#FFF;}
			.header a:hover{color:#428bca;}
			.footer{padding:10px;}
			.footer a,.footer{color:#eee;font-size:14px;line-height:25px;}
		</style>
		<!--[if lt IE 9]>
		  <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body style="background-color:#888;">
		<div class="container">
			<div class="header" style="margin:15px auto;">
				<ul class="nav nav-pills pull-right" role="tablist">
					<li role="presentation" class="active"><a href="javascript:;">欢迎安装WePro系统</a></li>
				</ul>
				<img src="?res=logo" width="150"/>
			</div>
			<div class="row well" style="margin:auto 0;">
				<div class="col-xs-3">
					<div class="progress" title="安装进度">
						<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="{$progress}" aria-valuemin="0" aria-valuemax="100" style="width: {$progress}%;">
							{$progress}%
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							安装步骤
						</div>
						<ul class="list-group">
							<a href="javascript:;" class="list-group-item{$steps[0]}"><span class="glyphicon glyphicon-copyright-mark"></span> &nbsp; 许可协议</a>
							<a href="javascript:;" class="list-group-item{$steps[1]}"><span class="glyphicon glyphicon-eye-open"></span> &nbsp; 环境监测</a>
							<a href="javascript:;" class="list-group-item{$steps[2]}"><span class="glyphicon glyphicon-cog"></span> &nbsp; 参数配置</a>
							<a href="javascript:;" class="list-group-item{$steps[3]}"><span class="glyphicon glyphicon-ok"></span> &nbsp; 成功</a>
						</ul>
					</div>
				</div>
				<div class="col-xs-9">
					{$content}
				</div>
			</div>
			<div class="footer" style="margin:15px auto;">
				<div class="text-center">
					Powered by <a href="http://www.ddbk.tk"><b>WePro</b></a> &copy; 2016 <a href="http://www.ddbk.tk">冬冬博客</a>
				</div>
			</div>
		</div>
		<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
		<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>
EOF;
	echo trim($tpl);
}

function tpl_install_license() {
	echo <<<EOF
		<div class="panel panel-default">
			<div class="panel-heading">阅读许可协议</div>
			<div class="panel-body" style="overflow-y:scroll;max-height:400px;line-height:20px;">
				<h3>版权所有 (c)2014，微擎团队保留所有权利。 </h3>
				<p>
					感谢您选择微擎 - 微信公众平台自助开源引擎（以下简称WE7，WE7基于 PHP + MySQL的技术开发，全部源码开放。 <br />
					为了使你正确并合法的使用本软件，请你在使用前务必阅读清楚下面的协议条款：
				</p>
				<p>
					<strong>一、本授权协议适用且仅适用于微擎系统(We7, MicroEngine. 以下简称微擎)任何版本，微擎官方对本授权协议的最终解释权。</strong>
				</p>
				<p>
					<strong>二、协议许可的权利 </strong>
					<ol>
						<li>您可以在完全遵守本最终用户授权协议的基础上，将本软件应用于非商业用途，而不必支付软件版权授权费用。</li>
						<li>您可以在协议规定的约束和限制范围内修改微擎源代码或界面风格以适应您的网站要求。</li>
						<li>您拥有使用本软件构建的网站全部内容所有权，并独立承担与这些内容的相关法律义务。</li>
						<li>获得商业授权之后，您可以将本软件应用于商业用途，同时依据所购买的授权类型中确定的技术支持内容，自购买时刻起，在技术支持期限内拥有通过指定的方式获得指定范围内的技术支持服务。商业授权用户享有反映和提出意见的权力，相关意见将被作为首要考虑，但没有一定被采纳的承诺或保证。</li>
					</ol>
				</p>
				<p>
					<strong>三、协议规定的约束和限制 </strong>
					<ol>
						<li>未获商业授权之前，不得将本软件用于商业用途（包括但不限于企业网站、经营性网站、以营利为目的或实现盈利的网站）。</li>
						<li>未经官方许可，不得对本软件或与之关联的商业授权进行出租、出售、抵押或发放子许可证。</li>
						<li>未经官方许可，禁止在微擎的整体或任何部分基础上以发展任何派生版本、修改版本或第三方版本用于重新分发。</li>
						<li>如果您未能遵守本协议的条款，您的授权将被终止，所被许可的权利将被收回，并承担相应法律责任。</li>
					</ol>
				</p>
				<p>
					<strong>四、有限担保和免责声明 </strong>
					<ol>
						<li>本软件及所附带的文件是作为不提供任何明确的或隐含的赔偿或担保的形式提供的。</li>
						<li>用户出于自愿而使用本软件，您必须了解使用本软件的风险，在尚未购买产品技术服务之前，我们不承诺对免费用户提供任何形式的技术支持、使用担保，也不承担任何因使用本软件而产生问题的相关责任。</li>
						<li>电子文本形式的授权协议如同双方书面签署的协议一样，具有完全的和等同的法律效力。您一旦开始确认本协议并安装  WE7，即被视为完全理解并接受本协议的各项条款，在享有上述条款授予的权力的同时，受到相关的约束和限制。协议许可范围以外的行为，将直接违反本授权协议并构成侵权，我们有权随时终止授权，责令停止损害，并保留追究相关责任的权力。</li>
						<li>如果本软件带有其它软件的整合API示范例子包，这些文件版权不属于本软件官方，并且这些文件是没经过授权发布的，请参考相关软件的使用许可合法的使用。</li>
					</ol>
				</p>
			</div>
		</div>
		<form class="form-inline" role="form" method="post">
			<ul class="pager">
				<li class="pull-left" style="display:block;padding:5px 10px 5px 0;">
					<div class="checkbox">
						<label>
							<input type="checkbox"> 我已经阅读并同意此协议
						</label>
					</div>
				</li>
				<li class="previous"><a href="javascript:;" onclick="if(jQuery(':checkbox:checked').length == 1){jQuery('form')[0].submit();}else{alert('您必须同意软件许可协议才能安装！')};">继续 <span class="glyphicon glyphicon-chevron-right"></span></a></li>
			</ul>
		</form>
EOF;
	tpl_frame();
}

function tpl_install_env($ret = array()) {
	if(empty($ret['continue'])) {
		$continue = '<li class="previous disabled"><a href="javascript:;">请先解决环境问题后继续</a></li>';
	} else {
		$continue = '<li class="previous"><a href="javascript:;" onclick="$(\'#do\').val(\'continue\');$(\'form\')[0].submit();">继续 <span class="glyphicon glyphicon-chevron-right"></span></a></li>';
	}
	echo <<<EOF
		<div class="panel panel-default">
			<div class="panel-heading">服务器信息</div>
			<table class="table table-striped">
				<tr>
					<th style="width:150px;">参数</th>
					<th>值</th>
					<th></th>
				</tr>
				<tr class="{$ret['server']['os']['class']}">
					<td>服务器操作系统</td>
					<td>{$ret['server']['os']['value']}</td>
					<td>{$ret['server']['os']['remark']}</td>
				</tr>
				<tr class="{$ret['server']['sapi']['class']}">
					<td>Web服务器环境</td>
					<td>{$ret['server']['sapi']['value']}</td>
					<td>{$ret['server']['sapi']['remark']}</td>
				</tr>
				<tr class="{$ret['server']['php']['class']}">
					<td>PHP版本</td>
					<td>{$ret['server']['php']['value']}</td>
					<td>{$ret['server']['php']['remark']}</td>
				</tr>
				<tr class="{$ret['server']['dir']['class']}">
					<td>程序安装目录</td>
					<td>{$ret['server']['dir']['value']}</td>
					<td>{$ret['server']['dir']['remark']}</td>
				</tr>
				<tr class="{$ret['server']['disk']['class']}">
					<td>磁盘空间</td>
					<td>{$ret['server']['disk']['value']}</td>
					<td>{$ret['server']['disk']['remark']}</td>
				</tr>
				<tr class="{$ret['server']['upload']['class']}">
					<td>上传限制</td>
					<td>{$ret['server']['upload']['value']}</td>
					<td>{$ret['server']['upload']['remark']}</td>
				</tr>
			</table>
		</div>

		<div class="alert alert-info">PHP环境要求必须满足下列所有条件，否则系统或系统部份功能将无法使用。</div>
		<div class="panel panel-default">
			<div class="panel-heading">PHP环境要求</div>
			<table class="table table-striped">
				<tr>
					<th style="width:150px;">选项</th>
					<th style="width:180px;">要求</th>
					<th style="width:50px;">状态</th>
					<th>说明及帮助</th>
				</tr>
				<tr class="{$ret['php']['version']['class']}">
					<td>PHP版本</td>
					<td>5.3或者5.3以上</td>
					<td>{$ret['php']['version']['value']}</td>
					<td>{$ret['php']['version']['remark']}</td>
				</tr>
				<tr class="{$ret['php']['pdo']['class']}">
					<td>MySQL</td>
					<td>支持(建议支持PDO)</td>
					<td>{$ret['php']['mysql']['value']}</td>
					<td rowspan="2">{$ret['php']['pdo']['remark']}</td>
				</tr>
				<tr class="{$ret['php']['pdo']['class']}">
					<td>PDO_MYSQL</td>
					<td>支持(强烈建议支持)</td>
					<td>{$ret['php']['pdo']['value']}</td>
				</tr>
				<tr class="{$ret['php']['curl']['class']}">
					<td>allow_url_fopen</td>
					<td>支持(建议支持cURL)</td>
					<td>{$ret['php']['fopen']['value']}</td>
					<td rowspan="2">{$ret['php']['curl']['remark']}</td>
				</tr>
				<tr class="{$ret['php']['curl']['class']}">
					<td>cURL</td>
					<td>支持(强烈建议支持)</td>
					<td>{$ret['php']['curl']['value']}</td>
				</tr>
				<tr class="{$ret['php']['ssl']['class']}">
					<td>openSSL</td>
					<td>支持</td>
					<td>{$ret['php']['ssl']['value']}</td>
					<td>{$ret['php']['ssl']['remark']}</td>
				</tr>
				<tr class="{$ret['php']['gd']['class']}">
					<td>GD2</td>
					<td>支持</td>
					<td>{$ret['php']['gd']['value']}</td>
					<td>{$ret['php']['gd']['remark']}</td>
				</tr>
				<tr class="{$ret['php']['dom']['class']}">
					<td>DOM</td>
					<td>支持</td>
					<td>{$ret['php']['dom']['value']}</td>
					<td>{$ret['php']['dom']['remark']}</td>
				</tr>
				<tr class="{$ret['php']['session']['class']}">
					<td>session.auto_start</td>
					<td>关闭</td>
					<td>{$ret['php']['session']['value']}</td>
					<td>{$ret['php']['session']['remark']}</td>
				</tr>
				<tr class="{$ret['php']['asp_tags']['class']}">
					<td>asp_tags</td>
					<td>关闭</td>
					<td>{$ret['php']['asp_tags']['value']}</td>
					<td>{$ret['php']['asp_tags']['remark']}</td>
				</tr>
			</table>
		</div>

		<div class="alert alert-info">系统要求WePro整个安装目录必须可写, 才能使用微擎所有功能。</div>
		<div class="panel panel-default">
			<div class="panel-heading">目录权限监测</div>
			<table class="table table-striped">
				<tr>
					<th style="width:150px;">目录</th>
					<th style="width:180px;">要求</th>
					<th style="width:50px;">状态</th>
					<th>说明及帮助</th>
				</tr>
				<tr class="{$ret['write']['data']['class']}">
					<td>../config</td>
					<td>config目录可写</td>
					<td>{$ret['write']['data']['value']}</td>
					<td>{$ret['write']['data']['remark']}</td>
				</tr>
			</table>
		</div>
		<form class="form-inline" role="form" method="post">
			<input type="hidden" name="do" id="do" />
			<ul class="pager">
				<li class="previous"><a href="javascript:;" onclick="$('#do').val('back');$('form')[0].submit();"><span class="glyphicon glyphicon-chevron-left"></span> 返回</a></li>
				{$continue}
			</ul>
		</form>
EOF;
	tpl_frame();
}

function tpl_install_db($error = '') {
	if(!empty($error)) {
		$message = '<div class="alert alert-danger">发生错误: ' . $error . '</div>';
	}
	echo <<<EOF
	{$message}
	<form class="form-horizontal" method="post" role="form">
		<div class="panel panel-default">
			<div class="panel-heading">数据库选项</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-sm-2 control-label">数据库主机</label>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="db[server]" value="127.0.0.1:3306">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">数据库用户</label>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="db[username]" value="root">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">数据库密码</label>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="db[password]">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">表前缀</label>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="db[prefix]" value="wp_">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">数据库名称</label>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="db[name]" value="wepro">
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">管理选项</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-sm-2 control-label">管理员账号</label>
					<div class="col-sm-4">
						<input class="form-control" type="username" name="user[username]">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">管理员密码</label>
					<div class="col-sm-4">
						<input class="form-control" type="password" name="user[password]">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">确认密码</label>
					<div class="col-sm-4">
						<input class="form-control" type="password"">
					</div>
				</div>
			</div>
		</div>
		<input type="hidden" name="do" id="do" />
		<ul class="pager">
			<li class="previous"><a href="javascript:;" onclick="$('#do').val('back');$('form')[0].submit();"><span class="glyphicon glyphicon-chevron-left"></span> 返回</a></li>
			<li class="previous"><a href="javascript:;" onclick="if(check(this)){jQuery('#do').val('continue');$('form')[0].submit();}">继续 <span class="glyphicon glyphicon-chevron-right"></span></a></li>
		</ul>
	</form>
	<script>
		var lock = false;
		function check(obj) {
			if(lock) {
				return;
			}
			$('.form-control').parent().parent().removeClass('has-error');
			var error = false;
			$('.form-control').each(function(){
				if($(this).val() == '') {
					$(this).parent().parent().addClass('has-error');
					this.focus();
					error = true;
				}
			});
			if(error) {
				alert('请检查未填项');
				return false;
			}
			if($(':password').eq(0).val() != $(':password').eq(1).val()) {
				$(':password').parent().parent().addClass('has-error');
				alert('确认密码不正确.');
				return false;
			}
			lock = true;
			$(obj).parent().addClass('disabled');
			$(obj).html('正在执行安装');
			return true;
		}
	</script>
EOF;
	tpl_frame();
}

function tpl_install_finish() {
	echo <<<EOF
	<div class="page-header"><h3>安装完成</h3></div>
	<div class="alert alert-success">
		恭喜您!已成功安装“WePro - 微信公众平台自助管理系统”，您现在可以: <a target="_blank" class="btn btn-success" href="./index.php">访问网站首页</a>
	</div>
	<div class="form-group">
		<h4><strong>欢迎使用</strong></h4>
		<span class="help-block">应用商城特意为您推荐了一批优秀模块、主题，赶紧来安装几个吧！</span>
		<table class="table table-bordered">
			<tbody>
			</tbody>
		</table>
	</div>

	<div class="alert alert-warning">
		我们强烈建议您立即注册云服务，享受“在线更新”等云服务。
		<a target="_blank" class="btn btn-success" href="./web/index.php?c=cloud&a=profile">马上去注册</a>
		<a target="_blank" class="btn btn-success" href="http://v2.addons.we7.cc" target="_blank">访问应用商城首页</a>
	</div>
EOF;
	tpl_frame();
}

function tpl_resources() {
	static $res = array(
		'logo' => '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',
	);
	return $res;
}