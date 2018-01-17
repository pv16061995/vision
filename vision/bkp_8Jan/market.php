<?php
include 'include/config.php';
//include 'apis/common.php';
// include 'include/functions.php';



if(isset($_GET['curr']))
{
  $currencyname=base64_decode($_GET['curr']);
  $curre=explode("/",$currencyname);
  $currency1=$curre['0'];
  $currency2=$curre['1'];

}else{
  $currencyname='VCN/BTC';
  $curre=explode("/",$currencyname);
  $currency1=$curre['0'];
  $currency2=$curre['1'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo PROJECT_TITLE;?> </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo/logo.ico">

    <link href="css/other_css/cryptocoins.css" rel="stylesheet" />
    <link href="css/other_css/tpcore.css" rel="stylesheet"/>
    <link href="css/other_css/bcore.css" rel="stylesheet"/>

    <link href="css/other_css/layout.css" rel="stylesheet"/>
    <link href="css/other_css/market.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet noreferrer' type='text/css' />
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
   <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>
    <!-- include the style -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/default.min.css"/>

    
</head>

<body id="main-body">

    <!-- header -->
   <?php include 'include/allheader.php';?>
    <!-- end header -->



    <div id="body-container">
        <div id="event-store"></div>
        <div class="content">


<!-- Facebook script -->

<div id="market-wrapper">

    <!-- end upper main stats -->

    <div id="pad-wrapper">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <h2 class="section-header-in-row top-header">Information</h2>
            </div>

        </div>
        <div class="row" id="rowChart">
            <div class="col-md-12 col-sm-12">
              <div id="container" class="container" width="1000"><img src="images/loader.gif" class="loader-img" style="width: 20%;
    margin-left: 35%;"></div>

            </div>


        </div> <!-- /RowChart -->
            <div class="row">
                <!--trade ui-->
                <h2 class="section-header">Trading</h2>
                <!-- tradeRow -->
                <div class="col-sm-6">

<div class="panel panel-default">
    <div class="panel-heading">
        <table style="width:100%">
            <tr>
                <td style="float:left;">Buy <?echo $currency1;?></td>
                <td style="width: 70%; text-align: right">
                    <span id="balance_bid_able" ></span> <?echo $currency2;?> Available
                </td>
            </tr>
        </table>
    </div>
    <div class="panel-body">
        <form role='form' class="form-horizontal" method="post">
            <div class="form-group">
                <label for="quantity_Buy" class="col-md-1 control-label">Units</label>
                <div class="col-md-11 controls">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" style="width:100px;" type="button">Max</button>
                        </span>
                        <input type="text" class="form-control text-right"  onkeypress="return isNumberKey(event)" value="0" onkeyup="bidAmount()" id="bid_vol" />

                        <span class="input-group-addon" ><?echo $currency1;?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="price_Buy" class="col-md-1 control-label">Bid</label>
                <div class="col-md-11 controls">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button type="button" style="width:100px;" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Price </button>

                        </div>
                        <input type="text" class="form-control text-right" id="bid_rate"  onkeypress="return isNumberKey(event)" onkeyup="bidAmount()" value="0" />
                        <span class="input-group-addon" ><?echo $currency2;?></span>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label class="col-md-1 control-label" for="total_Buy" >Total</label>
                <div class="col-md-11">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button class="btn btn-default" style="width:100px;" type="button" disabled><i class="fa fa-btc"></i></button>
                        </div>
                        <input type="text" class="form-control text-right" id="bid_amount" disabled="disabled" onkeypress="return isNumberKey(event)" onkeydown="return check_number(event);" onkeyup="bidAmountTotal()" value="0" >
                        <span class="input-group-addon" ><?echo $currency2;?></span>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <button type="button" class="btn btn-primary center-block" style="width:200px; margin-top:10px;"  onclick="buy_data();">
                  <i class="fa fa-plus"></i>&nbsp; Buy <?echo $currency1;?></button>
            </div>
             <div class="col-md-12">
                <span id="alertmsg"></span>
            </div>
        </form>
    </div>
</div>

                </div>
                <div class="col-sm-6">

<div class="panel panel-default">
    <div class="panel-heading">
        <table style="width:100%">
            <tr>
                <td style="float:left;">Sell <?echo $currency1;?></td>
                <td style="width: 70%; text-align: right">
                    <span id="balance_ask_able" ></span> <? echo $currency1;?> Available
                </td>
            </tr>
        </table>
    </div>
    <div class="panel-body">
        <form role='form' class="form-horizontal" method="post">
            <div class="form-group">
                <label for="quantity_Sell" class="col-md-1 control-label">Units</label>
                <div class="col-md-11 controls">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" style="width:100px;" type="button" >Max</button>
                        </span>
                        <input type="text" class="form-control text-right" onkeypress="return isNumberKey(event)" onkeyup="askAmount()" value="0" id="ask_vol" />
                        <span class="input-group-addon" ><?echo $currency1;?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="price_Sell" class="col-md-1 control-label">Ask</label>
                <div class="col-md-11">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button type="button" style="width:100px;" class="btn btn-primary dropdown-toggle" >Price </button>

                        </div>
                        <input type="text" class="form-control text-right"  onkeyup="askAmount()" onkeypress="return isNumberKey(event)" id="ask_rate" value="0" />
                        <span class="input-group-addon" ><?echo $currency2;?></span>
                    </div>
                </div>

            </div>


            <div class="form-group">
                <label for="total_Sell" class="col-md-1 control-label" >Total</label>
                <div class="col-md-11">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button class="btn btn-default" style="width:100px;" type="button" disabled><i class="fa fa-btc"></i></button>
                        </div>
                        <input class="form-control text-right" d type="text" onkeyup="askAmountTotal()" disabled="disabled" onkeypress="return isNumberKey(event)"  value="0" id="ask_amount">
                        <span class="input-group-addon" ><?echo $currency2;?></span>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <button type="button" class="btn btn-primary center-block"  onclick="sell_data();" style="width:200px; margin-top:10px;"><i class="fa fa-minus"></i>&nbsp;Sell <?echo $currency1;?></button>
            </div>
            <div class="col-md-12">
                <span id="alertmsg1"></span>
            </div>
        </form>
    </div>
</div>

                </div>
            </div> <!-- tradeRow2 -->
        <div class="row" id="rowTable">
            <!-- order book -->
            <div class="col-xs-4">
                <h2 class="section-header-in-row">Order Book</h2>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <h2 class="subsection-header-in-row">Bids</h2>

  <table id="bidOrdersTable" class="table table-striped table-hover table-condensed table-bordered left-table">
            <thead class="thead-blu">
            <tr>
            <td  width="20%">Bid</td>
            <td width="20%">Amount</td>
            <td width="40%">Price</td>
            <td  width="40%">Total(<?echo $currency2;?>)</td>
            </tr>
            </thead>
            <tbody  id="bid-list"></tbody>
            </table>

            </div>
            <div class="col-xs-12 col-sm-6">
                <h2 class="subsection-header-in-row">Asks</h2>
                <table id="sellOrdersTable" class="table table-striped table-hover table-condensed table-bordered right-table">
                 <thead class="thead-blu">
                 <tr>
                 <td  width="20%">Ask</td>
                 <td width="20%">Amount</td>
                 <td width="40%">Price</td>
                 <td  width="40%">Total(<?echo $currency2;?>)</td>
                 </tr>
                 </thead>
                 <tbody id="ask-list"></tbody>
                  </table>

</div>
        </div>

            <div class="row">

                <div>
                    <div id="idOrderOpenTable">
                        <div class="col-xs-12">

<div class="row">
    <div class="col-xs-4">
        <h2 class="section-header-in-row">Open Orders</h2>
    </div>
    <div class="col-xs-8">
        <div  class="table-toolbar table-toolbar-in-header" >
        </div>
    </div>
</div>



<div class="datatables-wrapper">
  <div id="openmarketdetail"></div>

</div>


                        </div>
                    </div>
                </div>
            </div> <!-- open orders -->

        <div class="row" id="rowTable">
            <!-- market history -->
            <div class="col-xs-12" id="orderSummary">
                <div class="row">
    <div class="col-xs-4">
        <h2 class="section-header-in-row">Market History</h2>
    </div>
    <div class="col-xs-8">
        <div id="market-toolbar-history" class="table-toolbar table-toolbar-in-header" >

        </div>
    </div>
</div>

    <div id="successmarketdetail1"></div>

    </div>
            </div>
        </div>


    </div>



</div>

        </div>



    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <?php include 'include/allfooter.php';?>

    <script src="js/other_js/tpcore.js"></script>
    <script src="js/other_js/datatables.js"></script>
    <script src="js/other_js/utility.js"></script>
    <script src="js/other_js/hubs.js"></script>
    <script src="<?php echo BASE_PATH;?>ajax/ajax.js"></script>
    <script src="js/other_js/amcharts.js"></script>
    <script src ="js/other_js/bignumber.js"></script>
    <script type="text/javascript" src="js/sails.io.js"></script>
    <?php include 'ajax/marketjs.php';?>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script>
    $( document ).ready(function() {
      myopenmarket('<?php echo $currencyname?>');
      successmarket('<?php echo $currencyname?>');
      });


    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 46 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    setInterval(function(){ $('.alert').hide(); }, 5000);

    </script>
    <script>
    var sub_curr='<?php echo substr($currency1,0,3);?>';
    var main_curr='<?php echo  strtolower($currency2);?>';


    url_api = '<?php echo URL_API;?>';
    var arrayObject = [];
    var bidorderTime =[];
    var arrayObjectask = [];
    var askorderTime =[];
    $.getJSON(url_api+"trademarket"+main_curr+sub_curr.toLowerCase()+"/getBids"+sub_curr+"Success", function (data) {

        var  temp =data.bids<?php echo substr($currency1,0,3);?>;

        var date = 1317888000000;
        if(temp){
          for (var i = 0; i < temp.length; i++) {

            arrayObject.push([Number(temp[i].createTimeUTC)*1000,temp[i].bidRate]);
            bidorderTime.push(temp[i].updatedAt);
          }
        }
        $.getJSON(url_api+"trademarket"+main_curr+sub_curr.toLowerCase()+"/getAsks"+sub_curr+"Success", function (dataask) {

            var  tempask = dataask.asks<?php echo substr($currency1,0,3);?>;
            if(tempask){

              for (var i = 0; i < tempask.length; i++) {

                arrayObjectask.push([Number(tempask[i].createTimeUTC)*1000,tempask[i].askRate]);

              }
            }
            Highcharts.chart('container', {
               chart: {
                   zoomType: 'x'
               },
               title:{
                 text:'      '
               },

               subtitle: {
                   text: document.ontouchstart === undefined ?
                           'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
               },
               xAxis: {
                   type: 'datetime'
               },
               yAxis: {
                   title: {
                       text: 'Exchange rate'
                   }
               },
               legend: {
                   enabled: true
               },
               plotOptions: {
                   area: {
                       fillColor: {
                           linearGradient: {
                               x1: 0,
                               y1: 0,
                               x2: 0,
                               y2: 1
                           },
                           stops: [
                               [0, Highcharts.getOptions().colors[0]],
                               [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                           ]
                       },
                       marker: {
                           radius: 2
                       },
                       lineWidth: 1,
                       states: {
                           hover: {
                               lineWidth: 1
                           }
                       },
                       threshold: null
                   }
               },

               series: [
                 // {
                 //   type: 'area',
                 //   name: 'Buy',
                 //   data: arrayObject
                 // },
                 {
                   type: 'area',
                   name: 'Price',
                   data: arrayObjectask
               }],
               responsive: {
                  rules: [{
                      condition: {
                          maxWidth: 500
                      }
                  }]
                }
           });
      });
      });

    setInterval(function(){ $('.alert').hide(); }, 5000);
    </script>
    <script>
    alertify.defaults = {
        // dialogs defaults
        autoReset:true,
        basic:false,
        closable:true,
        closableByDimmer:true,
        frameless:false,
        maintainFocus:true, // <== global default not per instance, applies to all dialogs
        maximizable:true,
        modal:true,
        movable:true,
        moveBounded:false,
        overflow:true,
        padding: true,
        pinnable:true,
        pinned:true,
        preventBodyShift:false, // <== global default not per instance, applies to all dialogs
        resizable:true,
        startMaximized:false,
        transition:'pulse',

        // notifier defaults
        notifier:{
            // auto-dismiss wait time (in seconds)  
            delay:5,
            // default position
            position:'bottom-right',
            // adds a close button to notifier messages
            closeButton: false
        },

        // language resources 
        glossary:{
            // dialogs default title
            title:'Confirm',
            // ok button text
            ok: 'OK',
            // cancel button text
            cancel: 'Cancel'            
        },

        // theme settings
        theme:{
            // class name attached to prompt dialog input textbox.
            input:'ajs-input',
            // class name attached to ok button
            ok:'ajs-ok',
            // class name attached to cancel button 
            cancel:'ajs-cancel'
        }
    };

    </script>
   

</body>
</html>
<style>
.fa-trash{
  font-size: 20px !important;
  color: #e80f0f !important;
}
#bidOrdersTable_filter,#sellOrdersTable_filter,#myorderdetail_filter,#successorderdetail_filter
{
  float: right !important;
}
.highcharts-container
{
  width:100% !important;
}

</style>
