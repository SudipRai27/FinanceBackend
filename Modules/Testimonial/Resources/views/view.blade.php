@extends('backend.superadmin.submain')

@section('content')
<h4><b>Testimonial Detail</b></h4>
<div class="row">
  <div class="col-xs-12">
    <div class="box"> 
      <div class="box-body">  
        <div class="row">
          <div class="col-md-12">       
            <p align="center"><img  src="{{ URL::to('public/images/testimonial_photos',$testimonial->photo)}}" onerror="this.src= '{{ asset('public/images/no-photo.png')}}';" height="150px" width="50%"></p>
                        <div class="caption">
                        <h5><b> Name: {{ $testimonial->name }} </b> </h3>
                        <b><p>{!! $testimonial->message !!}</p>
                        </b>
                        
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  
@stop
