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
    <style>
        .con {
            width: 100%;
            height: 300px;
            background: pink;
            display: table;
        }

        .txt {
            vertical-align: middle;
            display: table-cell;
        }
    </style>
</head>

<body>
            <!-- breadcrumbs -->
            <div class="container">
                <div class="title-date-range">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="main-title">
                                <h1>公众号列表</h1>
                            </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </div>
                <!-- title Date Range -->
                <div class="row">
                    <div class="masonary-grids">
                        <div class="col-md-12">
                            <div class="widget-area">
                                <div class="streaming-table">
                                    <div class="progress progress-striped active w-tooltip">
                                        <div id="record_count" class="progress-bar progress-bar-success pink large-progress" style="width: 0%">0</div>
                                    </div>
                                    <span id="found" class="label label-info"></span>
                                    <table id="stream_table" class='table table-striped table-bordered'>
                                        <thead>
                                        <tr>
                                            <th>公众号名称</th>
                                            <th>级别</th>
                                            <th>appID</th>
                                            <th>appSecret</th>
                                            <th>操作</th>
                                        </tr>
                                        <?php foreach($name as $key=>$value) {?>
                                            <tr style="line-height:0px" bgcolor="#ffffff">
                                                <td><?php echo $value['cname']?></td>
                                                <td><?php if($value['levela']=='1')
                                                    {
                                                        echo "普通订阅号";
                                                    }
                                                    else if($value['levela']=='2'){
                                                        echo "普通服务号";
                                                    }
                                                    else
                                                    {
                                                        echo "认证订阅号";
                                                    }

                                                    ?></td>
                                                <td><?php echo $value['keya']?></td>
                                                <td><?php echo $value['secreta']?></td>
                                                <td>
                                                    <button type="reset"  class="btn btn-warning cancel va" aid="<?php echo $value['id']?>">
                                                        <i class="fa fa-ban"></i>
                                                        <span>查看</span>
                                                    </button>

                                                    <button type="button" class="btn btn-danger delete click" id="btns" aid="<?php echo $value['id']?>">
                                                        <i class="fa fa-trash"><span>删除</span></i>
<!--                                                        <span id="--><?php //echo $value['id']?><!--">删除</span>-->

                                                    </button>
<!--                                                    <a href="web/index.php?r=demo/deletes&id=--><?php //echo $value['id'] ?><!--">删除</a>-->
                                                </td>
                                            </tr>
                                        <?php }?>
                                        </thead>

                                        <tbody>

                                        </tbody>
                                    </table>

                                    <div id="summary">

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
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
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/enscroll.js"></script>
<script type="text/javascript" src="js/grid-filter.js"></script>

<script src="js/streaming-mustache.js" type="text/javascript"></script>
<script src="js/stream_table.js" type="text/javascript"></script>
<script src="js/movie_data.js" type="text/javascript"></script>
<script src="js/stream.js" type="text/javascript"></script>

<!-- Streaming Table -->


</body>

</html>
<script>
    $(function(){
        $(document).on("click",".click",function(){
            //alert("121");die;
            var a=$(this);
            var id=$(this).attr('aid');
            //alert(id);die;
            $.ajax({
                type:'post',
                url:'web/index.php?r=demo/dels',
                data:{
                    id:id
                },
                success:function(cb){

                    a.parents("tr").hide();
                }
                })
        })
    })
</script>
<script>
    $(function(){
        $(".va").click(function() {
            var id=$(this).attr('aid');
            //alert(id);die;
            location.href = "web/index.php?r=demo/looks&id="+id;
        })
    })
</script>
