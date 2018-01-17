<?php
///echo URL_API.''./verification/addVerificationDetails
include'include/config.php';
$url_api=URL_API;
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$dob=$_POST['dob'];
$middleName=$_POST['middle_name'];
$addLine1=$_POST['address1'];
$addLine2=$_POST['address2'];
$country=$_POST['country'];
$state=$_POST['state'];
$city=$_POST['city'];
$mobileNumber=$_POST['phone'];
$pincode=$_POST['pincode'];
$bankAccountNumber=$_POST['bankAccountNumber'];
$bankAccountHolderName=$_POST['bankAccountHolderName'];
$bankName=$_POST['bankName'];
$IFSCCode=$_POST['IFSCCode'];
$taxProofNumber=$_POST['taxProofNumber'];
$addressProofType=$_POST['taxProofImage'];
$file2=$_POST['file2'];
$userId=$_POST['userId'];

$postData = array(
"firstName"=>$firstName,
  "lastName"=>$lastName,
  "middleName"=>$middleName,
  "DOB"=>$dob,
  "addLine1"=>$addLine1,
  "addLine2"=>$addLine2,
  "country"=>$country,
  "state"=>$state,
  "city"=>$city,
  "mobileNumber"=>$mobileNumber,
  "pincode"=>$pincode,
  "bankAccountNumber"=>$bankAccountNumber,
  "bankAccountHolderName"=>$bankAccountHolderName,
  "bankName"=>$bankName,
  "IFSCCode"=>$IFSCCode,
  "taxProofNumber"=>$taxProofNumber,
  "addressProofType"=>$addressProofType,
  "addressProofNumber"=>$file2,
  "userId"=>$userId
  );

  $context = stream_context_create(array(
    'http' => array(
      'method' => 'POST',
      'header' => "Content-Type: application/json\r\n",
      'content' => json_encode($postData)
      )
    ));

    $response = file_get_contents($url_api.'verification/addVerificationDetails', false, $context);

		 $responseData = json_decode($response, true);
     $data=$responseData['message'];
      if ($responseData) {
        header("location:kyc.php?msg=".$data);
      }
      else{
         header("location:kyc.php?msg=Your verification details is not submited");
      }



?>
