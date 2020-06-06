@extends('backend.superadmin.main')
	
@section('content')
<h4><b>Create Slider</b></h4>
<div class="row">
 <div class="col-xs-12">
  <div class="box"> 
	<div class="box-body">
	<form action="{{ route('slider-create-post') }}" method="POST" enctype="multipart/form-data">
	 <div class="box-body">
	   <div class="form-group">
		Title: <input type="text" name="title" class="form-control" value="{{ Input::old('title')}}">
		<div id="msg" style="color:red;">{{ $errors->first('title') }}</div>
	   </div>
	   <div class="form-group">
		Order: <input type="text" name="order_index" class="form-control" value="{{ Input::old('order_index')}}">
		<div id="msg" style="color:red;">{{ $errors->first('order_index') }}</div>
	   </div>
	   <div class="form-group">
		Description: <textarea name="description" class="form-control" rows="8" cols="60">{{ Input::old('description')}} </textarea>
		<div id="msg" style="color:red;">{{ $errors->first('description') }}</div>
	   </div>  
	   Photo:
		<input type="file" name="photo" class="form-control">
		<div id="msg" style="color:red;">{{ $errors->first('photo') }}</div>	
	   <div class="box-footer">
		<input type="submit" name="Submit" value="Create" class="btn btn-primary">
	   </div>
	   <input type="hidden" name="status" value="active">
		{{ csrf_field() }}
	</form>
   </div>
  </div>
 </div>
</div>
@stop