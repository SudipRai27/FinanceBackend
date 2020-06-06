@extends('backend.superadmin.main')
@section('content')
<h4><b>Create Team Members</b></h4>
<div class="row">
 <div class="col-xs-12">
  <div class="box"> 
	<div class="box-body">
	<form action="{{ route('team-create-post') }}" method="POST" enctype="multipart/form-data">
	 <div class="box-body">
	   <div class="form-group">
		Name: <input type="text" name="name" class="form-control" value="{{ Input::old('name')}}">
		<div id="msg" style="color:red;">{{ $errors->first('name') }}</div>
	   </div>
	   	<div class="form-group">
		Designation: <input type="text" name="designation" class="form-control" value="{{ Input::old('designation')}}">
		<div id="msg" style="color:red;">{{ $errors->first('designation') }}</div>
	   </div>
	   <div class="form-group">
		Phone: <input type="text" name="phone" class="form-control" value="{{ Input::old('phone')}}">
		<div id="msg" style="color:red;">{{ $errors->first('phone') }}</div>
	   </div>
	   	<div class="form-group">
		Email: <input type="email" name="email" class="form-control" value="{{ Input::old('email')}}">
		<div id="msg" style="color:red;">{{ $errors->first('email') }}</div>
	   </div>
	   <div class="form-group">
		Description:  <textarea id = "editor1" name= "description" class="form-control" rows = "7" cols = "140">{{ Input::old('description')}}</textarea>
		<div id="msg" style="color:red;">{{ $errors->first('description') }}</div>
	   </div>  
	  	<div class="form-group">
		Order: <input type="text" name="order_index" class="form-control" value="{{ Input::old('order_index')}}">
		<div id="msg" style="color:red;">{{ $errors->first('order_index') }}</div>
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
<?php
$url =  url('/');
?>
@stop
@section('custom-js')
<script src="{{asset('public/sms/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript"></script>
	<script src="{{ asset('public/sms/text-editor/ckeditor/ckeditor.js') }}"></script>
	<script>
			$(document).ready(function()
			{
				var roxyFileman = "{{ $url}}/public/sms/text-editor/fileman/index.html?integration=ckeditor";
				$(function()
				{
					CKEDITOR.replace( "editor1",{filebrowserBrowseUrl:roxyFileman,
										filebrowserImageBrowseUrl:roxyFileman+"&type=image",
										removeDialogTabs: "link:upload;image:upload"});
				});
				
			});
	</script>;

@stop