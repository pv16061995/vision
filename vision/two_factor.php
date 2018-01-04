<?php
include 'include/config.php';?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo PROJECT_TITLE;?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="7idlnzmL4NvGeBJ4e1eiwU1Wd2bQDSLtFu-tIMh4cY4" />


    <!-- Core CSS -->
    <link href="css/other_css/cryptocoins.css" rel="stylesheet" />
    <link href="css/other_css/tpcore.css" rel="stylesheet"/>


    <link href="css/other_css/bcore.css" rel="stylesheet"/>

    <script src="css/other_css/modernizr.css"></script>
    <link href="css/other_css/sweet_alert.css" rel="stylesheet"/>
    <link href="css/other_css/layout.css" rel="stylesheet"/>
    <link href="css/other_css/signin.css" rel="stylesheet"/>
    <link href="css/other_css/signup.css" rel="stylesheet"/>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet noreferrer' type='text/css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        #balanceTable_filter,#withdrawdetailtable_filter,#depositdetailtable_filter{
            float: right;
        }
    </style>
    <style>
        .identity-name {
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 0px;
            text-transform: uppercase;
            font-size: 22px;
            font-weight: 700;
        }

        .identity-name.compressed {
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .identity-name.compressed.first {
            margin-top: 10px;
        }

        .identity-attribute {
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 0px;
            text-transform: uppercase;
            font-size: 18px;
            font-weight: 700;
        }

        .identity-divider{
            margin-top: 40px
        }

        .form-control.identity {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .btn.identity {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        #sidebar .list-group-item {
            padding: 8px 10px;
        }

        #sidebar hr {
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>


    <!-- open sans font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet noreferrer' type='text/css' />

</head>

<body id="main-body">

    <!-- header -->
    <?php include 'include/allheader.php'; ?>
    <!-- end header -->


    <div id="body-container">

        <div class="content">
<div id="pad-wrapper">

    <div class="container" id="manage-body">
        <div class="row">
            <div class="col-md-3 col-xs-12">
                <div class="list-group" id="sidebar">
                    <a href="#sectionSummary" class="list-group-item">
                        Summary
                    </a>
                    <hr />
                    <a href="basicverification.php" class="list-group-item" id="basicVerificationBtn">
                        Basic Verification
                    </a>
                    <a href="changepassword.php" class="list-group-item " >
                        Change Password
                    </a>
                    <a href="two_factor.php" class="list-group-item active" >
                        Two-Factor Authentication
                    </a>
                </div>
            </div>

            <div class="col-md-9 col-xs-12" id="parentSection">
                <div class="manage-frame active loaded" id="sectionBasicVerification" hidden="" style="display: block; border:1px solid #ddd; padding:5% 2% 5% 2%; min-height:440px; max-height:auto;">
                  <?php
                  if (!isset($_SESSION['token'])) {

                      header("location:".BASE_PATH."logout");
                   }
                  $user_session = $_SESSION['useremail'];
                  $url_api = URL_API;
                  $tfacode = $_SESSION['tfastatus'];
                   require_once 'include/GoogleAuthenticator.php';
                   $ga = new GoogleAuthenticator();
                   $secret = $_SESSION['secret_key'];
                   $qrCodeUrl = $ga->getQRCodeGoogleUrl($user_session, $secret);
                   if (isset($_POST['code'])) {
                       $code=$_POST['code'];
                       $secret = $_SESSION['secret_key'];
                       $checkResult = $ga->verifyCode($secret, $code, 2);    // 2 = 2*30sec clock tolerance

                       if ($checkResult) {
                           $_SESSION['secret_key']=$code;

                           header("Location:".BASE_PATH."login");
                       } else {
                           $failcode = "Failed Code Incorrect";
                       }
                   }

                   if (isset($_POST['enable'])) {
                     $url_api = URL_API;
                       $postData = array(
                       "userMailId"=>$user_session,

                       );

                       // Create the context for the request
                       $context = stream_context_create(array(
                       'http' => array(
                         'method' => 'POST',
                         'header' => "Content-Type: application/json\r\n",
                         'content' => json_encode($postData)
                         )
                       ));


                       $response = file_get_contents($url_api.'/user/enableTFA', true, $context);

                       if ($response === false) {
                           die('Error');
                       }


                       $responseData = json_decode($response, true);


                   }
                   if (isset($_POST['disable'])) {
                     $url_api = URL_API;
                       $postData = array(
                       "userMailId"=>$user_session,

                       );

                       // Create the context for the request
                       $context = stream_context_create(array(
                       'http' => array(
                         'method' => 'POST',
                         'header' => "Content-Type: application/json\r\n",
                         'content' => json_encode($postData)
                         )
                       ));


                       $response = file_get_contents($url_api.'/user/disableTFA', true, $context);

                       if ($response == false) {
                           die('Error');
                       }


                       $responseData = json_decode($response, true);

                       if ($responseData['statusCode']==200) {
                           $_SESSION['tfastatus'] = $responseData['user']['tfastatus'];
                           unset($secret);
                           header("location:".BASE_PATH."two_factor");
                       }
                   }


                   ?>
                   <?php if($tfacode==false) { ?>
                     <div class="box">
                       <div class="m_title"><h4>Two-factor Authentication</h4></div>
                       <p>You can enable Google Time based One Time Password (TOTP) Two-factor Authentication to further protect your account.  When it's enable, you are required to input the TOTP every time you login or withdraw funds. If you have an iOS or Android smartphone, you can do the following steps to enable it. In case you don't have a smartphone available, you can use the Google Authenticator on Windows as instructed in the later part, but it's less secure. </p>

               				<h3><b>1st step</b>: Install Google Authenticator on your smartphone.</h3>


               				<br/>
               				<h3><b>2nd step</b>: Setup "Google Authenticator" and scan the following barcode</h3>
               				<lu>
               				<li><img src="<?php echo $qrCodeUrl; ?>" alt="QR code" style="width: 200px; height: 200px"/>
               				</li>
               				<li>Also you can choose "Enter provided key" and input this key: <b><?php echo $secret;?></b></li>
               				</lu>

               				<br/>
               				<h3><b>3rd step</b>: Input the TOTP showing on your smartphone: </h3>
                      <form enctype="application/x-www-form-urlencoded" method="post" action="">

              				<table>
                        <tr>
                          <td>&nbsp;</td>
                          <td>
                                    <p style="color:red;font-size:20px;text-align:center">
                                    <?php if (isset($failcode)) {
                                    echo $failcode;
                                    }?> </p>
                          </td>
                        </tr>
              				<tr>
              					<td align="right">TOTP: </td><td><input type="text" name="code" id="totp" size="20" class="form-control"> 6 digits code on your smartphone</td>
              				</tr>
                      <tr>
              				<td>&nbsp;</td>
              				<td> <input type="submit" name="enable" id="submit" value="  Enable Two-factor Authentication  " class="btn btn-primary sub-btn"></td>
              				</tr>

              				</table>

              				</form>
                      <br>
              				<p>Notice: <b>Do NOT delete the "Google Authenticator" app on your smartphone when it's enabled. </b>If you lost your phone or deleted the "Google Authenticator", please contact us at Email: support@bitwireX.io </p>

                     </div>
                   <?php }else{?>
                           <div class="box">

                                  <div class="content-wrap">
                                    <div class="m_title"><h4>Two-factor Authentication</h4></div>
                                    <form  method="post" action="">

                                                    <table>
                                            <!-- <tr>
                                            <td align="right">TOTP: </td><td><input type="text" name="code" id="totp" size="20"> 6 digits code on your smartphone</td>
                                            </tr> -->
                                            <br/>
                                            <tr>
                                            <td>&nbsp;</td>
                                            <td> <input type="submit" name="disable" id="submit" value="  Disable Two-factor Authentication  " class="sub-btn"></td>
                                            </tr>
                                            </table>
                                            </form>
                                    </table>
                                    </form>

                                  </div>

                           </div>
                   <?php }?>

                </div>

        </div>
    </div>
</div>


        </div>


    </div>
</div>
 <?php include 'include/allfooter.php';?>

    <script src="js/other_js/tpcore.js"></script>


    <script src="js/other_js/utility.js"></script>

    <script src="js/other_js/hubs.js"></script>
    <!-- <script src="js/other_js/bittrexDataProvider.js"></script>

    <script src="js/other_js/layoutDataProvider.js"></script>

    <script src="js/other_js/bittrexViewModel.js"></script>

    <script src="js/other_js/layoutViewModel.js"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.0.2/js/bootstrap-switch.min.js"></script>

    <script src="js/other_js/validate.js"></script>
    <script src="js/other_js/custom_validation.js"></script>
    <script src="js/other_js/sweetalert.min.js"></script>

</body>
</html>
