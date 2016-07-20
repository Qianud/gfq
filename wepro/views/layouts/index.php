<?php
$session=\Yii::$app->session;
?>
<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="../"/>
    <title>Admin Panel</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css' />

    <!-- Styles -->
    <link rel="stylesheet" href="font-awesome-4.2.0/css/font-awesome.css" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <!-- Style -->
    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <!-- Responsive -->
    <!-- Responsive -->
    <link rel="stylesheet" href="css/jquery-jvectormap.css" type="text/css" />


</head>

<body>

<div class="main">
    <header class="header">
        <div class="logo">
            <a href="dashboard.html" title=""><img src="images/logo2.png" alt="" />
            </a>
            <a title="" class="toggle-menu"><i class="fa fa-bars"></i></a>
        </div>
        <form class="search">
            <input type="text" placeholder="Search..." />
            <button type="button"><i class="fa fa-search"></i>
            </button>
        </form>
        <div class="custom-dropdowns">
            <div class="message-list dropdown">
                <a title=""><span class="blue">4</span><i class="fa fa-envelope-o"></i></a>
                <div class="message drop-list">
                    <span>You have 4 New Messages</span>
                    <ul>
                        <li>
                            <a href="#" title=""><span><img src="images/resource/sender1.jpg" alt="" /></span><i>Labrina Scholer</i>Hi! How are you?...<h6>2 min ago..</h6><p class="status blue">New</p></a>
                        </li>
                        <li>
                            <a href="#" title=""><span><img src="images/resource/sender2.jpg" alt="" /></span><i>Jonathan</i>Hi! How are you?...<h6>2 min ago..</h6><p class="status red">Unsent</p></a>
                        </li>
                        <li>
                            <a href="#" title=""><span><img src="images/resource/sender3.jpg" alt="" /></span><i>Barada knol</i>Hi! How are you?...<h6>2 min ago..</h6><p class="status green">Reply</p></a>
                        </li>
                        <li>
                            <a href="#" title=""><span><img src="images/resource/sender4.jpg" alt="" /></span><i>Samtha Gee</i>Hi! How are you?...<h6>2 min ago..</h6><p class="status">New</p></a>
                        </li>
                    </ul>
                    <a href="inbox.html" title="">See All Messages</a>
                </div>
            </div>
            <!-- Message List -->
            <div class="notification-list dropdown">
                <a title=""><span class="green">3</span><i class="fa fa-bell-o"></i></a>
                <div class="notification drop-list">
                    <span>You have 3 New Notifications</span>
                    <ul>
                        <li>
                            <a href="#" title=""><span><i class="fa fa-bug red"></i></span>Server 3 is Over Loader Please Check... <h6>2 min ago..</h6></a>
                        </li>
                        <li>
                            <a href="#" title=""><span><img src="images/resource/sender2.jpg" alt="" /></span><i>MD Daisal</i>New User Registered<h6>4 min ago..</h6><p class="status red">Urgent</p></a>
                        </li>
                        <li>
                            <a href="#" title=""><span><i class="fa fa-bullhorn green"></i></span>Envato Has change the policies<h6>7 min ago..</h6></a>
                        </li>
                    </ul>
                    <a href="#" title="">See All Notifications</a>
                </div>
            </div>
            <!-- Notification List -->
            <div class="activity-list dropdown">
                <a title=""><span class="red">4</span><i class="fa fa-clock-o"></i></a>
                <div class="activity drop-list">
                    <span>Recent Activity</span>
                    <ul>
                        <li>
                            <a href="#" title=""><span><img src="images/resource/sender2.jpg" alt="" /></span><i>Jona Than</i>Uploading new files<h6>2 min ago..</h6><p class="status green">Online</p></a>
                            <div class="progress">
                                <div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar blue">
                                    60%
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#" title=""><span><img src="images/resource/sender1.jpg" alt="" /></span><i>Bela Nisaa</i>Downloading new Documents<h6>2 min ago..</h6></a>
                            <div class="progress">
                                <div style="width: 34%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="34" role="progressbar" class="progress-bar red">
                                    34%
                                </div>
                            </div>
                        </li>
                    </ul>
                    <a href="#" title="">See All Activity</a>
                </div>
            </div>
            <!-- Activity List -->
        </div>
        <a title="" class="slide-panel-btn"><i class="fa fa-gear fa-spin"></i></a>
        <div class="dropdown profile">
            <a title="">
                <img src="images/resource/me.jpg" alt="" /><?php echo $session->get("username")?><i class="caret"></i>
            </a>
            <div class="profile drop-list">
                <ul>
                    <li><a href="#" title=""><i class="fa fa-edit"></i> New post</a>
                    </li>
                    <li><a href="#" title=""><i class="fa fa-wrench"></i> Setting</a>
                    </li>
                    <li><a href="profile.html" title=""><i class="fa fa-user"></i> Profile</a>
                    </li>
                    <li><a href="faq.html" title=""><i class="fa fa-info"></i> Help</a>
                    </li>
                </ul>
            </div>
            <!-- Profile DropDown -->

        </div>
    </header>
    <!-- Header -->
    <div class="page-container menu-left">
        <aside class="sidebar">
            <div class="profile-stats">
                <div class="mini-profile">
                    <span><img src="images/resource/me.jpg" alt="" /></span>
                    <h3><?php echo $session->get("username")?></h3>
                    <h6 class="status online"><i></i> Online</h6>
                    <a href="web/index.php?r=login/userout" title="Logout" class="logout red" data-toggle="tooltip" data-placement="right"><i class="fa fa-power-off"></i></a>
                </div>
                <div class="quick-stats">
                    <h5>Today Report</h5>
                    <ul>
                        <li><span>456<i>Sales</i></span>
                        </li>
                        <li><span>2,345<i>Order</i></span>
                        </li>
                        <li><span>$120<i>Revenue</i></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="menu-sec">
                <div id="menu-toogle" class="menus">
                    <div class="single-menu">
                        <h2><a title="" href="web/index.php?r=demo/idex"><i class="fa fa-home"></i><span>首页</span></a><i class="blue">3</i></h2>
                    </div>
                    <div class="single-menu">
                        <h2><a title=""><i class="fa fa-desktop"></i><span>微信公众号</span></a></h2>
                        <div class="sub-menu">
                            <ul>
                                <li><a href="web/index.php?r=demo/add" title="">添加微信公众号</a>
                                </li>
                                <li><a href="web/index.php?r=demo/add2" title="">公众号列表</a>
                                </li>
                                <li><a href="web/index.php?r=demo/show" title="">音乐视频播放器</a>
                                </li>
                                <li><a href="web/index.php?r=demo/ceshi" title="">Menu</a>
                                </li>
                                <li><a href="panel-left-menu-right.html" title="">自动回复</a>
                                </li>
                                <li><a href="panel-right-menu-left.html" title="">Panel Right Menu Left</a>
                                </li>
                                <li><a href="sidebar-left.html" title="">Sidebar left</a>
                                </li>
                                <li><a href="sidebar-right.html" title="">Sidebar Right</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-menu">
                        <h2><a href="widgets.html" title=""><i class="fa fa-flask"></i><span>Widgets</span></a></h2>
                    </div>
                    <div class="single-menu">
                        <h2><a title=""><i class="fa fa-heart-o"></i><span>UI Elements</span></a></h2>
                        <div class="sub-menu">
                            <ul>
                                <li><a href="inbox.html" title="">Mail Box</a>
                                </li>
                                <li><a href="profile.html" title="">Profile</a>
                                </li>
                                <li><a href="buttons.html" title="">Buttons</a>
                                </li>
                                <li><a href="timeline.html" title="">Timeline</a>
                                </li>
                                <li><a href="typography.html" title="">Typography</a>
                                </li>
                                <li><a href="calendars.html" title="">Calendars</a>
                                </li>
                                <li><a href="upload-crop.html" title="">Upload Crop</a>
                                </li>
                                <li><a href="tour.html" title="">Page Tour</a>
                                </li>
                                <li><a href="tree-list.html" title="">Tree List</a>
                                </li>
                                <li><a href="collapse.html" title="">Collapse</a>
                                </li>
                                <li><a href="editor.html" title="">Editor</a>
                                </li>
                                <li><a href="form.html" title="">Forms</a>
                                </li>
                                <li><a href="gallery-dynamic.html" title="">Gallery Dynamic</a>
                                </li>
                                <li><a href="gallery-static.html" title="">Gallery Static</a>
                                </li>
                                <li><a href="grids.html" title="">Grids</a>
                                </li>
                                <li><a href="icons.html" title="">Icons</a>
                                </li>
                                <li><a href="notifications.html" title="">Notification</a>
                                </li>
                                <li><a href="price-table.html" title="">Price Tables</a>
                                </li>
                                <li><a href="range-slider.html" title="">Range Slider</a>
                                </li>
                                <li><a href="slider.html" title="">Slider</a>
                                </li>
                                <li><a href="sortable.html" title="">Sortable</a>
                                </li>
                                <li><a href="tables.html" title="">Tables</a>
                                </li>
                                <li><a href="tasks.html" title="">Tasks</a>
                                </li>
                                <li><a href="tasks-widget.html" title="">Task Widgets</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-menu">
                        <h2><a href="form.html" title=""><i class="fa fa-paperclip"></i><span>Form Stuffs</span></a></h2>
                    </div>
                    <div class="single-menu">
                        <h2><a href="charts.html" title=""><i class="fa fa-bar-chart"></i><span>Charts</span></a></h2>
                    </div>
                    <div class="single-menu">
                        <h2><a title=""><i class="fa fa-paper-plane-o"></i><span>Pages</span></a></h2>
                        <div class="sub-menu">
                            <ul>
                                <li><a href="404.html" title="">404 Error</a>
                                </li>
                                <li><a href="blank.html" title="">Blank</a>
                                </li>
                                <li><a href="contact.html" title="">Contact</a>
                                </li>
                                <li><a href="google-map.html" title="">Google Map</a>
                                </li>
                                <li><a href="vector-map.html" title="">Vector Map</a>
                                </li>
                                <li><a href="invoice.html" title="">Invoice</a>
                                </li>
                                <li><a href="pattern-login.html" title="">Pattern Login</a>
                                </li>
                                <li><a href="index.html" title="">Simple Login</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu Sec -->
        </aside>
        <!-- Aside Sidebar -->
        <div class="content-sec">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="dashboard.html" title=""><i class="fa fa-home"></i></a>/</li>
                    <li><a title="">Invoice</a>
                    </li>
                </ul>
            </div>
            <!-- breadcrumbs -->
            <div class="container">
                <?= $content?>
            </div>
        </div>
        <!-- Content Sec -->
        <div class="slide-panel" id="panel-scroll">
            <ul role="tablist" class="nav nav-tabs panel-tab-btn">
                <li class="active"><a data-toggle="tab" role="tab" href="#tab1"><i class="fa fa-inbox"></i><span>Your Emails</span></a>
                </li>
                <li><a data-toggle="tab" role="tab" href="#tab2"><i class="fa fa-wrench"></i><span>Your Setting</span></a>
                </li>
            </ul>
            <div class="tab-content panel-tab">
                <div id="tab1" class="tab-pane fade in active">
                    <div class="recent-mails-widget">
                        <form>
                            <div id="searchMail"></div>
                        </form>
                        <h3>Recent Emails</h3>
                        <ul id="mail-list" class="mail-list">
                            <li>
                                <div class="title">
                                    <span><img src="images/resource/sender1.jpg" alt="" /><i class="online"></i></span>
                                    <h3><a href="#" title="">Kim Hostwood</a><span>5 min ago</span></h3>
                                    <a href="#" data-toggle="tooltip" data-placement="left" title="Attachment"><i class="fa fa-paperclip"></i></a>
                                </div>
                                <h4>Themeforest Admin Template</h4>
                                <p>This product is so good that i manage to buy it 1 for me and 3 for my families.</p>
                            </li>
                            <li>
                                <div class="title">
                                    <span><img src="images/resource/sender2.jpg" alt="" /><i class="online"></i></span>
                                    <h3><a href="#" title="">John Doe</a><span>2 hours ago</span></h3>
                                    <a href="#" data-toggle="tooltip" data-placement="left" title="Attachment"><i class="fa fa-paperclip"></i></a>
                                </div>
                                <h4>Themeforest Admin Template</h4>
                                <p>This product is so good that i manage to buy it 1 for me and 3 for my families.</p>
                            </li>
                            <li>
                                <div class="title">
                                    <span><img src="images/resource/sender3.jpg" alt="" /><i class="offline"></i></span>
                                    <h3><a href="#" title="">Jonathan Doe</a><span>8 min ago</span></h3>
                                    <a href="#" data-toggle="tooltip" data-placement="left" title="Attachment"><i class="fa fa-paperclip"></i></a>
                                </div>
                                <h4>Themeforest Admin Template</h4>
                                <p>This product is so good that i manage to buy it 1 for me and 3 for my families.</p>
                            </li>
                        </ul>
                        <a href="inbox.html" title="" class="red">View All Messages</a>
                    </div>
                    <!-- Recent Email Widget -->

                    <div class="file-transfer-widget">
                        <h3>FILE TRANSFER <i class="fa fa-angle-down"></i></h3>
                        <div class="toggle">
                            <ul>
                                <li>
                                    <i class="fa fa-file-excel-o"></i>
                                    <h4>my-excel.xls<i>20 min ago</i></h4>
                                    <div class="progress">
                                        <div style="width: 90%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="90" role="progressbar" class="progress-bar red">
                                            90%
                                        </div>
                                    </div>
                                    <div class="file-action-btn">
                                        <a href="#" title="Approve" class="green" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-check"></i></a>
                                        <a href="#" title="Cancel" class="red" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-close"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa fa-file-pdf-o"></i>
                                    <h4>my-cv.pdf<i>8 min ago</i></h4>
                                    <div class="progress">
                                        <div style="width: 40%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar blue">
                                            40%
                                        </div>
                                    </div>
                                    <div class="file-action-btn">
                                        <a href="#" title="Approve" class="green" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-check"></i></a>
                                        <a href="#" title="Cancel" class="red" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-close"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa fa-file-video-o"></i>
                                    <h4>portfolio-shoot.mp4<i>12 min ago</i></h4>
                                    <div class="progress">
                                        <div style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar" class="progress-bar green">
                                            70%
                                        </div>
                                    </div>
                                    <div class="file-action-btn">
                                        <a href="#" title="Approve" class="green" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-check"></i></a>
                                        <a href="#" title="Cancel" class="red" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-close"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- File Transfer -->
                </div>
                <div id="tab2" class="tab-pane fade">
                    <div class="setting-widget">
                        <form>
                            <h3>Accounts</h3>
                            <div class="toggle-setting">
                                <span>Office Account</span>
                                <label class="toggle-switch">
                                    <input type="checkbox">
                                    <span data-unchecked="Off" data-checked="On"></span>
                                </label>
                            </div>
                            <div class="toggle-setting">
                                <span>Personal Account</span>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span data-unchecked="Off" data-checked="On"></span>
                                </label>
                            </div>
                            <div class="toggle-setting">
                                <span>Business Account</span>
                                <label class="toggle-switch">
                                    <input type="checkbox">
                                    <span data-unchecked="Off" data-checked="On"></span>
                                </label>
                            </div>
                        </form>

                        <form>
                            <h3>General Setting</h3>
                            <div class="toggle-setting">
                                <span>Notifications</span>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span data-unchecked="Off" data-checked="On"></span>
                                </label>
                            </div>
                            <div class="toggle-setting">
                                <span>Notification Sound</span>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span data-unchecked="Off" data-checked="On"></span>
                                </label>
                            </div>
                            <div class="toggle-setting">
                                <span>My Profile</span>
                                <label class="toggle-switch">
                                    <input type="checkbox">
                                    <span data-unchecked="Off" data-checked="On"></span>
                                </label>
                            </div>
                            <div class="toggle-setting">
                                <span>Show Online</span>
                                <label class="toggle-switch">
                                    <input type="checkbox">
                                    <span data-unchecked="Off" data-checked="On"></span>
                                </label>
                            </div>
                            <div class="toggle-setting">
                                <span>Public Profile</span>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span data-unchecked="Off" data-checked="On"></span>
                                </label>
                            </div>
                        </form>
                    </div>
                    <!-- Setting Widget -->
                </div>
            </div>
        </div>
        <!-- Slide Panel -->
    </div>
    <!-- Page Container -->
</div>
<!-- main -->
<!-- Script -->
<script type="text/javascript" src="js/jquery-jvectormap.js"></script>
<script type="text/javascript" src="js/jquery-jvectormap-world-en.js"></script>
<script type="text/javascript" src="js/gdp-data.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/enscroll.js"></script>
<script type="text/javascript" src="js/grid-filter.js"></script>
<script type="text/javascript" src="js/jquery.smartWizard.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Smart Wizard
        $('#wizard').smartWizard();

        function onFinishCallback() {
            $('#wizard').smartWizard('showMessage', 'Finish Clicked');
            //alert('Finish Clicked');
        }
    });
    $(document).ready(function() {

        $(function() {
            $('#map').vectorMap({
                map: 'world_en'
            });
        })
    });
</script>
</body>

</html>