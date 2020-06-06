@extends('backend.superadmin.main')
	
@section('content')
<h4><b>Edit Services</b></h4>
<div class="row">
 <div class="col-xs-12">
  <div class="box"> 
	<div class="box-body">
	<form action="{{ route('services-edit-post', $services->id) }}" method="POST" enctype="multipart/form-data">
	 <div class="box-body">
	   <div class="form-group">
		Title: <input type="text" name="title" value = "{{ $services->title}}" class="form-control">
		<div id="msg" style="color:red;">{{ $errors->first('title') }}</div>
	   </div>	   
	   <div class="form-group">
		Description: <textarea name="description" class="form-control" rows="8" cols="60">{{ $services->description}} </textarea>
		<div id="msg" style="color:red;">{{ $errors->first('description') }}</div>
	   </div>  
	   Photo:
		<input type="file" name="photo" class="form-control"><br>
		@if($services->photo)
		<img class="img-responsive " src="{{ URL::to('public/images/services_photos',$services->photo)}}" height="130px" width="120px"><br>
		<a href = "{{ route('delete-service-photo',$services->id) }}"><button data-toggle="tooltip" title="" class="btn btn-success btn-danger" type="button" data-original-title="Delete">Delete Current Photo - <i class="fa fa-fw fa-trash"></i></button></a>
				
		@endif

		<div id="msg" style="color:red;">{{ $errors->first('photo') }}</div>
		 <div class="form-group">
	    Status: <br>
	   	<select class="form-control" name = "status">
	   		<option value="active" @if($services->status == 'active') selected @endif>Active</option>
	   		<option value="inactive" @if($services->status == 'inactive') selected @endif>Inactive</option>
	   	</select>
	   </div>	
	    <div class="form-group">
		CSS class: <input type="text" name="class" value = "{{ $services->class}}" class="form-control">
		<div id="msg" style="color:red;">{{ $errors->first('class') }}</div>
	   </div>	  
	   <div class="box-footer">
		<input type="submit" name="Submit" value="Update" class="btn btn-primary">
	   </div>

	   
		{{ csrf_field() }}
	</form>
   </div>
  </div>
 </div>
</div>
@stop