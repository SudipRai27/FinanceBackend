@extends('backend.superadmin.main')
@section('content')
<h4><b>Calculate EMI</b></h4>
<div class="row">
 <div class="col-xs-12">
  <div class="box"> 
	<div class="box-body">

        <div class="col-xs-12">
            <div class="col-md-12" >
            
				<div class="form-group">
				  <label class="col-md-4 control-label" for="amount">Loan Amount (Rs)</label>  
				  <div class="col-md-5">
				  <input id="amount" name="amount" type="text" placeholder="" class="form-control input-md" required value="{{ Input::old('amount') }}">
				  </div>
				</div>
				<br><br>
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="rate">Interest Rate </label>  
				  <div class="col-md-5">
				  <input id="rate" name="rate" type="text" placeholder="" class="form-control input-md" required value="">
				  </div>
				</div>
				<br><br>		       
				<div class="form-group">
				  <label class="col-md-4 control-label" for="term">Term (Months)</label>  
				  <div class="col-md-5">
				  <input id="term" name="term" type="text" placeholder="" class="form-control input-md" required value="">	   
				  </div>
				</div>
				<br><br>
         		<div class="form-group">
				  <label class="col-md-4 control-label" for="submit"></label>
				  <div class="col-md-5">
				   <input type = "submit" value="Calculate" onclick="doValidation()" class="btn btn-primary">
				    <input type = "submit" value="Reset" onclick="resetForm()" class="btn btn-danger">
				  </div>
            	</div>
            	<br><br>
            	<div class="form-group">
				  <label class="col-md-4 control-label" for="emi">Monthly EMI payment</label>  
				  <div class="col-md-5">
				  <input id="emi" name="emi" type="text" placeholder="" class="form-control input-md" required value="">	   
				  </div>
				</div>
            {{ csrf_field() }} 
            </div>
       	</div>
	
	</div>
  </div>
 </div>
</div>

@stop
@section('custom-js')
<script type="text/javascript">
	function doValidation()
	{
		
		var amount = document.getElementById('amount').value;
		var rate = document.getElementById('rate').value;
		var term = document.getElementById('term').value;

		//Amount Validation

		if(amount == '')
		{
			alert('Amount Cannot be Empty');
			document.getElementById('amount').style.borderColor = "red";
			return false;
		}
		else
		{
			document.getElementById('amount').style.borderColor = "green";
		}

		if(parseFloat(amount) == 0)
		{
			alert('Amount should not start with zero');
			document.getElementById('amount').style.borderColor = "red";
			return false;
		}
		else
		{
			document.getElementById('amount').style.borderColor = "green";
		}

		if ((amount.match(/[a-z A-Z]/)) != null)
		{
			alert('Enter amount in numbers');
			document.getElementById('amount').style.borderColor = "red";
			return false;
		}
		else
		{
			document.getElementById('amount').style.borderColor = "green";
		}

		//Rate Validation

		if(rate == '')
		{
			alert('Rate Cannot be Empty');
			document.getElementById('rate').style.borderColor = "red";
			return false;
		}
		else
		{
			document.getElementById('rate').style.borderColor = "green";
		}

		if((rate.match(/[a-z A-Z \- `  ! @ # $ % ^ & * ]/)) != null)
		{
			alert("Enter only positive number for Interest Rate");
			document.getElementById('rate').style.borderColor = "red";
			return false;
		}
		else
		{
			document.getElementById('rate').style.borderColor = "green";
		}

		if((parseFloat(rate) == 0)|| (parseFloat(rate) >= 100))
		{
			alert("Enter a valid interest rate - Range between 0.01 to 99.99");
			document.getElementById('rate').style.borderColor = "red";
			return false;
		}
		else
		{
			document.getElementById('rate').style.borderColor = "true";
		}

		if((rate.indexOf(".",0)) != (-1))
		{
			rate=rate.substring(rate.indexOf(".")+1,rate.length);
			if(rate.length > 2)
			{
				alert("Only two decimal places are allowed in Interest Rate");
				document.getElementById('rate').style.borderColor = "red";
				return false;
			}
			else
			{
				document.getElementById('rate').style.borderColor = "green";
			}
		}

		//Term (Time) Validation
		if(term == '')
		{
			alert('Term Cannot be Empty');
			document.getElementById('term').style.borderColor = "red";
			return false;
		}
		else
		{
			document.getElementById('term').style.borderColor = "green";
		}

		if(parseFloat(term) == 0)
		{
			alert('Term should not start with zero');
			document.getElementById('term').style.borderColor = "red";
			return false;
		}
		else
		{
			document.getElementById('term').style.borderColor = "green";
		}

		if((term.match(/[a-z A-Z]/)) != null)
		{
			alert('Enter term in numbers');
			document.getElementById('term').style.borderColor = "red";
			return false;
		}
		else
		{
			document.getElementById('term').style.borderColor = "green";
		}

		doCalculation();
	}

	function doCalculation()
	{
		var a = $('#amount').val();
		var b = $('#rate').val();
		var d = $('#term').val();
		var c = d / 12;

        var n = c * 12;
        var r = b / (12 * 100);
        var p = (a * r * Math.pow((1 + r), n)) / (Math.pow((1 + r), n) - 1);
        var prin = Math.round(p * 100) / 100;
        
        $("#emi").val(prin);
	}

	function resetForm()
	{
		$('#amount').val('');
		$('#rate').val('');
		$('#term').val('');
		$('#emi').val('');
		document.getElementById('amount').style.borderColor = "";
		document.getElementById('rate').style.borderColor = "";
		document.getElementById('term').style.borderColor = "";

	}

</script>
@stop


