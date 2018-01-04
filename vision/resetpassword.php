<?php 
include 'include/config.php';?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo PROJECT_TITLE;?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="no-referrer" />
    <meta name="referrer" content="never" />

    <!-- Core CSS -->
    <link href="css/other_css/tpcore.css" rel="stylesheet"/>

     <link href="css/other_css/bcore.css" rel="stylesheet"/>
    <script src="css/other_css/modernizr.css"></script>


    <!-- this page specific styles -->

<link href="css/other_css/signin.css" rel="stylesheet"/>
<link href="css/other_css/signup.css" rel="stylesheet"/>


    <!-- open sans font -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet noreferrer' type='text/css' />
  
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet noreferrer' type='text/css' /> -->
    <!--[if lt IE 9]>
      <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>




<div class="login-wrapper">
    <a href="/">
        <img class="logo" src="images/logo/logo.png" alt="" />
    </a>
    <div class="box">
        <div class="content-wrap">
          <form action="#" class="form-horizontal" id="resetForm" method="post" role="form">
            <h6>Reset Password </h6>
            <input class="form-control" id="EmailAddress" name="EmailAddress" placeholder="Email Address" type="text" />
            <div><span class="field-validation-valid"></span></div>
            <div class="checkbox">
              <!-- <label>
                <input  id="Agree" name="Agree" type="checkbox" value="true" />
                <input name="Agree" type="hidden" value="false" /> 
                I acknowledge that my account will be locked for a minimum of 24 hours.
             </label>-->
            </div>
            <button type="submit" class="btn btn-primary resetPass">
                    <i class="fa fa-unlock"></i>&nbsp;Submit
            </button>
          </form>
        </div>
    </div>
</div>



    <script src="js/other_js/tpcore.js"></script>
    <script src="js/other_js/validate.js"></script>
    <script src="js/other_js/custom_validation.js"></script>
    <script src="js/other_js/sweetalert.min.js"></script>





    <!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->

    <script>
            function OnSubmit(token) {
                document.getElementById("resetForm").submit();
            }

    </script>




</body>
</html>
