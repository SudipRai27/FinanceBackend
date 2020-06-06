@extends('backend.superadmin.main')
@section('content')
<h4><b>Create News</b></h4>
<div class="row">
 <div class="col-xs-12">
  <div class="box"> 
	<div class="box-body">
	<form action="{{ route('news-create-post') }}" method="POST" enctype="multipart/form-data">
	 <div class="box-body">
	   <div class="form-group">
		Title: <input type="text" name="title" class="form-control" value="{{ Input::old('title')}}">
		<div id="msg" style="color:red;">{{ $errors->first('title') }}</div>
	   </div>
	   <div class="form-group">
		Content:  <textarea id = "editor1" name= "content" class="form-control" rows = "7" cols = "140">{{ Input::old('content')}}</textarea>
		<div id="msg" style="color:red;">{{ $errors->first('content') }}</div>
	   </div>  
	   <div class="form-group">
	    Publish in Frontend:
	    <select class="form-control" name="publish">
	    	<option value="yes">Yes</option>
	    	<option value="no">No</option>
	    </select>
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