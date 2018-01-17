<?php
///echo URL_API.''./verification/addVerificationDetails
include'include/config.php';
$url_api=URL_API;

$file=$_FILES['taxProofImageName'];
$userId=$_POST['userId'];
$Data = {userId : $userId, taxProofImageName : $file}
// $postData = array("taxProofImageName : "=>$file,"userId"=>$userId);

    $response = file_get_contents('192.168.1.20:1339/verification/uploadTaxProofImageImage', $Data);


		 $responseData = json_decode($response, true);
     print_r($responseData);
     // $data=$responseData['message'];
     //  if ($responseData) {
     //
     //    header("location:".BASE_PATH."kyc.php?msg=".$data);
     //  }
     //  else{
     //     header("location:".BASE_PATH."kyc.php?msg=Your verification details is not submited");
     //  }



?>
