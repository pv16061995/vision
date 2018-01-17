<?php 
include 'include/config.php';?>
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

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet noreferrer' type='text/css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body id="main-body">

    <!-- header -->
   <?php include 'include/allheader.php'; ?>
    <!-- end header -->

    <div id="media-width-detection-element"></div>
   
   
    <div id="body-container">
        <div id="event-store"></div>
        <div class="content">
            

        <div id="history-wrapper">
            <div id="pad-wrapper" >
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
            <div class="col-xs-4">
                <h2 class="section-header-in-row">Open</h2>
            </div>
           
        </div>

<div class="datatables-wrapper">
            <table id="allOpenOrdersTable" class="table table-striped table-hover table-condensed table-bordered display nowrap" >
                <thead>
                    <tr>
                        <th class="col-header col-header-option"><i class='fa fa-plus'></i></th>
                        <th class="col-header col-header-date">Order Date</th>
                        <th class="col-header col-header-label">Market</th>
                        <th class="col-header col-header-label">Type</th>
                        <th class="col-header col-header-lg-num">Bid/Ask</th>
                        <th class="col-header col-header-lg-num">Units Filled</th>
                        <th class="col-header col-header-lg-num">Units Total</th>
                        <th class="col-header col-header-lg-num">Units Remaining</th>
                        <th class="col-header col-header-lg-num">Actual Rate</th>
                        <th class="col-header col-header-lg-num">Estimated Total</th>
                        <th class="col-header col-header-lg-num">Order Id</th>
                        <th class="col-header col-header-option"><i class='fa fa-times'></i></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>


            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
    <div class="col-xs-4">
        <h2 class="section-header-in-row">Completed</h2>
    </div>
   
    </div>

<div class="datatables-wrapper">
    <table id="allClosedOrdersTable" class="table table-striped table-hover table-condensed table-bordered display nowrap" >
        <thead>
            <tr>
                <th class="col-header col-header-date">Closed Date</th>
                <th class="col-header col-header-date">Opened Date</th>
                <th class="col-header col-header-label">Market</th>
                <th class="col-header col-header-label">Type</th>
                <th class="col-header col-header-lg-num">Bid/Ask</th>
                <th class="col-header col-header-lg-num">Units Filled </th>
                <th class="col-header col-header-lg-num">Units Total </th>
                <th class="col-header col-header-lg-num">Actual Rate </th>
                <th class="col-header col-header-lg-num"><span data-toggle="tooltip" data-placement="left" title="Cost or Proceeds of Trade including Fee">Cost / Proceeds</span> </th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
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

</body>
</html>
