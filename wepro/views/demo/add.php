<!DOCTYPE html>
<html>
<body>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Panel</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css' />
    <base href="../"/>
    <!-- Styles -->
    <link rel="stylesheet" href="font-awesome-4.2.0/css/font-awesome.css" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <!-- Style -->
    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <!-- Responsive -->

</head>

<body>



<!-- title Date Range -->
<div class="row">
    <div class="masonary-grids">
        <div class="col-md-12">
            <div class="widget-area">
                <h2 class="widget-title"><strong>创建新的公众号</strong></h2>
                <div class="wizard-form-h">
                    <div id="wizard" class="swMain">
                        <ul>
                            <li><a href="#step-1">获取公众号信息<span class="stepDesc">1</span></a>
                            </li>
                            <li><a href="#step-2">设置公众号信息<span class="stepDesc">2</span></a>
                            </li>
                            <li><a href="#step-3">设置权限<span class="stepDesc">3</span></a>
                            </li>
                            <li><a href="#step-4">引导页面<span class="stepDesc">4</span></a>
                            </li>
                            <li><a href="#step-5">完成<span class="stepDesc">5</span></a>
                            </li>
                        </ul>
                        <div id="step-1">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">公众登录用户</label>
                                    <div class="col-sm-9 col-xs-12">
                                        <input name="wxusername" id="username" class="form-control" autocomplete="off" type="text">
                                        <span class="help-block">请输入你的公众平台用户名</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">公众登录密码</label>
                                    <div class="col-sm-9 col-xs-12">
                                        <input name="wxpassword" class="form-control" value="" autocomplete="off" type="password">
                                        <span class="help-block">请输入你的公众平台密码</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="step-2">
                            <div class="container-fluid">
                            <div class="well">
                                <script>
                                    var h = document.documentElement.clientHeight;
                                    $(".gw-container").css('min-height',h);
                                </script><ol class="breadcrumb">
                                    <li><a href="http://localhost/php9/weiqing/web/?refresh"><i class="fa fa-home"></i></a></li>
                                    <li><a href="http://localhost/php9/weiqing/web/index.php?c=account&amp;a=display&amp;">公众号列表</a></li>
                                    <li class="active">编辑主公众号</li>
                                </ol>
                                <style>
                                    .nav-width{border-bottom:0;}
                                    .nav-width li.active{width:20%;text-align:center;overflow:hidden;height:40px;}
                                    .nav-width .normal{background:#EEEEEE;width:26.6%;text-align:center;overflow:hidden;height:40px;}
                                    .guide em{font-style:normal; color:#d9534f;}
                                    .guide .list-group .list-group-item a{color:#07d;}
                                    .guide .list-group .list-group-item{padding-top:20px;}
                                    .guide .img{margin-bottom:15px; display:inline-block; border:1px solid #cccccc;padding:3px;}
                                    .guide .con{padding: 10px 30px;}
                                </style>
                                <div class="clearfix">
                                    <form action="web/index.php?r=demo/addpublicnumber" method="post" class="form-horizontal" role="form" enctype="multipart/form-data" id="form1">
                                        <input name="step" value="2" type="hidden">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                设置公众号信息
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span> 公众号名称</label>
                                                    <div class="col-sm-9 col-xs-12">
                                                        <input name="cname" class="form-control" autocomplete="off" type="text">
                                                        <span class="help-block">填写公众号的帐号名称</span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">描述</label>
                                                    <div class="col-sm-9 col-xs-12">
                                                        <textarea style="height: 80px;" class="form-control" name="description"></textarea>
                                                        <span class="help-block">用于说明此公众号的功能及用途。</span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">公众号帐号</label>
                                                    <div class="col-sm-9 col-xs-12">
                                                        <input name="account" class="form-control" autocomplete="off" type="text">
                                                        <span class="help-block">填写公众号的帐号，一般为英文帐号</span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">原始ID</label>
                                                    <div class="col-sm-9 col-xs-12">
                                                        <input name="original" class="form-control" autocomplete="off" type="text">
                                                        <span class="help-block">在给粉丝发送客服消息时,原始ID不能为空。建议您完善该选项</span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">级别</label>
                                                    <div class="col-sm-9 col-xs-12">
                                                        <label for="status_1" class="radio-inline"><input autocomplete="off" name="level" id="status_1" value="1" checked="checked" type="radio"> 普通订阅号</label>
                                                        <label for="status_2" class="radio-inline"><input autocomplete="off" name="level" id="status_2" value="2" type="radio"> 普通服务号</label>
                                                        <label for="status_3" class="radio-inline"><input autocomplete="off" name="level" id="status_3" value="3" type="radio"> 认证订阅号</label>
                                                        <label for="status_4" class="radio-inline"><input autocomplete="off" name="level" id="status_4" value="4" type="radio"> 认证服务号/认证媒体/政府订阅号</label>
                                                        <span class="help-block">注意：即使公众平台显示为“未认证”, 但只要【公众号设置】/【账号详情】下【认证情况】显示资质审核通过, 即可认定为认证号.</span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">AppId</label>
                                                    <div class="col-sm-9 col-xs-12">
                                                        <input name="key" class="form-control" autocomplete="off" type="text">
                                                        <div class="help-block">请填写微信公众平台后台的AppId</div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">AppSecret</label>
                                                    <div class="col-sm-9 col-xs-12">
                                                        <input name="secret" class="form-control" autocomplete="off" type="text">
                                                        <div class="help-block">请填写微信公众平台后台的AppSecret, 只有填写这两项才能管理自定义菜单</div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">Oauth 2.0</label>
                                                    <div class="col-sm-9 col-xs-12">
                                                        <p class="form-control-static">在微信公众号请求用户网页授权之前，开发者需要先到公众平台网站的【开发者中心】<b>网页服务</b>中配置授权回调域名。<a href="http://www.we7.cc/manual/dev:v0.6:qa:mobile_redirect_url_error" target="_black">查看详情</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input name="submit" value="添加" class="btn btn-primary" type="submit">
                                                <input name="token" value="de980b4c" type="hidden">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <script type="text/javascript">
                                    $('.clip p a').each(function(){
                                        util.clip(this, $(this).text());
                                    });
                                    require(['biz', 'filestyle'], function(biz){
                                        $(function(){
                                            $('#username').blur(function(){
                                                if ($('#username').val()) {
                                                    var type = $('input[name="type"]:checked').val() ? $('input[name="type"]:checked').val() : 1;
                                                    $('#imgverify').attr('src', './index.php?c=utility&a=wxcode&username=' + $('#username').val()+'&r='+Math.round(new Date().getTime()));
                                                    $('#imgverify').parent().parent().parent().show();
                                                    return false;
                                                }
                                            });
                                            $('#toggle').click(function(){
                                                if ($('#username').val()) {
                                                    var type = $('input[name="type"]:checked').val() ? $('input[name="type"]:checked').val() : 1;
                                                    $('#imgverify').attr('src', './index.php?c=utility&a=wxcode&username=' + $('#username').val()+'&r='+Math.round(new Date().getTime()));
                                                    $('#imgverify').parent().parent().parent().show();
                                                    return false;
                                                }
                                            });
                                            $(".form-group").find(':file').filestyle({buttonText: '上传图片'});
                                        });
                                    });
                                    function tokenGen() {
                                        var letters = 'abcdefghijklmnopqrstuvwxyz0123456789';
                                        var token = '';
                                        for(var i = 0; i < 32; i++) {
                                            var j = parseInt(Math.random() * (31 + 1));
                                            token += letters[j];
                                        }
                                        $(':text[name="wetoken"]').val(token);
                                    }
                                    function EncodingAESKeyGen() {
                                        var letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                                        var token = '';
                                        for(var i = 0; i < 43; i++) {
                                            var j = parseInt(Math.random() * 61 + 1);
                                            token += letters[j];
                                        }
                                        $(':text[name="encodingaeskey"]').val(token);
                                    }
                                </script>
                            </div>
                        </div>
                            <script type="text/javascript">
                                require(['bootstrap']);
                                function checkupgrade() {
                                    require(['util'], function(util) {
                                        if (util.cookie.get('checkupgrade_sys')) {
                                            return;
                                        }
                                        $.getJSON("./index.php?c=utility&a=checkupgrade&do=system&", function(ret){
                                            if (ret && ret.message && ret.message.upgrade == '1') {
                                                $('body').prepend('<div id="upgrade-tips" class="upgrade-tips"><a href="./index.php?c=cloud&a=upgrade&">系统检测到新版本 '+ret.message.version+' ('+ ret.message.release +') ，请尽快更新！</a><span class="tips-close" style="background:#d03e14;" onclick="checkupgrade_hide();"><i class="fa fa-times-circle"></i></span></div>');
                                                if ($('#upgrade-tips-module').size()) {
                                                    $('#upgrade-tips').css('top', '25px');
                                                }
                                            }
                                        });
                                    });
                                }

                                function checkupgrade_hide() {
                                    require(['util'], function(util) {
                                        util.cookie.set('checkupgrade_sys', 1, 3600);
                                        $('#upgrade-tips').hide();
                                    });
                                }
                                $(function(){
                                    checkupgrade();
                                });

                                function checknotice() {
                                    $.post("./index.php?c=utility&a=notice&", {}, function(data){
                                        var data = $.parseJSON(data);
                                        $('#notice-container').html(data.notices);
                                        $('#notice-total').html(data.total);
                                        if(data.total > 0) {
                                            $('#notice-total').css('background', '#ff9900');
                                        } else {
                                            $('#notice-total').css('background', '');
                                        }
                                        setTimeout(checknotice, 60000);
                                    });
                                }
                                checknotice();
                            </script>
                        </div>

                        <div id="step-3">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">短信剩余条数</label>
                                    <div class="col-sm-9 col-xs-12">

                                        <div class="input-group">
                                            <input name="balance" id="balance" readonly="readonly" class="form-control" autocomplete="off" type="text">
					<span class="input-group-btn">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#edit_sms">编辑短信条数</button>
					</span>
                                        </div>
                                        <span class="help-block">请填写短信剩余条数,必须为整数。</span>

                                        <div class="modal fade" id="edit_sms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title" id="">修改短信条数</h4>
                                                    </div>
                                                    <div class="modal-body" style="height: 90px;">
                                                        <div class="form-group">
                                                            <label class="col-xs-12 col-sm-5 col-md-6 col-lg-3 control-label">短信条数</label>
                                                            <div class="col-sm-6 col-xs-12 col-md-7">
                                                                <div class="input-group" style="width: 180px;">
                                                                    <div class="input-group-btn">
                                                                        <button type="button" class="btn btn-defaultt label-success" id="edit_add">+</button>
                                                                    </div>
                                                                    <!--<span class="input-group-addon label-danger"  id="edit_alert" style="width: 10px;">+ </span>-->
                                                                    <input class="form-control" id="edit_num" value="+0" type="text">
                                                                    <div class="input-group-btn">
                                                                        <button type="button" class="btn btn-default" id="edit_minus">-</button>
                                                                    </div>
                                                                </div>
                                                                <div class="help-block">点击加号或减号切换修改短信条数方式</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" id="edit_sms_sub" class="btn btn-primary">保存</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            var status = 'add';
                                            $('#edit_add').click(function() {
                                                status = 'add';
                                                var edit_num = $('#edit_num').val();
                                                $('#edit_num').val('+'+Math.abs(edit_num));
                                                $('#edit_add').attr('class', 'btn btn-defaultt label-success');
                                                $('#edit_minus').attr('class', 'btn btn-default');
                                            });
                                            $('#edit_num').blur(function() {
                                                var sign = status == 'add' ? '+' : '-';
                                                $('#edit_num').val(sign + parseInt(Math.abs($('#edit_num').val())));

                                            });
                                            $('#edit_minus').click(function() {
                                                status = 'minus';
                                                var edit_num = $('#edit_num').val();
                                                $('#edit_num').val('-'+Math.abs(edit_num));
                                                $('#edit_minus').attr('class', 'btn btn-defaultt label-danger');
                                                $('#edit_add').attr('class', 'btn btn-default');
                                            });
                                            $('#edit_sms_sub').click(function () {
                                                var edit_num = $('#edit_num').val() == '' ? 0 : Math.abs(parseInt($('#edit_num').val()));
                                                var uniacid = 4;
                                                $.post('./index.php?c=account&a=post-step&do=edit_sms&step=3', {'balance' : edit_num, 'uniacid' : uniacid, 'status' : status}, function(data) {
                                                    var data = $.parseJSON(data);
                                                    if (data.message.errno > 0) {
                                                        $('#balance').val(data.message.message);
                                                        $('#edit_sms').modal('toggle');
                                                    } else {
                                                        util.message('您现有短信数量为0，请联系服务商购买短信');
                                                        $('#edit_sms').modal('toggle');
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">短信签名</label>
                                    <div class="col-sm-9 col-xs-12">
                                        <select name="signature" class="form-control">
                                        </select>
                                        <span class="help-block">请填写短信签名。未审核签名可以通过<a href="http://localhost/php9/weiqing/web/index.php?c=cloud&amp;a=sms&amp;">云短信</a>审核签名</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">公众号管理员（主）</label>
                                    <div class="col-sm-9 col-xs-12">
                                        <p class="form-control-static">
							<span id="manager" class="label label-success">
								<input name="uid" value="" type="hidden">							</span>&nbsp;
                                            <a id="btn-add" href="javascript:;">选择用户</a>&nbsp;-&nbsp;
                                            如果是新用户请先<a onclick="util.ajaxshow('./index.php?c=user&amp;a=create&amp;', '添加主管理员', {'width': 800});" href="javascript:;">添加</a>
                                        </p>
                                        <div class="help-block">
                                            一个公众号只可拥有一个主管理员，管理员有管理公众号和添加操作员的权限<br>
                                            未指定主管理员时将默认属于创始人，则公众号具有所有模块及模板权限
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否设置帐户/服务过期时间</label>
                                    <div class="col-sm-9 col-xs-12">
                                        <label class="radio-inline"><input name="is-set-endtime" value="1" id="radio_1" onclick="if ($('input[name=uid]').val()) {$('.js-set-endtime-panel').show();} else { util.message('请先选择该公众号所属的主管理员'); return false;}" type="radio"> 设置</label>
                                        <label class="radio-inline"><input checked="checked" name="is-set-endtime" value="0" id="radio_0" onclick="$('.js-set-endtime-panel').hide();" type="radio"> 不限</label>
                                    </div>
                                </div>
                                <div class="form-group js-set-endtime-panel" style="display:none;">
                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                                    <div class="col-sm-9 col-xs-12">
                                        <p class="form-control-static">

                                            <script type="text/javascript">
                                                require(["datetimepicker"], function(){
                                                    $(function(){
                                                        var option = {
                                                            lang : "zh",
                                                            step : 5,
                                                            timepicker : false,
                                                            closeOnDateSelect : true,
                                                            format : "Y-m-d"
                                                        };
                                                        $(".datetimepicker[name = 'endtime']").datetimepicker(option);
                                                    });
                                                });
                                            </script><input name="endtime" value="2016-07-17" placeholder="请选择日期时间" readonly="readonly" class="datetimepicker form-control" style="padding-left:12px;" type="text">						</p>
                                        <span class="help-block">用户的使用时间过期时，将来无法登录，公众号权限也暂停使用，不设置为永久可用</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">管理员用户组</label>
                                    <div class="col-sm-9 col-xs-12">
                                        <select name="groupid" class="form-control" id="groupid">
                                            <option selected="selected" value="0" data-package="[]">不设置</option>

                                            <option value="1" data-package="[1]">体验用户组</option>
                                            <option value="2" data-package="[1]">白金用户组</option>
                                            <option value="3" data-package="[1]">黄金用户组</option>n>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div id="step-4">

                        </div>
                        <div id="step-5">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide Panel -->
    </div>
    <!-- Page Container -->
</div>
<!-- main -->


<!-- Script -->
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/enscroll.js"></script>
<script type="text/javascript" src="js/grid-filter.js"></script>
<script type="text/javascript" src="js/jquery.smartWizard.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var options = {
            labelNext: '下一步',
            labelPrevious: '上一步',
            labelFinish: '完成'
//            onLeaveStep: leavestepCallback,
//            onShowStep: showstepCallback,
//            enableAllSteps: true
        };
        // Smart Wizard
        $('#wizard').smartWizard(options, 'sad');

        function onFinishCallback() {
            $('#wizard').smartWizard(options, options);
            //alert('Finish Clicked');
        }
    });
</script>

</body>

</html>
<?php


?>