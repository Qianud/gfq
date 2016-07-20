<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

</head>

<body>

<p>　</p>
<p class="msg">接口的详细信息</p>

<div class="invoice">
    <!-- Invoice Table Head -->
<!--    class="descddription"-->
    <ul>
        <li>

                <div>
                    <p>信息ID：<?php echo $name['id']?></p>
                </div>
                <div>
                    <p>接入类型:未接入</p>
                </div>
                <div>
                    <p>URL：<?php echo $name['url']?></p>
                </div>
                <div>
                    <p>Token:<?php echo $name['token']?></p>
                </div>
            <div>
                <p>添加时间:<?php echo $name['time']?></p>
            </div>
        </li>

    </ul>
    <!-- Invoice Table Structure -->
</div>

<!-- Invoice -->
<div class="total"><a title="" class="green" href="web/index.php?r=demo/add2">返回</a>
</div>
<!-- Content Sec -->

<!-- Slide Panel --
<!-- main -->


<!-- Script -->
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/enscroll.js"></script>
<script type="text/javascript" src="js/grid-filter.js"></script>

</body>

</html>