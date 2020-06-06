@extends('backend.superadmin.main')
@section('content')
<h4><b>Create Forex</b></h4>
<div class="row">
 <div class="col-xs-12">
  <div class="box"> 
	<div class="box-body">

        <div class="col-xs-12">
            <div class="col-md-12" >
                <form action="{{ route('create-forex-post') }}" method="POST">
                <div id="field">
                <div id="field0">
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="currency">Currency</label>  
				  <div class="col-md-5">
				  <input id="currency" name="currency[]" type="text" placeholder="" class="form-control input-md" required>
				    
				  </div>
				</div>
				<br><br>
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="unit">Unit</label>  
				  <div class="col-md-5">
				  <input id="unit" name="unit[]" type="text" placeholder="" class="form-control input-md" required>
				    
				  </div>
				</div>
				<br><br>
				       <!-- File Button --> 
				<div class="form-group">
				  <label class="col-md-4 control-label" for="selling">Selling</label>  
				  <div class="col-md-5">
				  <input id="selling" name="selling[]" type="text" placeholder="" class="form-control input-md" required>
				    
				  </div>
				</div>
				<br><br>

				<div class="form-group">
				  <label class="col-md-4 control-label" for="buying">Buying</label>
				  <div class="col-md-5">
				   <input id="buying" name="buying[]" type="text" placeholder="" class="form-control input-md" required>
				    
				  </div>
				</div>

				</div>
				</div>
				<!-- Button -->
				<div class="form-group">
				  <div class="col-md-4">
				    <button id="add-more" name="add-more" class="btn btn-success">Add More</button>
				  </div>
				</div>
			<br><br>
              
            </div>
            
				<div class="form-group">
				  <label class="col-md-4 control-label" for="submit"></label>
				  <div class="col-md-5">
				   <input type = "submit" value="Submit" class="btn btn-primary">
				    
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

@yield('custom-js')
<script type="text/javascript">
	$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = ' <div id="field'+ next +'" name="field'+ next +'"><!-- Text input--><div class="form-group"> <label class="col-md-4 control-label" for="currency">Currency</label> <div class="col-md-5"> <input id="currency" name="currency[]" type="text" placeholder="" class="form-control input-md" required> </div></div><br><br> <!-- Text input--><div class="form-group"> <label class="col-md-4 control-label" for="unit">Unit</label> <div class="col-md-5"> <input id="unit" name="unit[]" type="text" placeholder="" class="form-control input-md" required></div></div><br><br><!-- Text input--><div class="form-group"> <label class="col-md-4 control-label" for="selling">Selling</label> <div class="col-md-5"> <input id="selling" name="selling[]" type="text" placeholder="" class="form-control input-md" required> </div></div><br><br><!-- Text input --> <div class="form-group"> <label class="col-md-4 control-label" for="buying">Buying</label> <div class="col-md-5">  <input id="buying" name="buying[]" type="text" placeholder="" class="form-control input-md" required></div></div></div>';
        var newInput = $(newIn);
        var removeBtn = ' <br><button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove</button></div></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });

});
</script>
@stop


