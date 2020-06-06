@extends('backend.superadmin.main')
	
@section('content')
<h5><b>Change Details</b></h5>
<form action="{{ route('superadmin-edit-details', $user_details->id) }}" method="POST" enctype="multipart/form-data">
 <div class="box-body">
   <div class="form-group">
	Name: <input type="text" name="name" class="form-control" value="{{ $user_details->name}}">
	<div id="msg" style="color:red;">{{ $errors->first('name') }}</div>
   </div>
   <div class="form-group">
	Email: <input type="email" name="email" class="form-control" value="{{ $user_details->email}}">
	<div id="msg" style="color:red;">{{ $errors->first('email') }}</div>
   </div>
   <div class="form-group">
	Password: <input type="password" name="password" class="form-control">
	<div id="msg" style="color:red;">{{ $errors->first('password') }}</div>
   </div>
   <div class="form-group">
	Temporary Address: <input type="text" name="temporary_address" class="form-control" value="{{ $user_details->temporary_address}}">
	<div id="msg" style="color:red;">{{ $errors->first('temporary_address') }}</div>
   </div>
   <div class="form-group">	
	Permanent Address: <input type="text" name="permanent_address" class="form-control" value="{{ $user_details->permanent_address}}">
	<div id="msg" style="color:red;">{{ $errors->first('permanent_address') }}</div>
   </div>
   <div class="form-group">
	Contact: <input type="text" name="contact" class="form-control" value="{{ $user_details->contact}}">
	<div id="msg" style="color:red;">{{ $errors->first('contact') }}</div>
   </div>
  </div>
  <div class="form-group"> 
	<input type="file" name="photo" >
	<div id="msg" style="color:red;">{{ $errors->first('photo') }}</div>	
	<br>
	@if($user_details->photo)
	<img src="{{ URL::to('public/images/superadmin_photos/',$user_details->photo)}}" class="img-responsive" width="100" height="100">            
	@endif
	</div>
   <div class="box-footer">
	<input type="submit" name="Submit" value="Update" class="btn btn-primary">
   </div>
	{{ csrf_field() }}
</form>

@stop