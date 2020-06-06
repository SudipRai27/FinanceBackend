@extends('backend.superadmin.submain')

@section('content')
<h4><b>Member Detail</b></h4>
<div class="row">
  <div class="col-xs-12">
    <div class="box"> 
      <div class="box-body">  
        <div class="row">
          <div class="col-md-12">       
            <p align="center"><img  src="{{ URL::to('public/images/team_photos',$team->photo)}}" onerror="this.src= '{{ asset('public/images/no-photo.png')}}';" height="150px" width="50%"></p>
                        <div class="caption">
                        <h5><b> Name: {{ $team->name }} </b> </h3>
                        <p><b>Designation: {{ $team->designation }}</p>
                        <p>Phone: {{ $team->phone }}</p>
                        <p>Email: {{ $team->email }}</p>
                        <p> {!! $team->description !!}</p>

                        <p>Order to Display: {{ $team->order_index }}</p></b>
                        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  
@stop
