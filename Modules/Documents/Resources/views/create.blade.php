@extends('backend.superadmin.main')
	
@section('content')
<h4><b>Create File</b></h4>
<div class="row">
 <div class="col-xs-12">
  <div class="box"> 
	<div class="box-body">
	<form action="{{ route('documents-create-post') }}" method="POST" enctype="multipart/form-data">
	 <div class="box-body">
	   <div class="form-group">
		Title /Short Description: <input type="text" name="description" class="form-control" value = "{{ Input::old('description')}}">
		<div id="msg" style="color:red;">{{ $errors->first('description') }}</div>
	   </div>  
	   File:
		<input type="file" name="file" class="form-control">
		<div id="msg" style="color:red;">{{ $errors->first('file') }}</div>	
	   <div class="box-footer">
		<input type="submit" name="Submit" value="Upload" class="btn btn-primary">
	   </div>
	   <input type="hidden" name="status" value="active">
		{{ csrf_field() }}
	</form>
   </div>
  </div>
 </div>
</div>
@stop