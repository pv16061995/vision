<?php include'include/config.php';
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
    
    <link rel="shortcut icon" sizes="16x16 32x32 48x48 64x64" href="images/logo/favicon.ico">
    <link href="css/other_css/tpcore.css" rel="stylesheet"/>
    <link href="css/other_css/bcore.css" rel="stylesheet"/>
    <link href="css/other_css/sweet_alert.css" rel="stylesheet"/>
    <link href="css/other_css/signin.css" rel="stylesheet"/>
    <link href="css/other_css/signup.css" rel="stylesheet"/>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet noreferrer' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet noreferrer' type='text/css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="login-wrapper">
        <a href="index.php">
            <img class="logo" src="images/logo.png" alt="" />
        </a>
        <div class="box">
            <div class="content-wrap">
            <form action="" class="form-horizontal" id="loginForm" method="post" role="form">
              <h6>Login</h6>
             <input  class="form-control"  id="UserName" name="UserName" placeholder="Email Address" type="text" value="" />
             <span class="field-validation-valid" for="UserName"></span>

             <input  class="form-control" id="Password" name="Password" placeholder="Password" type="password" />
             <span class="field-validation-valid" for="Password"></span><br>

              <button class="btn btn-primary login_user"><i class="fa fa-sign-in"></i>&nbsp;Login</button>
              <div class="row" style="margin: 13px 0 0 0;font-size: 15px;"> <a href="resetpassword.php">Reset Password</a></div>
              
            </form>
</div>
        </div>
        <div class="no-account">
            <p>
                I have no account
                <a href="signup.php">Signup</a>
            </p>
        </div>
    </div>

    <script src="js/other_js/tpcore.js"></script>
    <script src="js/other_js/validate.js"></script>
    <script src="js/other_js/custom_validation.js"></script>
    <script src="js/other_js/sweetalert.min.js"></script>
</body>
</html>
