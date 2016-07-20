<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="../"/>
    <title>Bootstrap Tabs选项卡切换代码 - A5源码</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style22.css">
    <link href="css/flat-ui22.css" rel="stylesheet">
    <style type="text/css">
        a:link {color:#FFFfff} /* 未访问的链接 */
        a:visited {color: #FFFfff} /* 已访问的链接 */
        a:hover {color: #FFFfff} /* 鼠标移动到链接上 */
        a:active {color: #FFFfff} /* 选定的链接 */
    </style>

</head>
<body>
<div class="demo">
    <div class="container">
        <div class="row">
                <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-user"></i>音乐播放器</a></li>
                        <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-envelope"></i>视频播放器</a></li>
                        <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab"><i class="fa fa-cube"></i>上传新的音乐or视频</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                            <h3>请查看你要播放的音乐</h3>
                            <p>
                            <div style="float: left; margin-left: 0px;">
                                <table style="width: 200px;height: 310px;">
                                    <tr>
                                        <td><a href="index.php?r=login/ips">IP限制.mp3</a></td>
                                    </tr>

                                    <tr>
                                        <td><a href="#">当前IP.mp3</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">联系客户.mp3</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">联系地址.mp3</a></td>
                                    </tr>
                                </table>
                            </div>
                            <div style="height: 310px;width: 400px; margin-left:300px;" >
                                </table>
                                <table border="1">

                                    <div class="container">
                                        <header>
                                            <div class="support-note"><!-- let's check browser support with modernizr -->
                                                <span class="no-cssanimations">您的浏览器不支持CSS动画</span>
                                                <span class="no-csstransforms">您的浏览器不支持CSS transforms</span>
                                                <span class="no-csstransforms3d">您的浏览器不支持CSS 3D transforms </span>
                                                <span class="no-csstransitions">您的浏览器不支持CSS transitions</span>
                                                <span class="note-ie">抱歉，仅支持现代浏览器。</span>
                                            </div>
                                        </header>
                                        <div id="vc-container" class="vc-container">
                                            <div class="vc-tape-wrapper">
                                                <div class="vc-tape">
                                                    <div class="vc-tape-back">
                                                        <div class="vc-tape-wheel vc-tape-wheel-left"><div></div></div>
                                                        <div class="vc-tape-wheel vc-tape-wheel-right"><div></div></div>
                                                    </div>
                                                    <div class="vc-tape-front vc-tape-side-a">
                                                        <span>A</span>
                                                    </div>
                                                    <div class="vc-tape-front vc-tape-side-b">
                                                        <span>B</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="vc-loader"></div>
                                        </div><!-- //vc-container -->
                                    </div><!-- //container -->
                            </div>
                        </div>
                        <script type="text/javascript" src="vedio1.js"></script>
                        <!-- KnobKnob by Martin Angelov : https://github.com/martinaglv/KnobKnob -->
                        <script src="js/transform.js"></script>
                        <script src="js/knobKnob.jquery.js"></script>

                        <script type="text/javascript" src="js/jquery.cassette.js"></script>
                        <script type="text/javascript">
                            $(function() {
                                $( '#vc-container' ).cassette();

                            });
                        </script>



                                </table>
                                </div>
                                    </p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="Section2">
                            <h3>请查看你要播放的视频</h3>
                            <p>
                            <div style="float: left; margin-left: 0px;">
                                <table style="width: 200px;height: 310px;">
                                    <tr>
                                        <td><a href="index.php?r=login/ips">IP限制.mp3</a></td>
                                    </tr>

                                    <tr>
                                        <td><a href="#">当前IP.mp3</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">联系客户.mp3</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">联系地址.mp3</a></td>
                                    </tr>
                                </table>
                            </div>
                            <div style="height: 310px;width: 400px; margin-left: 300px;" >
                                </table>
                                <table border="1">
                                    <div class="container" style="margin:20px auto;">
                                        <div class="span8 demo-video">
                                            <video class="video-js" controls
                                                   preload="auto" width="620" height="256" poster="images/video/poster.jpg" data-setup="{}">
<!--                                                <source src="http://sc.admin5.com/yeshou.mp4" type='video/mp4'/>-->
<!--                                                <source src="http://sc.admin5.com/oceans-clip.webm" type='video/webm'/>-->
                                            </video>
                                        </div>
                                    </div>
                                </table>
                            </div>
                           </p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="Section3">
                            <h3>请上传音乐或者视频</h3>
                            <form action="web/index.php?r=demo/uploada" method="post" enctype="multipart/form-data">
                                <table  border="1" bgcolor="#5f9ea0" style="margin-top:14px;margin-left:14px;margin-right:14px;margin-bottom:14px;">
                                    <tr>
                                        <td>类型:</td>
                                        <td><select name="u_class" id="">
                                                <option value="1">音乐类型</option>
                                                <option value="2">视频类型</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>浏览文件夹：</td>
                                        <td><input type="file" name="u_file"/></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="上传"/></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>