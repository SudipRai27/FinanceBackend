@extends('backend.superadmin.main')
@section('content')
<h4><b>Update Forex</b></h4>
<div class="row">
 <div class="col-xs-12">
  <div class="box"> 
	<div class="box-body">

        <div class="col-xs-12">
            <div class="col-md-12" >
                <form action="{{ route('forex-edit-post', $forex->id) }}" method="POST">
                <div id="field">
                <div id="field0">
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="currency">Currency</label>  
				  <div class="col-md-5">
				  <input id="currency" name="currency" type="text" placeholder="" class="form-control input-md" required value="{{ $forex->currency }}">
				    <div id="msg" style="color:red;">{{ $errors->first('currency') }}</div>
				  </div>
				</div>
				<br><br><br>
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="unit">Unit</label>  
				  <div class="col-md-5">
				  <input id="unit" name="unit" type="text" placeholder="" class="form-control input-md" required value="{{ $forex->unit}}">
				    <div id="msg" style="color:red;">{{ $errors->first('unit') }}</div>
				  </div>
				</div>
				<br><br>
				       
				<div class="form-group">
				  <label class="col-md-4 control-label" for="selling">Selling</label>  
				  <div class="col-md-5">
				  <input id="selling" name="selling" type="text" placeholder="" class="form-control input-md" required value="{{ $forex->selling}}">
				    <div id="msg" style="color:red;">{{ $errors->first('selling') }}</div>
				  </div>
				</div>
				<br><br>

				<div class="form-group">
				  <label class="col-md-4 control-label" for="buying">Buying</label>
				  <div class="col-md-5">
				   <input id="buying" name="buying" type="text" placeholder="" class="form-control input-md" required value="{{ $forex->buying }}">
				    <div id="msg" style="color:red;">{{ $errors->first('buying') }}</div>
				  </div>
				</div>

				</div>
				</div>
				<!-- Button -->
				<br><br>
           		<div class="form-group">
				  <label class="col-md-4 control-label" for="submit"></label>
				  <div class="col-md-5">
				   <input type = "submit" value="Update" class="btn btn-primary">
				    
				  </div>
				</div>
            
            {{ csrf_field() }}
            </form>
        </div>
    </div>
	
	</div>
  </div>
 </div>
</div>

@stop


