<div id="page-dynamic-content">
<!-- <form action="{{ route('update-page-content', $page_details->id) }}" method="POST" enctype="multipart/form-data"> -->
	<div class="box-body">
	   <div class="form-group">
		Title: <input type="text" name="title" class="form-control" value="{{ $page_details->title}}" id="title">
		<div id="msg" style="color:red;">{{ $errors->first('title') }}</div>
	   </div>
	   <div class="form-group">
		Description:  <textarea id = "editor1" name= "description" class="form-control" rows = "7" cols = "140">{{ $page_details->description }}</textarea>
		<div id="msg" style="color:red;">{{ $errors->first('description') }}</div>
	   </div>     
	    <!-- Photo:
		<input type="file" name="photo" class="form-control">
		<br>
		@if($page_details->photo)
		<img class="img-responsive" src="{{ URL::to('public/images/page_photos',$page_details->photo)}}" height="100px" width="150px">
		<br>
		<a href="{{ route('delete-page-photo', $page_details->id) }}" class="btn btn-danger">Delete Current Photo</a>
		@endif -->
		<div id="msg" style="color:red;">{{ $errors->first('photo') }}</div>
	   <div class="box-footer">
		<input type="submit" name="Submit" value="Update" class="btn btn-primary" onclick="updateForm()">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="page_details_id" value="{{ $page_details->id }}" id="page_details_id">
	   </div>
	</div>
	{{ csrf_field() }}
<!-- </form> -->
</div>
<?php
$url =  url('/');
?>

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
</script>
<script type="text/javascript">
 
	function updateForm()
	{
		
		var title = $('#title').val();
		var description = CKEDITOR.instances["editor1"].getData();
		
		var page_details_id = $('#page_details_id').val();
		$.ajax({

			"url" : "{{ URL::route('update-page-content') }}", 
			"data" : {
				"title" : title,
				"description" : description,
				"page_details_id" : page_details_id,
				"_token" : $('input[name=_token]').val()

			},
			"method" : "POST"


		}).done(function(data){
			alert('Content Updated Successfully');

		});
		
		

	}
</script>
