 <?php include 'apis/common.php';
if(!isset($_SESSION['useremail']))
{
    header("location:logout.php");
}

 ?>
 <div id="header-navigation" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid container-header">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="images/logo/logo.png" alt='' height="24" />
                </a>
            </div>
            <div class="navbar-collapse collapse">
               
                <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-line-chart"></i><span class="hidden-sm">&nbsp; Markets</span>  <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">


<?php 
$obj=NEW allapi();
$data=$obj->getallsubcategory();
$result=json_decode($data, true);
$i=1;
foreach($result as $cat) {                        
foreach($cat['subcat'] as $subcatgory)
{ ?>
     <li>
        <a href="<?php echo BASE_PATH;?>market.php?curr=<?php echo base64_encode($subcatgory);?>">
            <i class="fa fa-random"></i>
            <span>&nbsp; <?php echo $subcatgory; ?></span>
        </a>
    </li>

<?php
}$i++;
}
?>
                              
                            </ul>
                        </li>
                  <!--   </ul>

                <ul class="nav navbar-nav navbar-right"> -->

                     <!-- <li>
                        <a href="#dash_menu_fiat">
                            <i class="fa fa-usd"></i>
                            <span>Markets</span>
                        </a>
                    </li> 
                        
                        <li>
                            <a href="orders.php">
                                <i class="fa fa-calendar"></i>
                                <span class="hidden-sm">&nbsp; Orders</span>
                            </a>
                        </li>-->
                        <li >
                            <a href="wallet.php">
                                <i class="fa fa-btc"></i>
                                <span class="hidden-sm">&nbsp; Wallets</span>
                            </a>
                        </li>
                        <li>
                            <a href="basicverification.php">
                                <i class="fa fa-cog"></i>
                                <span class="hidden-sm">&nbsp; Settings</span>
                            </a>
                        </li>

                        <li>
                            <a href="logout.php">
                                <i class="fa fa-sign-out "></i>
                                <span class="hidden-sm">&nbsp; Logout</span>
                            </a>
                        </li>
                
                </ul>
            </div>
        </div>
    </div>
