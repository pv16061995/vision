<script type="text/javascript">
  io.sails.url = '<?php echo URL_API;?>';
  window.ioo = io;
  socket = io.connect( '<?php echo URL_API;?>', {
    reconnection: true,
    reconnectionDelay: 1000,
    reconnectionDelayMax : 5000,
    reconnectionAttempts: 99999
  });

  socket.on( 'connect', function () {} );
  socket.on( 'disconnect', function () { socket.connect();  } );

url_api = '<?php echo URL_API;?>';

 function bidAmount() {
          var a = new BigNumber(document.getElementById('bid_rate').value);
          var b = new BigNumber(document.getElementById('bid_vol').value);
          var result = (a).times(b);
          if (!isNaN(result)) {
              document.getElementById('bid_amount').value = result;
          }
    }
     function bidAmountTotal()
      {
          var res= new BigNumber(document.getElementById('bid_amount').value);
          var a = new BigNumber(document.getElementById('bid_vol').value);
          var b = new BigNumber(document.getElementById('bid_rate').value);
          if(res)
          {
            var equal=(res).dividedBy(b);
            document.getElementById('bid_vol').value=equal;
          }

      }
      function askAmount() {
          var a = new BigNumber(document.getElementById('ask_rate').value);
          var b = new BigNumber(document.getElementById('ask_vol').value);
          var result = (a).times(b);
          if (!isNaN(result)) {
              document.getElementById('ask_amount').value = result;

          }
      }
      function askTotalAmount()
      {
        var a = new BigNumber(document.getElementById('ask_amount').value);
        var b = new BigNumber(document.getElementById('ask_vol').value);
        var res = new BigNumber(document.getElementById('ask_rate').value);
          if(res)
          {
            var equal=(res).dividedBy(b);
            document.getElementById('ask_vol').value=equal;
          }

      }

function sell_data(){
var ask_rate = document.getElementById('ask_rate').value;
var ask_vol = document.getElementById('ask_vol').value;
var ask_amount = document.getElementById('ask_amount').value;

var sub_curr='<?php echo substr($currency1,0,3);?>';
var main_curr='<?php echo   strtolower($currency2);?>';

if(ask_rate !='' && ask_vol !='0' && ask_amount !='0')
{

<?php if(isset($_SESSION['user_id'])){
?>
user_id = '<?php echo $_SESSION['user_id']; ?>';
var askownerId=user_id;

var url=url_api+"trademarket"+main_curr+sub_curr.toLowerCase()+"/addAsk"+sub_curr+"Market";
var json_ask = {
"askAmount<?php echo  $currency2;?>":ask_amount,
"askAmount<?php echo substr($currency1,0,3);?>":ask_vol,
"askRate":ask_rate,
"askownerId":askownerId
}


$.ajax({
type: "POST",
contentType: "application/json",
url: url,
data: JSON.stringify(json_ask),
success: function(result){


$('#alertmsg1').empty();

if (result.statusCode!=200)
{
     toastr["error"](result.message);

}
else
{
  toastr["success"](result.message);
}
}
});
<?php }else{?>

toastr["error"]("Please Login First !!", "Error");
<?php }?>
}else{
toastr["error"]("Please filled price and amount first !!!", "Error");
}
}



function buy_data(){
var bid_rate = document.getElementById('bid_rate').value;
var bid_vol = document.getElementById('bid_vol').value;
var bid_amount = document.getElementById('bid_amount').value;

var sub_curr='<?php echo substr($currency1,0,3);?>';
var main_curr='<?php echo   strtolower($currency2);?>';

if(bid_rate !='' && bid_vol !='0' && bid_amount !='0')
{

<?php if(isset($_SESSION['user_id'])){
?>
var user_id = '<?php echo $_SESSION['user_id']; ?>';

var bidownerId=user_id;

var url=url_api+"trademarket"+main_curr+sub_curr.toLowerCase()+"/addBid"+sub_curr+"Market";


var json_ask = {
      "bidAmount<?php echo  $currency2;?>":bid_amount,
      "bidAmount<?php echo substr($currency1,0,3);?>":bid_vol,
      "bidRate":bid_rate,
      "bidownerId":bidownerId,

}


$.ajax({
type: "POST",
contentType: "application/json",
url: url,
data: JSON.stringify(json_ask),
success: function(result){


if (result.statusCode!=200)
  {
     
     toastr["error"](result.message);

}
else
{
  toastr["success"](result.message);
}
}
});
<?php }else{?>

toastr["error"]("Please Login First !!", "Error");

<?php }?>
}else{
toastr["error"]("Please filled price and amount first !!!", "Error");
}
}
var sub_curr='<?php echo substr($currency1,0,3);?>';
var main_curr='<?php echo  strtolower($currency2);?>';
function del(bidId,bidownerId) {

    alertify.confirm('Do you want to Delete Data',function(){

      $.ajax({
        type: "POST",
         url: url_api + "trademarket"+main_curr+sub_curr.toLowerCase()+"/removeBid"+sub_curr+"Market",
        data: {
          "bidId<?php echo substr($currency1,0,3);?>": bidId,
          "bidownerId": bidownerId
        },
        success: function(result){
          toastr["success"]("Data delete Successfully", "Success");

        }
      });
    });
  }
  function del_ask(askId,askownerId) {
    alertify.confirm('Do you want to Delete Data',function(){
      $.ajax({
        type: "POST",
        url: url_api + "trademarket"+main_curr+sub_curr.toLowerCase()+"/removeAsk"+sub_curr+"Market",
        data: {
          "askId<?php echo substr($currency1,0,3);?>":askId,
          "askownerId":askownerId

        },
        success: function(result){
          toastr["success"]("Data delete Successfully", "Success");

      
        }
      });
    });
  }


getAllDetailsOfUser();
getAllAskTotal();
getAllBidTotal();
orderBookBid();
orderBookAsk();
getUsermaincurrencyBalance();
getUsersubcurrencyBalance();
myopenmarket('<?php echo $currencyname?>');
successmarket('<?php echo $currencyname?>');
getCurrentAskPrice();



function getCurrentAskPrice(data){
  $.ajax({
      type: "POST",
      url: url_api+ "trademarket"+main_curr+sub_curr.toLowerCase()+"/getAllAsk"+sub_curr,

      data: {},
      success: function(data)
      {


    if(data.asks<?php echo substr($currency1,0,3);?>){

      $('#ask_current').empty();
      for(var i=0; i< data.asks<?php echo substr($currency1,0,3);?>.length;i++){
        if(data.asks<?php echo substr($currency1,0,3);?>[i].status == 2){
          $('#ask_current').append(" &nbsp;"+data.asks<?php echo substr($currency1,0,3);?>[i].askRate+"");

          break;
        }
      }
    }

      },
      error: function(err){
      }
    });
  }



function getAllDetailsOfUser(){
    $.ajax({
      type: "POST",
      url: url_api+ "user/getAllDetailsOfUser",
      data: {
        userMailId: '<?php if(isset( $_SESSION['useremail'])){ echo $_SESSION['useremail'];} ?>'

      },
      success: function(res)
      {

         getUsermaincurrencyBalance(res);
          getUsersubcurrencyBalance(res);

      },
      error: function(err){
      }
    });
  }
  function getUsermaincurrencyBalance(res){
      $.ajax({
      type: "POST",
      url: url_api+ "user/getAllDetailsOfUser",
      data: {
        userMailId:'<?php if(isset( $_SESSION['useremail'])){ echo $_SESSION['useremail'];} ?>'
      },
      success: function(res)
      {


    $('#balance_bid_able').empty();
    $('#balance_bid_freeze').empty();
    $('#balance_bid_able').append(res.user.<?php echo $currency2;?>balance);
    $('#balance_bid_freeze').append(res.user.Freezed<?php echo $currency2;?>balance);

      },
      error: function(err){
      }
    });
  }
    function getUsersubcurrencyBalance(res){
      $.ajax({
      type: "POST",
      url: url_api+ "user/getAllDetailsOfUser",
      data: {
        userMailId:'<?php if(isset( $_SESSION['useremail'])){ echo $_SESSION['useremail'];} ?>'

      },
      success: function(res)
      {
    $('#balance_ask_able').empty();
    $('#balance_ask_freeze').empty();
    $('#balance_ask_able').append(res.user.<?php echo substr($currency1,0,3);?>balance);
    $('#balance_ask_freeze').append(res.user.Freezed<?php echo substr($currency1,0,3);?>balance);

      },
      error: function(err){
      }
    });
  }

function getAllAsk(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+ "trademarket"+main_curr+sub_curr.toLowerCase()+"/getAllAsk"+sub_curr,
      data: {},
      success: function(data){



      }
    });
  }

  function getAllBid(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+ "trademarket"+main_curr+sub_curr.toLowerCase()+"/getAllBid"+sub_curr,
      data: {},
      success: function(data){



        }
      });
    }

  function getAllAskTotal(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+ "trademarket"+main_curr+sub_curr.toLowerCase()+"/getAllAsk"+sub_curr,
      data: {},
      success: function(data){

        $('#orderbook_last_ASK').empty();
        $('#orderbook_lastask').empty();
        if(data.askAmount<?php echo $currency2;?>Sum && data.askAmount<?php echo substr($currency1,0,3);?>Sum){
        $('#orderbook_lastask').append(" &nbsp;"+data.askAmount<?php echo $currency2;?>Sum.toFixed(5)+"");
        $('#orderbook_last_ASK').append(" &nbsp;"+data.askAmount<?php echo substr($currency1,0,3);?>Sum.toFixed(5) +"");

        }

      }
    });
  }

  function getAllBidTotal(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+ "trademarket"+main_curr+sub_curr.toLowerCase()+"/getAllBid"+sub_curr,
      data: {},
      success: function(data){

        var bid_orders = data;
        $('#orderbook_last_BID').empty();
        $('#orderbook_lastbid').empty();
        if(bid_orders.bidAmount<?php echo $currency2;?>Sum && bid_orders.bidAmount<?php echo substr($currency1,0,3);?>Sum){
           $('#orderbook_lastbid').append(" &nbsp;"+bid_orders.bidAmount<?php echo $currency2;?>Sum.toFixed(5)+"");
           $('#orderbook_last_BID').append(" &nbsp;"+bid_orders.bidAmount<?php echo substr($currency1,0,3);?>Sum.toFixed(5)+"");
        }
      }
    });
  }
  function orderBookBid(){
          $.ajax({
          type: "POST",
          contentType: "application/json",
          url:  url_api+ "trademarket"+main_curr+sub_curr.toLowerCase()+"/getAllBid"+sub_curr,
          data: {},
          success: function(data){

          var bid_orders = data;
          $('#bid-list').empty();

          if(data.bids<?php echo substr($currency1,0,3);?>){
          for (var i = 0; i < 20; i++) {
          if(i==bid_orders.bids<?php echo substr($currency1,0,3);?>.length) break;
          if(data.bids<?php echo substr($currency1,0,3);?>[i].status != 1){

          $('#bid-list').append('<tr><td> BID </td><td>'+bid_orders.bids<?php echo substr($currency1,0,3);?>[i].bidAmount<?php echo substr($currency1,0,3);?>+ '</td><td>' + bid_orders.bids<?php echo substr($currency1,0,3);?>[i].bidRate + '</td><td>' +  bid_orders.bids<?php echo substr($currency1,0,3);?>[i].bidAmount<?php echo $currency2;?> + '</td></tr>');
          
        }
      }
    }
  }
});
}
  function orderBookAsk() {
                $.ajax({
                type: "POST",
                contentType: "application/json",
                url: url_api+ "trademarket"+main_curr+sub_curr.toLowerCase()+"/getAllAsk"+sub_curr,
                data: {},
                success: function(data){
                $('#ask-list').empty();
                if(data.asks<?php echo substr($currency1,0,3);?>){
                for (var j = 0; j < 20; j++){
                if(j==data.asks<?php echo substr($currency1,0,3);?>.length) break;
                if(data.asks<?php echo substr($currency1,0,3);?>[j].status != 1){
                $('#ask-list').append('<tr><td> ASK  </td><td>' +data.asks<?php echo substr($currency1,0,3);?>[j].askAmount<?php echo substr($currency1,0,3);?> + '</td><td>' + data.asks<?php echo substr($currency1,0,3);?>[j].askRate + '</td><td>' +  data.asks<?php echo substr($currency1,0,3);?>[j].askAmount<?php echo $currency2;?> + '</td></tr>');
                
                }
          }
        }
      }
  });
}


 
  io.socket.on('<?php echo substr($currency1,0,3);?>_ASK_ADDED', function askCreated(data){
    getUsermaincurrencyBalance();
    getUsersubcurrencyBalance();
    getAllAskTotal();
    orderBookAsk();
    myopenmarket('<?php echo $currencyname?>');
    successmarket('<?php echo $currencyname?>');
    getCurrentAskPrice();
    
    });
  io.socket.on('<?php echo substr($currency1,0,3);?>_BID_ADDED', function bidCreated(data){
    getUsermaincurrencyBalance();
    getUsersubcurrencyBalance();
    getAllBidTotal();
    orderBookBid();
    myopenmarket('<?php echo $currencyname?>');
    successmarket('<?php echo $currencyname?>');
    getCurrentAskPrice();
    

    });
   io.socket.on('<?php echo substr($currency1,0,3);?>_BID_DESTROYED', function bidCreated(data){
    getUsermaincurrencyBalance();
     getUsersubcurrencyBalance();
      getAllBidTotal();
      orderBookBid();
      myopenmarket('<?php echo $currencyname?>');
      successmarket('<?php echo $currencyname?>');
    


    });
   io.socket.on('<?php echo substr($currency1,0,3);?>_ASK_DESTROYED', function askCreated(data){
    getUsermaincurrencyBalance();
    getUsersubcurrencyBalance();
      getAllAskTotal();
      orderBookAsk();
      myopenmarket('<?php echo $currencyname?>');
      successmarket('<?php echo $currencyname?>');
     

    });


</script>
