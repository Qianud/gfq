<!DOCTYPE html>
<html>
<body>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="../"/>
    <title>Admin Panel</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css' />
</head>

<body>



<!-- title Date Range -->
<div class="row">
    <div class="masonary-grids">
        <div class="col-md-12">
            <div class="widget-area">
                <h2 class="widget-title"><strong>Wizard</strong> Form</h2>
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

                        </div>

                        <div id="step-2">

                        </div>

                        <div id="step-3">

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
<script type="text/javascript">
    $(document).ready(function() {
        // Smart Wizard
        $('#wizard').smartWizard();

        function onFinishCallback() {
            $('#wizard').smartWizard('showMessage', 'Finish Clicked');
            //alert('Finish Clicked');
        }
    });
</script>

</body>

</html>