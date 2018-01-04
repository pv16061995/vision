
<?php 

class allapi
{

  public function getallsubcategory()
  {
    $data = array(
      "1"=>array(
        "id" => "1",
        "name" => "VCN",
         "subcat"=>array(
          "VCN/BTC","VCN/BCH","VCN/LTC"
          ),
        "sort" => 1
      ),
      "2"=>array(
        "id" => 2,
        "name" => "BCH",
       "subcat"=>array(
          "BCH/BTC"
          ),
        "sort" => 2
      ),
      "3"=>array(
        "id" => 3,
        "name" => "LTC",
         "subcat"=>array(
          "LTC/BTC"
          ),
        "sort" => 3
      )
    );
    $data=json_encode($data);
    return $data;
  }

  public function getallcurrency()
  {
    $data = array(
          "BTC","BCH","LTC","VCN"
    );
    $data=json_encode($data);
    return $data;
  }

  public function getallcurrencywithname()
  {
    $data = array(
                "1"=>array(
                  "symbol" => "BTC",
                  "currencyname" => "Bitcoin",
                  
                    ),
       
                "2"=>array(
                  "symbol" => "BCH",
                  "currencyname" => "Bitcoin Cash",
                
                    ),
       
     
                  "3"=>array(
                    "symbol" => "LTC",
                    "currencyname" => "Litecoin",
                    
                      ),

              "4"=>array(
                "symbol" => "VCN",
                "currencyname" => "Vision Coin",
                
                  ),
       
      
    );
   
    $data=json_encode($data);
    return $data;
  }

}



function page_protect()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_SESSION['HTTP_USER_AGENT'])) {
        if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'])) {
            logout();
            exit;
        }
    }
}

function logout()
{
    global $db;
    global $pathString;
    session_start();
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email_id']);
    unset($_SESSION['user_session']);
    unset($_SESSION['user_admin']);
    unset($_SESSION['user_supportpin']);
    unset($_SESSION['HTTP_USER_AGENT']);
    session_unset();
    session_destroy();
    header("Location:".BASE_PATH.'home');
}
?>