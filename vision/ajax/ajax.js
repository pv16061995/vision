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

 