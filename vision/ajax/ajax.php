<?php
include '../include/config.php';
include 'controls.php';
include '../apis/common.php';
include '../include/GoogleAuthenticator.php';

if($_POST['q']=='accountbalances')
{
  accountbalances();
}else if($_POST['q']=='getqrcode')
{
  getqrcode();
}else if($_POST['q']=='getwithdraw')
{
  getwithdraw();
}else if($_POST['q']=='getwithdrawdetail')
{
  getwithdrawdetail();
}else if($_POST['q']=='getalltransactionwithdraw')
{
  getalltransactionwithdraw();
}else if ($_POST['q']=='signup') {
  userSignup();
}else if ($_POST['q']=='login') {
  userLogin();
}else if($_POST['q']=='getalltransactiondeposit')
{  getalltransactiondeposit();
}
else if($_POST['q']=="resetPass")
{  userresetpassword();
}
else if($_POST['q']=="userotp")
{  verifyOTP();
}
else if($_POST['q']=="final_reset")
{  donePasswordReset();
}
else if($_POST['q']=="final_changepass")
{  donePasswordChange();
}
else if($_POST['q']=="basic_verification")
{  userbasicverification();
}else if($_POST['q']=="myopenmarket")
{  myopenmarket();
}else if($_POST['q']=="successmarket")
{  successmarket();
}
else if($_POST['q']=="reset_trans")
{  resettranspass();
}


function accountbalances()
{
    $email=$_SESSION['useremail'];

    $objapi=NEW allapi();
    $currencyname=$objapi->getallcurrencywithname();
    $currencynam=json_decode($currencyname,true);



    $obj=NEW Controls();
    $data=$obj->userdetail($email);
    $responseData=json_decode($data,true);


    $detail='';
    $detail .='<table id="balanceTable" class="table table-striped table-hover table-condensed table-bordered display nowrap" >
        <thead>
            <tr>
                <th class="col-header col-header-option" style="min-width:78px; width:78px"><i class="fa fa-plus"></i></th>
                <th class="col-header col-header-label">Currency Name</th>
                <th class="col-header col-header-label">Symbol</th>
                <th class="col-header col-header-lg-num">Available Balance</th>
                <th class="col-header col-header-lg-num">Freeze Balance</span></th>
                <th class="col-header col-header-lg-num">Total</th>
            </tr>
        </thead><tbody>';
      foreach($currencynam as $result)
      {
          $cun=$result['symbol'];

          $detail .='<tr>';
          $detail .='<td><div class="center-block text-center">
          <button type="button" class="btn btn-primary btn-xs text-center wallet qrfade" style="margin:-6px 2px" onclick="getqrcode(\''.$cun.'\')" data-toggle="modal" data-target="#qrcode"><span class="fa fa-plus"></span></button>
          <button type="button" class="btn btn-primary btn-xs text-center wallet walletwithdrawModal" style="margin:-6px 2px" data-toggle="modal" data-target="#walletwithdrawModal" onclick="getwithdrawdetail(\''.$cun.'\')"><span class="fa fa-minus"></span></button>
          </div></td>';
          $detail .='<td>'.$result['currencyname'].'</td>';
          $detail .='<td>'.$result['symbol'].'</td>';
          $detail .='<td>'.$responseData['user'][$cun.'balance'].'</td>';
          $detail .='<td>'.$responseData['user']['Freezed'.$cun.'balance'].'</td>';
          $detail .='<td>'.$total=$responseData['user'][$cun.'balance']+$responseData['user']['Freezed'.$cun.'balance'].'</td>';
          $detail .='</tr>';
      }
      $detail .= '</tbody></table>';

        echo $detail;
}

function getqrcode()
{
    $email=$_SESSION['useremail'];
    $curr=$_POST['currency'];
    $obj=NEW controls();
    $bcc_address=$obj->getqrcode($email,$curr);

    $detail='';
    $detail .='<div class="alert alert-success" style="margin-top:18px;">'.$bcc_address.'</div>';
    $detail .= '<img src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl='.$bcc_address.'"
                                                  alt="QR Code" style="width:200px;border:0;"/>';
    echo $detail;
}

function getwithdraw()
{
  $email=$_SESSION['useremail'];
  $cun=$_POST['currency'];
  $amount = $_POST['amount'];
  $spendingpass= $_POST['spendingpass'];
  $address = $_POST['address'];



  $obj=NEW Controls();
  $data=$obj->getwithdraw($cun,$email,$amount,$spendingpass,$address);
  $responseData=json_decode($data,true);



  echo 'detail^'.$responseData['statusCode'].'^'.$responseData['message'].'^detail';
}



function getwithdrawdetail()
{
  $email=$_SESSION['useremail'];
  $cun=$_POST['currency'];

  $obj=NEW Controls();
  $data=$obj->userdetail($email);
  $responseData=json_decode($data,true);


  $avail_bal='Currently Available: '.$responseData['user'][$cun.'balance'].$cun;
  $freeze_bal='Freeze Available: '.$responseData['user']['Freezed'.$cun.'balance'].$cun;


  echo 'detail^'.$avail_bal.'^'.$freeze_bal.'^'.$cun.'^detail';
}



function getalltransactionwithdraw()
{
  $email=$_SESSION['useremail'];
  $obj=NEW Controls();
  $dataBTC=$obj->userdetail($email);
  $responseData=json_decode($dataBTC,true);
  $detail='';
    $detail .='<table id="withdrawdetailtable" class="table table-striped table-hover table-condensed table-bordered display nowrap" >
        <thead>
            <tr>
                <th class="col-header col-header-date">Date</th>
                <th class="col-header col-header-label">Currency</th>
                <th class="col-header col-header-lg-num">Units</th>
            </tr>
        </thead><tbody>';
        foreach ($responseData['user']['transations'] as $value) {
            if($value['actionId']==1)
            {
            $detail .='<tr>';
            $detail .='<td>'.date('d-M-Y h:i:s',strtotime($value['createdAt'])).'</td>';
            $detail .='<td>'.$value['currencyName'].'</td>';
            $detail .='<td>'.$value['amount'].'</td>';

            $detail .='</tr>';
          } }
  $detail .= '</tbody></table>';

      echo $detail;

}

function getalltransactiondeposit()
{
  $email=$_SESSION['useremail'];


  $obj=NEW Controls();


  $dataBTC=$obj->userdetail($email);
  $responseData=json_decode($dataBTC,true);
  $detail='';
    $detail .='<table  id="depositdetailtable" class="table table-striped table-hover table-condensed table-bordered display nowrap">
        <thead>
            <tr>
                <th class="col-header col-header-date">Date</th>
                <th class="col-header col-header-label">Currency</th>
                <th class="col-header col-header-lg-num">Units</th>
            </tr>
        </thead><tbody>';
        foreach ($responseData['user']['transations'] as $value) {
            if($value['actionId']==2)
            {
            $detail .='<tr>';
            $detail .='<td>'.date('d-M-Y h:i:s',strtotime($value['createdAt'])).'</td>';
            $detail .='<td>'.$value['currencyName'].'</td>';
            $detail .='<td>'.$value['amount'].'</td>';
            $detail .='</tr>';
          } }
  $detail .= '</tbody></table>';

      echo $detail;

}

function userSignup()
{
  //print_r($_POST);
  $ga = new GoogleAuthenticator();
  $secret = $ga->createSecret();
  echo $secret;
  $email=trim($_POST['email']);
  $pass=trim($_POST['pass']);
  $sendingPass=$_POST['sendingpass'];
  $obj=NEW Controls();
  $data=$obj->userRegister($email,$pass,$sendingPass,$secret);
  $responseData=json_decode($data,true);
  echo 'test^'.$responseData['statusCode'].'^'.$responseData['message'].'^test';
}

function userLogin()
{
  $email=trim($_POST['email']);
  $pass=trim($_POST['pass']);
  $localIP = getHostByName(getHostName());
  echo $localIP;
  $obj=NEW Controls();
  $data=$obj->userLogin($email,$pass,$localIP);
  $responseData=json_decode($data,true);
  $_SESSION['useremail']=$responseData['user']['email'];
  $_SESSION["user_id"] = $responseData['user']['id'];
  $_SESSION['secret_key']=$responseData['user']['googlesecreatekey'];
  $_SESSION['tfastatus']=$responseData['user']['tfastatus'];
  $_SESSION['token']=$responseData['token'];
  echo 'test^'.$responseData['statusCode'].'^'.$responseData['message'].'^test';
}


function userresetpassword()
{
    $emailId=$_POST['emailId'];
    $obj=NEW Controls();
    $data=$obj->passwordResets($emailId);
    $responseData=json_decode($data,true);
    echo $responseData['statusCode']."_".$responseData['message'];
}

function verifyOTP()
{
  $email=trim($_POST['emailId']);
  $otpVal=trim($_POST['userotp']);
  $obj=NEW Controls();
  $data=$obj->userVrifyOTP($email,$otpVal);
  $responseData=json_decode($data,true);
  echo $responseData['statusCode']."_".$responseData['message'];
}
function donePasswordReset()
{
  $email=trim($_POST['emailId']);
  $password=trim($_POST['pass']);
  $confirm_password=trim($_POST['new_pass']);
  $obj=NEW Controls();
  $data=$obj->userPasswordReset($email,$password,$confirm_password);
  $responseData=json_decode($data,true);
  echo $responseData['statusCode']."_".$responseData['message'];
}
function donePasswordChange()
{
  $email=trim($_POST['emailId']);
  $current_password=trim($_POST['cpass']);
  $password=trim($_POST['pass']);
  $confirm_password=trim($_POST['new_pass']);
  $obj=NEW Controls();
  $data=$obj->donePasswordChangeFinal($email,$current_password,$password,$confirm_password);
  $responseData=json_decode($data,true);
  echo $responseData['statusCode']."_".$responseData['message'];
}
function resettranspass()
{
  $email=trim($_POST['emailId']);
  $current_password=trim($_POST['cpass']);
  $password=trim($_POST['pass']);
  $confirm_password=trim($_POST['new_pass']);
  $obj=NEW Controls();
  $data=$obj->usertransPasswordReset($email,$current_password,$password,$confirm_password);
  $responseData=json_decode($data,true);
  echo $responseData['statusCode']."_".$responseData['message'];
}
function userbasicverification()
{
  $form_data=$_POST['data'];
  $obj=NEW Controls();
  $data=$obj->userBasicVerification($form_data);
  $responseData=json_decode($data,true);
  echo $responseData['statusCode']."_".$responseData['message'];
}

function myopenmarket()
{
  $email=$_SESSION['useremail'];
  $subcatgory=$_POST['subcat'];
  $curre=explode("/",$subcatgory);
  $currency1=$curre['0'];
  $currency2=$curre['1'];

    $detail='';
    $detail .= '<table id="myorderdetail" class="table table-striped table-bordered table color-bordered-table warning-bordered-table">
          <thead>
              <tr>
                  <th width="15%">Order Date</th>
          <th width="8%">BID/ASK  </th>
          <th width="15%">Units '.$currency1.'</th>
          <th width="15%">ACTUAL RATE </th>
          <th width="15%">Units Total '.$currency1.'</th>
          <th width="15%">Units Total '.$currency2.'</th>
          <th width="10%">ACTION</th>

              </tr>
          </thead>
          <tbody>';
  $currency1=substr($currency1,0,3);
  $i=0;
    $obj=NEW controls();
    $response=$obj->userdetail($email);
    $responseData = json_decode($response, true);


    $bid=$responseData['user']['bids'.$currency1];
    $ask=$responseData['user']['asks'.$currency1];

    $repon=array_merge($bid,$ask);

    foreach($repon as $data)
    {

      if($data['status']=='2')
      {
        if(isset($data['bidAmount'.$currency1]))
        {
          $detail .='<tr>';
          $detail .='<td>'.date('d-M-Y h:i:s',strtotime($data['createdAt'])).'</td>';
          $detail .='<td>BID</td>';
          $detail .='<td>'.$data['bidAmount'.$currency1].'</td>';
          $detail .='<td>'.$data['bidRate'].'</td>';
          $detail .='<td>'.$data['totalbidAmount'.$currency1].'</td>';
          $detail .='<td>'.$data['totalbidAmount'.$currency2].'</td>';
          $detail .='<td><a href="javascript:;" onclick="del(id=\''.$data['id'].'\',ownwe=\''.$data['bidowner'.$currency1].'\');"><i class="fa fa-trash"></i></a></td>';
          $detail .='</tr>';
        }else if($data['askAmount'.$currency1]){
          $detail .='<tr>';
          $detail .='<td>'.date('d-M-Y h:i:s',strtotime($data['createdAt'])).'</td>';
          $detail .='<td>ASK</td>';
          $detail .='<td>'.$data['askAmount'.$currency1].'</td>';
          $detail .='<td>'.$data['askRate'].'</td>';
          $detail .='<td>'.$data['totalaskAmount'.$currency1].'</td>';
          $detail .='<td>'.$data['totalaskAmount'.$currency2].'</td>';
          $detail .='<td><a href="javascript:;" onclick="del_ask(id=\''.$data['id'].'\',ownwe=\''.$data['askowner'.$currency1].'\');"><i class="fa fa-trash"></i></a></td>';
          $detail .='</tr>';
        }

    }
   }

   echo $detail;
}

function successmarket()
{
  $email=$_SESSION['useremail'];
  $subcatgory=$_POST['subcat'];
  $curre=explode("/",$subcatgory);
  $currency1=$curre['0'];
  $currency2=$curre['1'];

    $detail='';
    $detail .= '<table id="successorderdetail1" class="table table-striped table-bordered table color-bordered-table warning-bordered-table">
          <thead>
              <tr>
                  <th width="15%">Order Date</th>
          <th width="8%">BID/ASK  </th>
          <th width="15%">Units '.$currency1.'</th>
          <th width="15%">ACTUAL RATE </th>
          <th width="15%">Units Total '.$currency1.'</th>
          <th width="15%">Units Total '.$currency2.'</th>

              </tr>
          </thead>
          <tbody>';
  $currency1=substr($currency1,0,3);
  $i=0;
    $obj=NEW controls();
    //$response=$obj->userdetail($email);
    $responsebid=$obj->successorderdetailbid($_POST['subcat']);
    $responseDatabid = json_decode($responsebid, true);


    $responseask=$obj->successorderdetailask($_POST['subcat']);
    $responseDataask = json_decode($responseask, true);

    if(($responseDatabid['statusCode']!=401) || ($responseDataask['statusCode']!=401))
    {

    $bid=$responseDatabid['bids'.$currency1];
    $ask=$responseDataask['asks'.$currency1];

    $repon=array_merge($bid,$ask);

    foreach($repon as $data)
    {

      if($data['status']=='1')
      {

        if(isset($data['bidAmount'.$currency1]))
        {
          $detail .='<tr>';
          $detail .='<td>'.date('d-M-Y h:i:s',strtotime($data['createdAt'])).'</td>';
          $detail .='<td>BID</td>';
          $detail .='<td>'.$data['bidAmount'.$currency1].'</td>';
          $detail .='<td>'.$data['bidRate'].'</td>';
          $detail .='<td>'.$data['totalbidAmount'.$currency1].'</td>';
          $detail .='<td>'.$data['totalbidAmount'.$currency2].'</td>';
          $detail .='</tr>';
        }else if(isset($data['askAmount'.$currency1])){
          $detail .='<tr>';
          $detail .='<td>'.date('d-M-Y h:i:s',strtotime($data['createdAt'])).'</td>';
          $detail .='<td>ASK</td>';
          $detail .='<td>'.$data['askAmount'.$currency1].'</td>';
          $detail .='<td>'.$data['askRate'].'</td>';
          $detail .='<td>'.$data['totalaskAmount'.$currency1].'</td>';
          $detail .='<td>'.$data['totalaskAmount'.$currency2].'</td>';
          $detail .='</tr>';
        }

    }
   }
   }

   echo $detail;

}
?>
