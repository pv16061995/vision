<?php
include 'include/config.php';?>
<!DOCTYPE html>
<html>
<head>
    <title>Bittrex.com - Manage Settings</title>
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
                    <a href="basicverification.php" class="list-group-item active" id="basicVerificationBtn">
                        Basic Verification
                    </a>
                    <a href="changepassword.php" class="list-group-item" >
                        Change Password
                    </a>
                    <a href="two_factor.php" class="list-group-item" >
                        Two-Factor Authentication
                    </a>
                </div>
            </div>
            <div class="col-md-9 col-xs-12" id="parentSection">
                <div class="manage-frame active loaded" id="sectionBasicVerification" hidden="" style="display: block; border:1px solid #ddd; padding:5% 2% 5% 2%; min-height:440px; max-height:auto;">
                    <div class="div-info">
                      <div>
                        <h1 style="color:#008000;"><i class="fa fa-check" aria-hidden="true"></i></h1>
                      </div>
                      <h2>E-mail Id is verified.</h2>
                    </div>
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
