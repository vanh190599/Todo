<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->


<!DOCTYPE html>
<head>
<title>Admin - home</title>

<base href="{{asset('')}}">

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="adm/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="adm/css/style.css" rel='stylesheet' type='text/css' />
<link href="adm/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="adm/css/font.css" type="text/css"/>
<link href="adm/css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome icons -->
<script src="adm/js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
    <h2>Sign In Now</h2>
{{--    action di chuyen toi admin-dashboard (post) -> chay controller -> mang theo email/mat khau da nhap di de xu ly--}}
    <form action="{{URL::to('admin-dashboard')}}" method="post">
        {{ csrf_field()  }}
        <input type="email" class="ggg" name="admin_email" placeholder="E-MAIL" required="">
        <input type="password" class="ggg" name="admin_password" placeholder="PASSWORD" required="">
        <p style="color: red"> {{ isset($loi)?$loi:"" }} </p>
{{--        <span><input type="checkbox" />Remember Me</span>--}}
{{--        <h6><a href="#">Forgot Password?</a></h6>--}}


        <p>
            <img  style="width: 25px; height: 25px; color: blue" src="https://scontent-hkg3-1.xx.fbcdn.net/v/t1.15752-9/52364128_259663881618232_9176444687307767808_n.png?_nc_cat=106&_nc_sid=b96e70&_nc_ohc=BxvV_sPRgcwAX9T3tLI&_nc_ht=scontent-hkg3-1.xx&oh=078945eb58621d7f3c5b99769e096335&oe=5EA13B4B" alt="">
            <a href="{{ url('admin/login-facebook') }}" style="color: white" > Login with Facebook</a>
        </p>

        <div class="clearfix"></div>
        <input type="submit" value="Sign In" name="login">
    </form>
{{--    <p>Don't Have an Account ?<a href="registration.html">Create an account</a></p>--}}

</div>
</div>
<script src="adm/js/bootstrap.js"></script>
<script src="adm/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="adm/js/scripts.js"></script>
<script src="adm/js/jquery.slimscroll.js"></script>
<script src="adm/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="adm/js/jquery.scrollTo.js"></script>
</body>
</html>
