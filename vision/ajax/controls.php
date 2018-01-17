<?php
class Controls
{
	public function userdetail($email)
	{
		$url_api=URL_API;
        $postData = array(
          "userMailId"=> $email
          );

          $context = stream_context_create(array(
            'http' => array(
              'method' => 'POST',
              'header' => "Content-Type: application/json\r\n",
              'content' => json_encode($postData)
              )
            ));
         $response = file_get_contents($url_api.'user/getAllDetailsOfUser', false, $context);
         return $response;
	}


	public function getqrcode($email,$curr)
	{
		$url_api = URL_API;
		$postData = array(
					  "userMailId"=>$email
					  );
		$context = stream_context_create(array(
	  'http' => array(
	    'method' => 'POST',
	    'header' => "Content-Type: application/json\r\n",
	    'content' => json_encode($postData)

	    )
	  ));

	 $userapi = file_get_contents($url_api.'user/getAllDetailsOfUser', false, $context);
	 $userapidetail = json_decode($userapi, true);

		if(isset($curr))
		{
			  $currencyname=$curr;

			  switch ($currencyname) {
			    case 'BTC':
			                if($userapidetail['user']['isBTCAddress']==0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewBTCAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];

			                        }
			                }
			                else
			                {
			                    $bcc_address = $userapidetail['user']['userBTCAddress'];


			                }
			        break;
			        case 'BCH':
			                if($userapidetail['user']['isBCHAddress']== 0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewBCHAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];

			                        }
			                }
			                else
			                {
			                    $bcc_address = $userapidetail['user']['userBCHAddress'];

			                }
			        break;
			        case 'LTC':
			                if($userapidetail['user']['isLTCAddress']== 0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewLTCAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];

			                        }
			                }
			                else
			                {
			                    $bcc_address = $userapidetail['user']['userLTCAddress'];

			                }
			        break;
			        case 'VCN':
			                if($userapidetail['user']['isVCNAddress']== 0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewVCNAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];

			                        }
			                }
			                else
			                {
			                    $bcc_address = $userapidetail['user']['userVCNAddress'];

			                }
			        break;

			    }
			}

		return $bcc_address;
	}


	public function getwithdraw($curr,$email,$amount,$spendingPassword,$address)
	{
		$url_api = URL_API;
		if(isset($curr))
		{
			  $currencyname=$curr;
			  $response="";
			  switch ($currencyname) {
			  	case 'BTC':

              $postData = array(
                                  "userMailId"=> $email,
                                  "amount"=> $amount,
                                  "spendingPassword"=>$spendingPassword,
                                  "recieverBTCCoinAddress"=> $address

                              );

                      // Create the context for the request
                      $context = stream_context_create(array(
                                'http' => array(
                                'method' => 'POST',
                                'header' => "Content-Type: application/json\r\n",
                                'content' => json_encode($postData)
                                )
                      ));
                      $response = file_get_contents($url_api.'sendamount/sendBTC', false, $context);


                          break;
                  case 'BCH':

              $postData = array(
                                  "userMailId"=> $email,
                                  "amount"=> $amount,
                                  "spendingPassword"=>$spendingPassword,
                                  "recieverBCHCoinAddress"=> $address

                              );

                      // Create the context for the request
                      $context = stream_context_create(array(
                                'http' => array(
                                'method' => 'POST',
                                'header' => "Content-Type: application/json\r\n",
                                'content' => json_encode($postData)
                                )
                      ));
                      $response = file_get_contents($url_api.'sendamount/sendBCH', false, $context);


                          break;
                   case 'LTC':

              $postData = array(
                                  "userMailId"=> $email,
                                  "amount"=> $amount,
                                  "spendingPassword"=>$spendingPassword,
                                  "recieverLTCCoinAddress"=> $address

                              );

                      // Create the context for the request
                      $context = stream_context_create(array(
                                'http' => array(
                                'method' => 'POST',
                                'header' => "Content-Type: application/json\r\n",
                                'content' => json_encode($postData)
                                )
                      ));
                      $response = file_get_contents($url_api.'sendamount/sendLTC', false, $context);


                          break;
                   case 'VCN':

              $postData = array(
                                  "userMailId"=> $email,
                                  "amount"=> $amount,
                                  "spendingPassword"=>$spendingPassword,
                                  "recieverVCNCoinAddress"=> $address

                              );

                      // Create the context for the request
                      $context = stream_context_create(array(
                                'http' => array(
                                'method' => 'POST',
                                'header' => "Content-Type: application/json\r\n",
                                'content' => json_encode($postData)
                                )
                      ));
                      $response = file_get_contents($url_api.'sendamount/sendVCN', false, $context);

                          break;
                      }
                  }
                  return $response;

	      }



	public function getalltransaction($email,$curr)
	{
			 $postData = array("userMailId"=>  $email);

			  $context = stream_context_create(array(
			    'http' => array(
			      'method' => 'POST',
			      'header' => "Content-Type: application/json\r\n",
			      'content' => json_encode($postData)
			      )
			    ));
			  $url_api=URL_API;

			  $response = file_get_contents($url_api.'/tx/getTxsList'.$curr, false, $context);


			return $response;
	}

	public function userRegister($email,$password,$sendingPass,$secret)
	{
		$url_api=URL_API;
		$postData = array(
			"email"=> $email,
			"password"=>$password,
			"confirmPassword"=>$password,
			"spendingpassword"=>$sendingPass,
			"confirmspendingpassword"=>$sendingPass,
			"googlesecreatekey"=>$secret
			);
			$context = stream_context_create(array(
				'http' => array(
					'method' => 'POST',
					'header' => "Content-Type: application/json\r\n",
					'content' => json_encode($postData)
					)
				));
		$response = file_get_contents($url_api.'user/createNewUser', false, $context);
		return $response;
	}

	public function userLogin($email,$password,$localIP)

	{

		$url_api=URL_API;
		$postData = array(
			"email"=> $email,
			"password"=>$password,
			"ip"=>$localIP
			);
			$context = stream_context_create(array(
				'http' => array(
					'method' => 'POST',
					'header' => "Content-Type: application/json\r\n",
					'content' => json_encode($postData)
					)
				));
		$response = file_get_contents($url_api.'auth/authentcate', false, $context);
		return $response;
	}

	public function passwordResets($emailId)
	{
		$url_api=URL_API;
		$postData = array(
			"userMailId"=> $emailId,
			);
			$context = stream_context_create(array(
				'http' => array(
					'method' => 'POST',
					'header' => "Content-Type: application/json\r\n",
					'content' => json_encode($postData)
					)
				));
			$response = file_get_contents($url_api.'user/sentOtpToEmailForgotPassword', false, $context);
			return $response;
	}

	public function userVrifyOTP($email,$otp)
	{
		$url_api=URL_API;
		$postData = array(
			"userMailId"=> $email,
			"otp"=>$otp
			);
			$context = stream_context_create(array(
				'http' => array(
					'method' => 'POST',
					'header' => "Content-Type: application/json\r\n",
					'content' => json_encode($postData)
					)
				));
			$response = file_get_contents($url_api.'user/verifyOtpToEmailForgotPassord', false, $context);
			return $response;
	}

	public function userPasswordReset($email,$password,$confirm_password)
	{
		$url_api=URL_API;
		$postData = array(
			"userMailId"=> $email,
			"newPassword"=>$password,
			"confirmNewPassword"=>$confirm_password
			);
			$context = stream_context_create(array(
				'http' => array(
					'method' => 'POST',
					'header' => "Content-Type: application/json\r\n",
					'content' => json_encode($postData)
					)
				));
			$response = file_get_contents($url_api.'user/updateForgotPassordAfterVerify', false, $context);
			return $response;
	}
	public function donePasswordChangeFinal($email,$current_password,$password,$confirm_password)
	{
		$url_api=URL_API;
		$postData = array(
			"userMailId"=> $email,
			"currentPassword"=>$current_password,
			"newPassword"=>$password,
			"confirmNewPassword"=>$confirm_password
			);
			$context = stream_context_create(array(
				'http' => array(
					'method' => 'POST',
					'header' => "Content-Type: application/json\r\n",
					'content' => json_encode($postData)
					)
				));
			$response = file_get_contents($url_api.'user/updateCurrentPassword', false, $context);
			return $response;
	}

	public function usertransPasswordReset($email,$currentpass,$password,$confirm_password)
	{
		$url_api=URL_API;
		$postData = array(
			"userMailId"=> $email,
			"currentSpendingPassword"=>$currentpass,
			"newSpendingPassword"=>$password,
			"confirmNewPassword"=>$confirm_password
			);
			$context = stream_context_create(array(
				'http' => array(
					'method' => 'POST',
					'header' => "Content-Type: application/json\r\n",
					'content' => json_encode($postData)
					)
				));
			$response = file_get_contents($url_api.'user/updateCurrentSpendingPassword', false, $context);
			return $response;
	}
	public function userBasicVerification($data)
	{
		$url_api=URL_API;
		$postData = array(
			"userMailId"=> $email,
			"newPassword"=>$password,
			"confirmNewPassword"=>$confirm_password
			);
			$context = stream_context_create(array(
				'http' => array(
					'method' => 'POST',
					'header' => "Content-Type: application/json\r\n",
					'content' => json_encode($postData)
					)
				));
				$response = file_get_contents($url_api.'user/updateForgotPassordAfterVerify', false, $context);
				return $response;
	}

		public function successorderdetailbid($subcat)
	{
		$subcatgory=$subcat;
		$curre=explode("/",$subcatgory);
		$currency1=$curre['0'];
		$currency2=$curre['1'];
		$url_api=URL_API;

         $response = file_get_contents($url_api.'trademarket'.strtolower($currency2).strtolower($currency1).'/getBids'.$currency1.'Success');
         return $response;
	}
	public function successorderdetailask($subcat)
	{
		$subcatgory=$subcat;
		$curre=explode("/",$subcatgory);
		$currency1=$curre['0'];
		$currency2=$curre['1'];
		$url_api=URL_API;

         $response = file_get_contents($url_api.'trademarket'.strtolower($currency2).strtolower($currency1).'/getAsks'.$currency1.'Success');
         return $response;
	}
}
?>
