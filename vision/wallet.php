<?php 
include 'include/config.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo PROJECT_TITLE;?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
   <link rel="icon" type="image/png" href="images/favicon/favicon.png">
    
    <link href="css/other_css/cryptocoins.css" rel="stylesheet" />
    <link href="css/other_css/tpcore.css" rel="stylesheet"/>

    <link href="css/other_css/bcore.css" rel="stylesheet"/>

    <script src="css/other_css/modernizr.css"></script>

    <link href="css/other_css/layout.css" rel="stylesheet"/>
  
    
    <style type="text/css">
        #balanceTable_filter,#withdrawdetailtable_filter,#depositdetailtable_filter{
            float: right;
        }
    </style>
</head>

<body id="main-body">

    <!-- header -->
   <?php include 'include/allheader.php'; ?>
    <!-- end header -->

   
    
        
    </div>
   

    <div id="body-container">
        <div id="event-store"></div>
        <div class="content">
            
<div id="balance-wrapper">
    <div id="pad-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
    <div class="col-md-6">
        <h2 class="section-header-in-row">Account Balances </h2>
    </div>
    
</div>


<div class="datatables-wrapper">
    <div id="accountbalances"></div>
    
</div>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12 ">
                <h2 class="section-header-in-row">Withdrawal</h2>

<div class="datatables-wrapper datatables-wrapper-sm">
    <div id="withdrawaldetail">
        <table id="withdrawdetailtable" class="table table-striped table-hover table-condensed table-bordered display nowrap" >
        <thead>
            <tr>
                <th class="col-header col-header-date">Date</th>
                <th class="col-header col-header-label">Currency</th>
                <th class="col-header col-header-lg-num">Units</th>
            </tr>
        </thead><tbody></tbody></table>
    </div>
 
</div>

            </div>
            <div class="col-lg-6 col-md-12 ">
                
<h2 class="section-header-in-row">Deposit</h2>
<div class="datatables-wrapper datatables-wrapper-sm">
<div id="depositdetail">
    <table id="depositdetailtable" class="table table-striped table-hover table-condensed table-bordered display nowrap" >
        <thead>
            <tr>
                <th class="col-header col-header-date">Date</th>
                <th class="col-header col-header-label">Currency</th>
                <th class="col-header col-header-lg-num">Units</th>
                
                
            </tr>
        </thead><tbody></tbody></table>

</div>
 </div>

            </div>
        </div>

       
    </div>

<div class="modal fade" id="walletWithdrawalModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" >Deposit</h4>
            </div>
            <div class="modal-body">
                
<div class='panel panel-default'>
    <div class='panel-heading'>
        <table style="width:100%">
            <tr>
                <td style="width: 30%; text-align:left">Withdrawal <span data-bind="text: wallet.coinName"></span></td>
                <td style="width: 70%; text-align: right">
                    <span data-bind="text: 'Currently Available: ' + wallet.available() + ' ' + wallet.currency()" style="margin-right:5px"></span>
                </td>
            </tr>
        </table>

    </div>
    
</div>

                
            </div>
        </div>
    </div>
</div>

</div>

        </div>

        <div class="hidden-lg" style="margin-bottom: 47px"></div>
    </div>

       <?php include 'include/allfooter.php';?>

    <script src="js/other_js/tpcore.js"></script>
    <script src="js/other_js/datatables.js"></script>
    <script src="js/other_js/utility.js"></script>
    <script src="js/other_js/hubs.js"></script>
    <script src="ajax/ajax.js"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            accountbalance();
            getalltransactionwithdraw();
            getalltransactiondeposit();
            $('#withdrawdetailtable').dataTable({
            "sPaginationType": "full_numbers"
            });
            $('#depositdetailtable').dataTable({
            "sPaginationType": "full_numbers"
            });
        
        });
    </script>

</body>
</html>

<!--================== Qr Detail =========================-->
<div class="modal fade in" id="qrcode" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Qr Code</h4>
        </div>
        <div class="modal-body text-center">
         <div id="getqrcode"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
<!--================== /Qr Detail =========================-->

<!--================== withdraw Detail =========================-->
<div class="modal fade in" id="walletwithdrawModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" data-bind="text: wallet.withdrawalModalTitle">Withdrawal</h4>
            </div>
            <div class="modal-body">
                
<div class="panel panel-default">
    <div class="panel-heading">
        <table style="width:100%">
            <tbody><tr>
            <td style="width:50%;text-align:left"><span style="margin-right:5px" id="current_bal"></span></td>
            <td style="width:50%;text-align:right"><span style="margin-right:5px" id="freeze_bal"></span>
            </td>
            </tr></tbody>
        </table>

    </div>
    <div class="panel-body">
        <form role="form" class="form-horizontal" method="post">
        <div id="getwithdraw"></div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label" >Address</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="button" disabled=""><i class="fa fa-map-pin"></i></button>
                        </div><!-- /btn-group -->
                        <input  type="text" name="address" required="" id="address" class="form-control text-right"  style="font-size: 13px;">
                        <span class="input-group-addon" data-bind="text:wallet.addOnWithdrawalBaseAddress">ADDR</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Quantity</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button" data-bind="click: wallet.withdrawMax" data-toggle="tooltip" data-placement="top" title="Withdraw All"><i class="fa fa-angle-double-up"></i></button>
                        </span>
                        <input  class="form-control text-right" id="amount" name="amount" required="" >
                        <span class="input-group-addon" id="withdraw_currency1"></span>
                        <input type="hidden" name="withdraw_currencyname" id="withdraw_currencyname" >
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label">Spending Password</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button class="btn btn-default" style="padding-left:9px;padding-right:9px" type="button" disabled=""><i class="fa fa-cloud-upload"></i></button>
                        </div>
                        <input  class="form-control text-right" id="spendingpass" name="spendingpass" type="Password" required="" >
                        <span class="input-group-addon" ><i class="fa fa-cloud-upload"></i></span>
                    </div>
                </div>
            </div>
           
            <div class="col-sm-12">
                <button  type="submit" class="btn btn-primary center-block" onclick="getwithdraw();"><i class="fa fa-cloud-upload"></i>&nbsp; Withdrawal</button>
            </div>
        </form>
    </div>
</div>

            </div>
        </div>
    </div>
</div>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet noreferrer' type='text/css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--================== withdraw Detail =========================-->
