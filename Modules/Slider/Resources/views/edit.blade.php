@extends('backend.superadmin.main')
	
@section('content')
<h4><b>Edit Slider</b></h4>
<div class="row">
 <div class="col-xs-12">
  <div class="box"> 
	<div class="box-body">
	<form action="{{ route('slider-edit-post', $slider->id) }}" method="POST" enctype="multipart/form-data">
	 <div class="box-body">
	   <div class="form-group">
		Title: <input type="text" name="title" value = "{{ $slider->title}}" class="form-control">
		<div id="msg" style="color:red;">{{ $errors->first('title') }}</div>
	   </div>
	   <div class="form-group">
		Order: <input type="text" name="order_index" value = "{{ $slider->order_index}}" class="form-control">
		<div id="msg" style="color:red;">{{ $errors->first('order_index') }}</div>
	   </div>
	   <div class="form-group">
		Description: <textarea name="description" class="form-control" rows="8" cols="60">{{ $slider->description}} </textarea>
		<div id="msg" style="color:red;">{{ $errors->first('description') }}</div>
	   </div>  
	   <div class="form-group">
	    Status: <br>
	   	<select class="form-control" name = "status">
	   		<option value="active" @if($slider->status == 'active') selected @endif>Active</option>
	   		<option value="inactive" @if($slider->status == 'inactive') selected @endif>Inactive</option>
	   	</select>
	   </div>
	   Photo:
		<input type="file" name="photo" class="form-control"><br>
		<img class="img-responsive " src="{{ URL::to('public/images/slider_photos',$slider->photo)}}" height="130px" width="120px" onerror="this.src= '{{ asset('public/images/no-photo.png')}}';">
		<div id="msg" style="color:red;">{{ $errors->first('photo') }}</div>	
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