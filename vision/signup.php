<?php include 'include/config.php';
if(isset($_SESSION['useremail']))
{
    header("location:wallet.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo PROJECT_TITLE;?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" sizes="16x16 32x32 48x48 64x64" href="/Content/img/logos/bittrex.ico">
    <link href="css/other_css/tpcore.css" rel="stylesheet"/>
   <!--  <link href="css/datatables.css" rel="stylesheet"/> -->
    <link href="css/other_css/bcore.css" rel="stylesheet"/>
    <link href="css/other_css/sweet_alert.css" rel="stylesheet"/>
    <script src="js/other_js/modernizr.js"></script>
    <link href="css/other_css/signin.css" rel="stylesheet"/>
    <link href="css/other_css/signup.css" rel="stylesheet"/>


    <!-- open sans font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet noreferrer' type='text/css' />
    <!-- lato font -->
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet noreferrer' type='text/css' />
    <!--[if lt IE 9]>
      <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <style>
    .loading-image {
      position: absolute;
      top: 50%;
      left: 50%;
      z-index: 10;
    }
    .loader
    {
        display: none;
        width: 200px;
        height: 200px;
        position: fixed;
        top: 40%;
        left: 44%;
        text-align: center;
        margin-left: -50px;
        margin-top: -100px;
        z-index: 2;
        overflow: auto;
    }
    </style>
</head>

<body>
  <div class="loader">
   <center>
       <img class="loading-image" src="images/loader.gif" style="width:70px; height:70px;" alt="loading..">
   </center>
</div>
    <div class="login-wrapper">

        <a href="index.php">
            <img class="logo" src="images/logo.png" alt="" />
        </a>
        <div class="box">
            <div class="content-wrap">
            <form action="" class="form-horizontal" id="signupForm" method="post" role="form">
              <h6>Signup</h6>
             <input  class="form-control"  id="UserName" name="UserName" placeholder="Email Address" type="text" value="" />
             <span class="field-validation-valid" for="UserName"></span>

             <input  class="form-control" id="Password" name="Password" placeholder="Password" type="password" />
             <span class="field-validation-valid" for="Password"></span>

             <input class="form-control" id="Confirm_Password" name="Confirm_Password" placeholder="Confirm Password" type="password" />
             <span class="field-validation-valid" for="Confirm_Password"></span>

             <input class="form-control"  id="Sending_Password" name="Sending_Password" placeholder="Transaction Password" type="password" />
             <span class="field-validation-valid" for="Sending_Password"></span>

             <input  class="form-control" id="Confirm_Sending_Password" name="Confirm_Sending_Password" placeholder="Confirm Transaction Password" type="password" />
             <span class="field-validation-valid" for="Confirm_Sending_Password"></span>

              <br><button class="btn btn-primary signup" id="sbtValBtn"><i class="fa fa-sign-in"></i>&nbsp;Signup</button>
            </form>
</div>
        </div>
        <div class="no-account">
            <p>
                I already have an account
                <a href="login.php">Login</a>
            </p>
        </div>
        <p>OR</p>
        <div class="no-account">

            <p>
                Back to
                <a href="index.php">  Home</a>
            </p>
        </div>
    </div>

    <script src="js/other_js/tpcore.js"></script>
    <script src="js/other_js/validate.js"></script>
    <script src="js/other_js/custom_validation.js"></script>
    <script src="js/other_js/sweetalert.min.js"></script>
</body>
</html>
