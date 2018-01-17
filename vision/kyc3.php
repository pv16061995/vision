<?php
include 'include/config.php';
$url_api=URL_API;
$postData1 = array(
  "userMailId"=> $_SESSION["useremail"]
  );

 $context1 = stream_context_create(array(
  'http' => array(
    'method' => 'POST',
    'header' => "Content-Type: application/json\r\n",
    'content' => json_encode($postData1)
    )
  ));
  //echo $url_api.'/user/getAllDetailsOfUser';
 $response1 = file_get_contents($url_api.'verification/getVerificationDetails', true, $context1);
 $responseData1 = json_decode(@$response1, true);
 print_r($responseData1);
 @$datastatus=$responseData1['user']['verificationStatus'];
 @$data=$responseData1['user']['verificationDetails'][0];
echo $datastatus;
$rejectedDate=7;
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo PROJECT_TITLE;?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="7idlnzmL4NvGeBJ4e1eiwU1Wd2bQDSLtFu-tIMh4cY4" />


    <!-- Core CSS -->
    <link href="assets/revolution/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/other_css/cryptocoins.css" rel="stylesheet" />
    <link href="css/other_css/tpcore.css" rel="stylesheet"/>


    <link href="css/other_css/bcore.css" rel="stylesheet"/>

    <script src="css/other_css/modernizr.css"></script>
    <link href="css/other_css/sweet_alert.css" rel="stylesheet"/>
    <link href="css/other_css/layout.css" rel="stylesheet"/>
    <link href="css/other_css/signin.css" rel="stylesheet"/>
    <link href="css/other_css/signup.css" rel="stylesheet"/>
    <link href="css/other_css/dropzone.min.css" rel="stylesheet"/>
    <link href="assets/revolution/css/style.css" rel="stylesheet"/>
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
/*KYC form*/
<style>
  ul#stepForm, ul#stepForm li {
    margin: 0;
    padding: 0;
  }
  ul#stepForm li {
    list-style: none outside none;
  }
  label{margin-top: 10px;}
  .help-inline-error{color:red;}

  #wrapper
{
 text-align:center;
 margin:0 auto;
 padding:0px;
 width:500px;
}
#drop-area
{
 margin-top:0px;
 margin-left:18px;
 width:450px;
 height:180px;
 background-color:white;
 border:3px dashed grey;
}
.drop-text
{
 margin-top:70px;
 color:grey;
 font-size:25px;
 font-weight:bold;
}
#drop-area img
{
 max-width:200px;
}
.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
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

                    <hr />
                    <a href="basicverification.php" class="list-group-item" id="basicVerificationBtn">
                        Basic Verification
                    </a>
                    <a href="changepassword.php" class="list-group-item " >
                        Change Password
                    </a>
                    <a href="changetransactionpassword.php" class="list-group-item " >
                        Change Transaction Password
                    </a>
                    <a href="two_factor.php" class="list-group-item" >
                        Two-Factor Authentication
                    </a>
                    <a href="kyc.php" class="list-group-item active" >
                        KYC Verification
                    </a>
                </div>
            </div>
            <div class="col-md-9 col-xs-12" id="parentSection">
                <div class="manage-frame active loaded" id="sectionBasicVerification" hidden="" style="display: block; border:1px solid #ddd; padding:5% 2% 5% 2%; min-height:900px; max-height:auto;">
                    <div class="div-info">
                      <div class="login-wrapper_kyc">
                          <div class="box_kyc">
                            <?php
                              if(isset($_REQUEST['msg']))
                              {
                                ?>
                                <h2><?php echo $_REQUEST['msg']; ?></h2>
                                <?php
                              }
                             ?>
                            <?php if($datastatus==0){
                              //IF KYC NOT SUBMITTED
                              ?>
                              <div class="panel-body">
                                <form name="basicform" id="basicform" method="post" action="kyc_submit.php">

                                  <div id="sf1" class="frm">
                                    <fieldset>
                                      <legend>Step 1 of 4 :Basic Information</legend>

                                      <div class="form-group col-lg-6">
                                        <div class="col-lg-10">
                                          <input type="text" placeholder="First Name" id="firstName" name="firstName" class="form-control" autocomplete="off">
                                        </div>
                                      </div>
                                      <div class="form-group col-lg-6">
                                        <div class="col-lg-10">
                                          <input type="text" placeholder="Middle Name" id="middle_name" name="middle_name" class="form-control" autocomplete="off">
                                        </div>
                                      </div>
                                      <div class="form-group col-lg-6">
                                        <div class="col-lg-10">
                                          <input type="text" placeholder="Last Name" id="lastName" name="lastName" class="form-control" autocomplete="off">
                                        </div>
                                      </div>
                                      <div class="form-group col-lg-6">
                                        <div class="col-lg-10">
                                          <input type="text" placeholder="Address 1" id="address1" name="address1" class="form-control" autocomplete="off">
                                        </div>
                                      </div>
                                      <div class="form-group col-lg-6">
                                        <div class="col-lg-10">
                                          <input type="text" placeholder="Address 2" id="address2" name="address2" class="form-control" autocomplete="off">
                                        </div>
                                      </div>

                                      <div class="form-group col-lg-6">
                                        <div class="col-lg-10">
                                          <select id="country" name="country" class="form-control">
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group col-lg-6">
                                        <div class="col-lg-10">
                                          <select id="state" name="state" class="form-control">
                                            <option value="state">State</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group col-lg-6">
                                        <div class="col-lg-10">
                                          <select id="city" name="city" class="form-control">
                                            <option value="city">City</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group col-lg-6">
                                        <div class="col-lg-10">
                                          <input type="text" placeholder="Your Phone" id="phone" name="phone" class="form-control" autocomplete="off">
                                        </div>
                                      </div>
                                      <div class="form-group col-lg-6">
                                        <div class="col-lg-10">
                                          <input type="text" placeholder="Your Pincode" id="pincode" name="pincode" class="form-control" autocomplete="off">
                                        </div>
                                      </div>
                                      <div class="clearfix" style="height: 10px;clear: both;"></div>


                                      <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-2">
                                          <button class="btn btn-primary open1" type="button">Next <span class="fa fa-arrow-right"></span></button>
                                        </div>
                                      </div>

                                    </fieldset>
                                  </div>

                                  <div id="sf2" class="frm" style="display: none;">
                                    <fieldset>
                                      <legend>Step 2 of 4: Bank Details</legend>

                                      <div class="form-group col-lg-6">
                                        <div class="col-lg-10">
                                          <input type="text" placeholder="Account Number" id="bankAccountNumber" name="bankAccountNumber" class="form-control" autocomplete="off">
                                        </div>
                                      </div>
                                      <div class="form-group col-lg-6">
                                        <div class="col-lg-10">
                                          <input type="text" placeholder="Account Holdername " id="bankAccountHolderName" name="bankAccountHolderName" class="form-control" autocomplete="off">
                                        </div>
                                      </div>
                                      <div class="form-group col-lg-6">
                                        <div class="col-lg-10">
                                          <input type="text" placeholder="Bank Name" id="bankName" name="bankName" class="form-control" autocomplete="off">
                                        </div>
                                      </div>
                                      <div class="form-group col-lg-6">
                                        <div class="col-lg-10">
                                          <input type="text" placeholder="IFSCCode" id="IFSCCode" name="IFSCCode" class="form-control" autocomplete="off">
                                        </div>
                                      </div>
                                      <div class="clearfix" style="height: 10px;clear: both;"></div>

                                      <div class="form-group">
                                        <div class="col-lg-10">
                                          <button class="btn btn-warning back2" type="button"><span class="fa fa-arrow-left"></span> Back</button>
                                          <button class="btn btn-primary open2" type="button">Next <span class="fa fa-arrow-right"></span></button>
                                        </div>
                                      </div>

                                    </fieldset>
                                  </div>

                                  <div id="sf3" class="frm" style="display: none;">
                                    <fieldset>
                                      <legend>Step 3 of 4:Document</legend>

                                      <div class="form-group col-lg-12">
                                        <a href="#" class="btn btn-default pull-left" id="openBtn">Upload Tax Image Proof <small>(jpg,png,jpeg only)</small></a>
                                      </div>
                                      <div class="form-group col-lg-12">
                                        <div class="col-lg-10">
                                            <label class="control-label pull-left" for="taxProofNumber">Tax Proof Number: </label>
                                          <input type="text" placeholder="Tax Proof Number " id="taxProofNumber" name="taxProofNumber" class="form-control">
                                        </div>
                                      </div>
                                      <div class="form-group col-lg-12">
                                        <div class="col-lg-10">
                                          <label class="control-label pull-left" for="taxProofNumber">Select Below ID: </label>
                                          <select  id="taxProofImage"  name="taxProofImage"   class="form-control">
                                            <option class="fullwidth">Please Select  </option>
                                            <option class="fullwidth">Driving License </option>
                                            <option class="fullwidth">Passport  </option>
                                            <option class="fullwidth"> Aadhar </option>
                                        </select>
                                        </div>
                                      </div>
                                      <div class="form-group col-lg-12">
                                        <div class="col-lg-10">
                                          <label class="control-label pull-left" for="taxProofNumber">Address Proof Number: </label>
                                          <input type="text" placeholder="Address Proof Number" id="file2" name="file2" class="form-control">
                                        </div>
                                      </div>
                                      <div class="form-group col-lg-12">
                                        <label class="control-label pull-left" for="taxProofNumber">Address Proof Image: </label>
                                      </div>
                                      <div class="form-group col-lg-12">
                                        <a href="#" class="btn btn-default pull-left" id="openBtn1">Upload Address Proof <small>(jpg,png,jpeg only)</small></a>
                                      </div>
                                      <input type="hidden" id="user_id" name="userId" value="<?php echo $_SESSION["user_id"]; ?>" >

                                      <div class="clearfix" style="height: 10px;clear: both;"></div>



                                      <div class="clearfix" style="height: 10px;clear: both;"></div>

                                      <div class="form-group">
                                        <div class="col-lg-10">
                                          <button class="btn btn-warning back3" type="button"><span class="fa fa-arrow-left"></span> Back</button>
                                          <button class="btn btn-primary open3" type="button">Next <span class="fa fa-arrow-right"></span></button>
                                        </div>
                                      </div>

                                    </fieldset>
                                  </div>

                                  <div id="sf4" class="frm" style="display: none;">
                                    <fieldset>
                                      <legend>Step 4 of 4:Term & Condition</legend>
                                      <p style="color:black;">Term And Condition All Fill:
                                        <input style="margin-bottom:30px !important; height: 20px; width: 40px;" class="high" placeholder="Privacy..."  name="privacy" id="privacy" type="checkbox"></p>

                                      <div class="clearfix" style="height: 10px;clear: both;"></div>
                                      <div class="clearfix" style="height: 10px;clear: both;"></div>

                                      <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-2">
                                          <button class="btn btn-warning back4" type="button"><span class="fa fa-arrow-left"></span> Back</button>
                                          <button class="btn btn-primary open4" type="submit">Submit </button>
                                          <img src="spinner.gif" alt="" id="loader" style="display: none">
                                        </div>
                                      </div>

                                    </fieldset>
                                  </div>

                                </form>
                              </div>
                              <?php
                            }
                            else if($datastatus==1)
                            {
                              //IF KYC  SUBMITTED BUT IN PENDING
                              ?>
                              <div class="panel-body">
                                <h2 class="text-warning">Kyc Verification submited but is in pending</h2>
                              </div>
                              <?php
                            }
                            else if($datastatus==2)
                            {

                              //IF KYC  SUBMITTED BUT REJECTED
                              if($rejectedDate<7)
                              {
                                ?>
                                <div class="panel-body">
                                  <h2 class="text-danger">Kyc Verification Rejected</h2>
                                </div>
                                <?php
                              }
                              else {
                                //SHOW VERIFICATII FORM AFTER 7 DAY
                                ?>
                                <div class="panel-body">
                                  <h2 class="text-info">Kyc verification rejected but re-verify</h2>
                                  <br/>
                                  <form name="basicform" id="basicform" method="post" action="kyc_submit.php">

                                    <div id="sf1" class="frm">
                                      <fieldset>
                                        <legend>Step 1 of 4 :Basic Information</legend>

                                        <div class="form-group col-lg-6">
                                          <div class="col-lg-10">
                                            <input type="text" placeholder="First Name" id="firstName" name="firstName" class="form-control" autocomplete="off">
                                          </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <div class="col-lg-10">
                                            <input type="text" placeholder="Middle Name" id="middle_name" name="middle_name" class="form-control" autocomplete="off">
                                          </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <div class="col-lg-10">
                                            <input type="text" placeholder="Last Name" id="lastName" name="lastName" class="form-control" autocomplete="off">
                                          </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <div class="col-lg-10">
                                            <input type="text" placeholder="Address 1" id="address1" name="address1" class="form-control" autocomplete="off">
                                          </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <div class="col-lg-10">
                                            <input type="text" placeholder="Address 2" id="address2" name="address2" class="form-control" autocomplete="off">
                                          </div>
                                        </div>

                                        <div class="form-group col-lg-6">
                                          <div class="col-lg-10">
                                            <select id="country" name="country" class="form-control">
                                            </select>
                                          </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <div class="col-lg-10">
                                            <select id="state" name="state" class="form-control">
                                              <option value="state">State</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <div class="col-lg-10">
                                            <select id="city" name="city" class="form-control">
                                              <option value="city">City</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <div class="col-lg-10">
                                            <input type="text" placeholder="Your Phone" id="phone" name="phone" class="form-control" autocomplete="off">
                                          </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <div class="col-lg-10">
                                            <input type="text" placeholder="Your Pincode" id="pincode" name="pincode" class="form-control" autocomplete="off">
                                          </div>
                                        </div>
                                        <div class="clearfix" style="height: 10px;clear: both;"></div>


                                        <div class="form-group">
                                          <div class="col-lg-10 col-lg-offset-2">
                                            <button class="btn btn-primary open1" type="button">Next <span class="fa fa-arrow-right"></span></button>
                                          </div>
                                        </div>

                                      </fieldset>
                                    </div>

                                    <div id="sf2" class="frm" style="display: none;">
                                      <fieldset>
                                        <legend>Step 2 of 4: Bank Details</legend>

                                        <div class="form-group col-lg-6">
                                          <div class="col-lg-10">
                                            <input type="text" placeholder="Account Number" id="bankAccountNumber" name="bankAccountNumber" class="form-control" autocomplete="off">
                                          </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <div class="col-lg-10">
                                            <input type="text" placeholder="Account Holdername " id="bankAccountHolderName" name="bankAccountHolderName" class="form-control" autocomplete="off">
                                          </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <div class="col-lg-10">
                                            <input type="text" placeholder="Bank Name" id="bankName" name="bankName" class="form-control" autocomplete="off">
                                          </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <div class="col-lg-10">
                                            <input type="text" placeholder="IFSCCode" id="IFSCCode" name="IFSCCode" class="form-control" autocomplete="off">
                                          </div>
                                        </div>
                                        <div class="clearfix" style="height: 10px;clear: both;"></div>

                                        <div class="form-group">
                                          <div class="col-lg-10">
                                            <button class="btn btn-warning back2" type="button"><span class="fa fa-arrow-left"></span> Back</button>
                                            <button class="btn btn-primary open2" type="button">Next <span class="fa fa-arrow-right"></span></button>
                                          </div>
                                        </div>

                                      </fieldset>
                                    </div>

                                    <div id="sf3" class="frm" style="display: none;">
                                      <fieldset>
                                        <legend>Step 3 of 4:Document</legend>

                                        <div class="form-group col-lg-12">
                                          <a href="#" class="btn btn-default pull-left" id="openBtn">Upload Tax Image Proof <small>(jpg,png,jpeg only)</small></a>
                                        </div>
                                        <div class="form-group col-lg-12">
                                          <div class="col-lg-10">
                                              <label class="control-label pull-left" for="taxProofNumber">Tax Proof Number: </label>
                                            <input type="text" placeholder="Tax Proof Number " id="taxProofNumber" name="taxProofNumber" class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                          <div class="col-lg-10">
                                            <label class="control-label pull-left" for="taxProofNumber">Select Below ID: </label>
                                            <select  id="taxProofImage"  name="taxProofImage"   class="form-control">
                                              <option class="fullwidth">Please Select  </option>
                                              <option class="fullwidth">Driving License </option>
                                              <option class="fullwidth">Passport  </option>
                                              <option class="fullwidth"> Aadhar </option>
                                          </select>
                                          </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                          <div class="col-lg-10">
                                            <label class="control-label pull-left" for="taxProofNumber">Address Proof Number: </label>
                                            <input type="text" placeholder="Address Proof Number" id="file2" name="file2" class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                          <label class="control-label pull-left" for="taxProofNumber">Address Proof Image: </label>
                                        </div>
                                        <div class="form-group col-lg-12">
                                          <a href="#" class="btn btn-default pull-left" id="openBtn1">Upload Address Proof <small>(jpg,png,jpeg only)</small></a>
                                        </div>
                                        <input type="hidden" id="user_id" name="userId" value="<?php echo $_SESSION["user_id"]; ?>" >

                                        <div class="clearfix" style="height: 10px;clear: both;"></div>



                                        <div class="clearfix" style="height: 10px;clear: both;"></div>

                                        <div class="form-group">
                                          <div class="col-lg-10">
                                            <button class="btn btn-warning back3" type="button"><span class="fa fa-arrow-left"></span> Back</button>
                                            <button class="btn btn-primary open3" type="button">Next <span class="fa fa-arrow-right"></span></button>
                                          </div>
                                        </div>

                                      </fieldset>
                                    </div>

                                    <div id="sf4" class="frm" style="display: none;">
                                      <fieldset>
                                        <legend>Step 4 of 4:Term & Condition</legend>
                                        <p style="color:black;">Term And Condition All Fill:
                                          <input style="margin-bottom:30px !important; height: 20px; width: 40px;" class="high" placeholder="Privacy..."  name="privacy" id="privacy" type="checkbox"></p>

                                        <div class="clearfix" style="height: 10px;clear: both;"></div>
                                        <div class="clearfix" style="height: 10px;clear: both;"></div>

                                        <div class="form-group">
                                          <div class="col-lg-10 col-lg-offset-2">
                                            <button class="btn btn-warning back4" type="button"><span class="fa fa-arrow-left"></span> Back</button>
                                            <button class="btn btn-primary open4" type="submit">Submit </button>
                                            <img src="spinner.gif" alt="" id="loader" style="display: none">
                                          </div>
                                        </div>

                                      </fieldset>
                                    </div>

                                  </form>
                                </div>
                                <?php
                              }
                            }
                            else if($datastatus==3)
                            {
                              //IF KYC  SUBMITTED AND VERIFIED
                              ?>
                              <div class="panel-body">
                                <h2 class="text-success">Kyc Verification Accepted</h2>
                                <br/>
                              <table class="table table-bordered text-left">
                              <tbody>
                                  <tr>
                                      <td><b>Name</b></td><td>Abc</td>
                                  </tr>
                                  <tr>
                                      <td><b>Address</b></td><td>Abc</td>
                                  </tr>
                                  <tr>
                                      <td><b>Country</b></td><td>Abc</td>
                                  </tr>
                                  <tr>
                                      <td><b>State</b></td><td>Abc</td>
                                  </tr>
                                  <tr>
                                      <td><b>City</b></td><td>Abc</td>
                                  </tr>
                                  <tr>
                                      <td><b>Phone</b></td><td>Abc</td>
                                  </tr>
                                  <tr>
                                      <td><b>Pincode</b></td><td>Abc</td>
                                  </tr>
                                  <tr>
                                      <td><b>Account Number</b></td><td>Abc</td>
                                  </tr>
                                  <tr>
                                      <td><b>Account Holdername</b></td><td>Abc</td>
                                  </tr>
                                  <tr>
                                      <td><b>Bank Name</b></td><td>Abc</td>
                                  </tr>
                                  <tr>
                                      <td><b>IFSCCode</b></td><td>Abc</td>
                                  </tr>
                                  <tr>
                                      <td><b>Tax Proof Image</b></td><td>Abc</td>
                                  </tr>
                                  <tr>
                                      <td><b>Tax Proof Number</b></td><td>Abc</td>
                                  </tr>
                                  <tr>
                                      <td><b>Address Proof </b></td><td>Abc</td>
                                  </tr>
                                  <tr>
                                      <td><b>Address Proof Number</b></td><td>Abc</td>
                                  </tr>
                                  <tr><td><b>Upload Address Proof</b></td><td>wewew</td></tr>
                              </tbody>
                          </table>
                          </div>
                              <?php
                            }
                            ?>

                          </div>
                      </div>
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
    <script src="js/other_js/bootstrap.min.js"></script>
    <script src="js/other_js/validate.js"></script>
    <script src="js/other_js/custom_validation.js"></script>
    <script src="js/other_js/sweetalert.min.js"></script>
    <script src="js/other_js/city.js"></script>
    <script src="js/other_js/dropzone.min.js"></script>
    <script type="text/javascript">

      jQuery().ready(function() {
        $.validator.addMethod('customphone', function (value, element) {
            return this.optional(element) || /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/.test(value);
        }, "Please enter a valid phone number");
        $.validator.addMethod( 'countySelect', function(value, element) {
            // The  country inputs
            var country = $("#country").val();
            if (country !=0 ) {
                return true;
            } else {
                return false;
            }

        }, "Please select country");
        $.validator.addMethod( 'stateSelect', function(value, element) {
            // The  country inputs
            var country = $("#state").val();
            if (country !="state" ) {
                return true;
            } else {
                return false;
            }

        }, "Please select state");
        $.validator.addMethod( 'citySelect', function(value, element) {
            // The  country inputs
            var country = $("#city").val();
            if (country !="city" ) {
                return true;
            } else {
                return false;
            }

        }, "Please select city");
        $.validator.addMethod('valid_pincode', function (value, element) {
            return this.optional(element) || /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/.test(value);
        }, "Please enter a valid pincode");
        $.validator.addMethod('valid_account', function (value, element) {
            return this.optional(element) || /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/.test(value);
        }, "Please enter a valid account number");
        // validate form on keyup and submit
        var v = jQuery("#basicform").validate({
          rules: {
            firstName: {
              required: true,
              minlength: 2,
              maxlength: 16
            },
            middle_name: {
              required: true,
              minlength: 2,
              maxlength: 16
            },
            lastName: {
              required: true,
              minlength: 2,
              maxlength: 100,
            },
            address1: {
              required: true
            },
            address2: {
              required: true
            },
            country: {
              required: true,
              countySelect:true
            },

            state: {
              required: true,
              stateSelect:true
            },
            city: {
              required: true,
              citySelect:true
            },
            phone: {
              required: true,
              customphone:true
            },
            pincode: {
              required: true,
              minlength: 6,
              valid_pincode:true
            }
            ,
            bankAccountNumber: {
              required: true,
              minlength:10,
              valid_pincode:true
            }
            ,
            bankName: {
              required: true,
              minlength:3,
            }
            ,
            bankAccountHolderName: {
              required: true,
              minlength:3,
            }
            ,
            bankName: {
              required: true,
              minlength:3,
            }
            ,
            IFSCCode: {
              required: true,
              minlength:3,
            }
            ,
            taxProofNumber: {
              required: true
            }
            ,
            taxProofImage: {
              required: true
            }
            ,
            file2: {
              required: true
            }
            ,
            privacy:{
              required: true
            }
          },
          submitHandler: function(form) {
            form.submit();
          },
          errorElement: "span",
          errorClass: "help-inline-error",
        });

        $(".open1").click(function() {
          if (v.form()) {
            $(".frm").hide("fast");
            $("#sf2").show("slow");
          }
        });

        $(".open2").click(function() {
          if (v.form()) {
            $(".frm").hide("fast");
            $("#sf3").show("slow");
          }
        });
        $(".open3").click(function() {
          if (v.form()) {
            $(".frm").hide("fast");
            $("#sf4").show("slow");
          }
        });
        //
        // $(".open4").click(function() {
        //   if (v.form()) {
        //     $("#loader").show();
        //      setTimeout(function(){
        //        $("#basicform").html('<h2>Thanks for your time.</h2>');
        //      }, 1000);
        //     return false;
        //   }
        // });

        $(".back2").click(function() {
          $(".frm").hide("fast");
          $("#sf1").show("slow");
        });

        $(".back3").click(function() {
          $(".frm").hide("fast");
          $("#sf2").show("slow");
        });
        $(".back4").click(function() {
          $(".frm").hide("fast");
          $("#sf3").show("slow");
        });
      });
    </script>
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
      <h3>Upload Text Image Proof</h3>
  </div>
  <div class="modal-body">
    <form  action="#"  class="dropzone" id="Mydrop">
      <input name="userId" id="userId" type="hidden" class="inputFile" value="<?php echo $_SESSION['user_id'];?>" /><br/>
  </form>

  <!-- <div id="wrapper" class="fileUpload">
    <input name="userId" id="userId" type="hidden" class="inputFile" value="<?php echo $_SESSION['user_id'];?>" /><br/>

   <div id="drop-area" class="dropzone" >
     <input type="file" class="upload">
    <h3 class="drop-text">Drag and Drop Images Here</h3>
   </div>
  </div> -->

    <!-- <form  action="lib/image_upload.php" method="post">
          <div id="targetLayer">No Image</div>
          <div id="uploadFormLayer">
            <input name="userId" type="hidden" class="inputFile" value="<?php echo $_SESSION['user_id'];?>" /><br/>
            <input name="taxProofImageName" type="file" class="inputFile" accept="image/jpeg,image/x-png,image/jpg" multiple /><br/>
            <input type="submit" value="Submit" class="btnSubmit" />
          </div>
      </form> -->
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal">Close</button>
  </div>
  </div>
</div>
</div>
<div id="myModal1" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
      <h3>User Image Upload</h3>
  </div>
  <div class="modal-body">
   <form id="uploadForm" action="lib/image_upload.php" method="post">
          <div id="targetLayer">No Image</div>
          <div id="uploadFormLayer">
            <input name="userId" type="hidden" class="inputFile" value="<?php echo $_SESSION['user_id'];?>" /><br/>
            <input name="addressProofImage" type="file" class="inputFile" accept="image/jpeg,image/x-png,image/jpg" multiple /><br/>
            <input type="submit" value="Submit" class="btnSubmit" />
          </div>
      </form>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal">Close</button>
  </div>
  </div>
</div>
</div>
<script>
$('#openBtn').click(function(){
 $('#myModal').modal({show:true})
});
$('#openBtn1').click(function(){
  $('#myModal1').modal({show:true})
});
/*DROPZONE UPLOAD*/
$(document).ready(function()
{
 $("#drop-area").on('dragenter', function (e){
  e.preventDefault();
  $(this).css('background', '#BBD5B8');
 });

 $("#drop-area").on('dragover', function (e){
  e.preventDefault();
 });

 $("#Mydrop").on('drop', function (e){
  $(this).css('background', '#D8F9D3');
  e.preventDefault();
  var image = e.originalEvent.dataTransfer.files;
  createFormData(image);
 });
});


function createFormData(image)
{
 var formImage = new FormData();
 formImage.append('userId', $("#userId").val());
 formImage.append('taxProofImageName', image[0]);
 uploadFormData(formImage);
}

function uploadFormData(formData)
{
 $.ajax({
 url: "http://192.168.1.20:1339/verification/uploadTaxProofImageImage",
 type: "POST",
 data: formData,
 contentType:false,
 cache: false,
 processData: false,
 success: function(data){
  $('#drop-area').html(data);
 }});
}
</script>
<script type="text/javascript">
$(document).ready(function (e) {
   api_url = '<?php echo $url_api;?>';
  $("#uploadForm").on('submit',(function(e) {
    e.preventDefault();  //If this method is called, the default action of the event will not be              triggered.
    $.ajax({
          //url: api_url+"verification/uploadAddressProofImage",
          url:"http://192.168.1.20:1339/verification/uploadAddressProofImage",
      type: "POST",
      data:  new FormData(this),
      contentType: false,     //when we send json file we write contentType: 'application/json'
          cache: false,
      processData:false,
      success: function(data)
        {
          alert(data['message']);
      $("#targetLayer").html(data);
        },
        error: function(data)
        {
          alert("asdfasdf " +datadata['message']);
        }
     });
  }));
});
</script>
<script type="text/javascript">
$(document).ready(function (e) {
  api_url = '<?php echo $url_api;?>';
  $("#uploadForm2").on('submit',(function(e) {
    e.preventDefault();  //If this method is called, the default action of the event will not be              triggered.
    $.ajax({
          //url: api_url+"verification/uploadTaxProofImageImage",
          url:"http://192.168.1.20:1339/verification/uploadTaxProofImageImage",
      type: "POST",
      data:  new FormData(this),
      contentType: false,     //when we send json file we write contentType: 'application/json'
          cache: false,
      processData:false,
      success: function(data)
        {
          alert(data['message']);
      $("#targetLayer").html(data);
        },
        error: function(data)
        {
          alert("asdfasdf " +data['message']);
        }
     });
  }));
});
</script>

</body>
</html>
