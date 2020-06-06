@extends('backend.superadmin.main')
	
@section('content')
@if(!count($general_settings))
<b><h4>Update General Settings </h4></b>
<form action="{{ route('update-general-settings-post') }}" method="POST" enctype="multipart/form-data">
 <div class="box-body">
   <div class="form-group">
	Company Name: <input type="text" name="name" class="form-control">
	<div id="msg" style="color:red;">{{ $errors->first('name') }}</div>
   </div>
   <div class="form-group">
	Email: <input type="email" name="email" class="form-control">
	<div id="msg" style="color:red;">{{ $errors->first('email') }}</div>
   </div>
   <div class="form-group">
	Contact No: <input type="text" name="phone" class="form-control">
	<div id="msg" style="color:red;">{{ $errors->first('phone') }}</div>
   </div>
   <div class="form-group">
	Address: <input type="text" name="address" class="form-control">
	<div id="msg" style="color:red;">{{ $errors->first('address') }}</div>
   </div>
   <div class="form-group">
	Working Hours: <input type="text" name="working_hours" class="form-control">
	<div id="msg" style="color:red;">{{ $errors->first('working_hours') }}</div>
   </div>
  
  <div class="form-group">
	Logo:<input type="file" name="logo" class="form-control">
	<div id="msg" style="color:red;">{{ $errors->first('logo') }}</div>	
  </div>
   <div class="box-footer">
	<input type="submit" name="Submit" value="submit" class="btn btn-primary">
   </div>
	{{ csrf_field() }}
</form>
@else
<b><h4>Update General Settings </h4></b>
<form action="{{ route('update-general-settings-post') }}" method="POST" enctype="multipart/form-data">
 <div class="box-body">
   <div class="form-group">
	Company Name: <input type="text" name="name" value = "{{$general_settings->name}}" class="form-control">
	<div id="msg" style="color:red;">{{ $errors->first('name') }}</div>
   </div>
   <div class="form-group">
	Email: <input type="email" name="email" value = "{{$general_settings->email}}" class="form-control">
	<div id="msg" style="color:red;">{{ $errors->first('email') }}</div>
   </div>
   <div class="form-group">
	Contact No: <input type="text" name="phone" value = "{{$general_settings->phone}}" class="form-control">
	<div id="msg" style="color:red;">{{ $errors->first('phone') }}</div>
   </div>
   <div class="form-group">
	Address: <input type="text" name="address" value = "{{$general_settings->address}}" class="form-control">
	<div id="msg" style="color:red;">{{ $errors->first('address') }}</div>
   </div>
   <div class="form-group">
	Working Hours: <input type="text" name="working_hours" value = "{{$general_settings->working_hours}}" class="form-control">
	<div id="msg" style="color:red;">{{ $errors->first('working_hours') }}</div>
   </div>
  <div class="form-group">
	Logo: <input type="file" name="logo" class="form-control"><br>
	Current Logo: <img class="img-responsive " src="{{ URL::to('public/images/logo',$general_settings->logo)}}" height="130px" width="120px" onerror="this.src= '{{ asset('public/images/no-photo.png')}}';">
  </div>
	<div id="msg" style="color:red;">{{ $errors->first('logo') }}</div>	
   <div class="box-footer">
   	<input type="hidden" name="general_settings_id" value="{{ $general_settings->id}}">
	<input type="submit" name="Submit" value="Update" class="btn btn-primary">
   </div>
	{{ csrf_field() }}
</form>
@endif
@stop