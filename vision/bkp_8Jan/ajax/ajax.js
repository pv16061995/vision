function accountbalance()
{

	  $.post("ajax/ajax.php",{
			q:"accountbalances"
			},
			function(data){
			$('#accountbalances').html(data);
			$('#balanceTable').dataTable({
	        "sPaginationType": "full_numbers"
	        });

			}
		);

}

function isNumberKey(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 46 && (charCode < 48 || charCode > 57))
	return false;
	return true;
	}
function getqrcode(currency)
{
	 $.post("ajax/ajax.php",{
	 		currency:currency,
			q:"getqrcode"
			},
			function(data){
			$('#getqrcode').html(data);


			}
		);
}

function getwithdraw()
{
	var currency=$('#withdraw_currencyname').val();
	var address=$('#address').val();
	var amount=$('#amount').val();
	var spendingpass=$('#spendingpass').val();

	 $.post("ajax/ajax.php",{
	 		currency:currency,
	 		address:address,
	 		amount:amount,
	 		spendingpass:spendingpass,
			q:"getwithdraw"
			},
			function(dat){
				data=dat.split('^');
				if (data[1]!=200)
				{toastr["error"](data[2]);}
				else
				{toastr["success"](data[2]);}
			}
		);
}

function getwithdrawdetail(currency)
{
	 $.post("ajax/ajax.php",{
		currency:currency,
	q:"getwithdrawdetail"
	},
	function(data){
	dat=data.split('^');
	$('#current_bal').html(dat[1]);
	$('#freeze_bal').html(dat[2]);
	$('#withdraw_currency1').html(dat[3]);
	$('#withdraw_currency2').html(dat[3]);
	$('#withdraw_currencyname').val(dat[3]);
	}
);
}

function getalltransactionwithdraw()
{
	$.post("ajax/ajax.php",{

	q:"getalltransactionwithdraw"
	},
	function(data){
		$('#withdrawaldetail').html(data);
		$('#withdrawdetailtable').dataTable({
	        "sPaginationType": "full_numbers"
	        });
	}
);
}

function getalltransactiondeposit()
{
	$.post("ajax/ajax.php",{

	q:"getalltransactiondeposit"
	},
	function(data){
		$('#depositdetail').html(data);
		$('#depositdetailtable').dataTable({
	        "sPaginationType": "full_numbers"
	        });
	}
);
}


function myopenmarket(subcat)
{

	$.post("ajax/ajax.php",{

	q:"myopenmarket",
	subcat:subcat
	},
	function(data){

		$('#openmarketdetail').html(data);
		$('#myorderdetail').dataTable({
           "sPaginationType": "full_numbers"
           });
	}
	);
}
function successmarket(subcat)
{

	$.post("ajax/ajax.php",{

	q:"successmarket",
	subcat:subcat
	},
	function(data){

		$('#successmarketdetail1').html(data);
		$('#successorderdetail1').dataTable({
           "sPaginationType": "full_numbers"
           });
	}
	);
}
