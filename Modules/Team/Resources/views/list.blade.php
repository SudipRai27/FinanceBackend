@extends('backend.superadmin.main')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.3.1/lity.css">
@stop 
@section('content')
<h4><b>Team Members</b></h4>
<div class="row">
  <div class="col-xs-12">
    <div class="box"> 
      <div class="box-body">  
        <div class="row">
          <div class="col-md-12">       
              @foreach($team->chunk(3) as $d)
                @foreach($d as $p)
                  <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                      <img src="{{ URL::to('public/images/team_photos',$p->photo)}}" alt="..." class ="img-responsive" height="150px" width="150px" onerror="this.src= '{{ asset('public/images/no-photo.png')}}';">
                        <div class="caption">
                        <h5><b> Name: {{ $p->name }} </b> </h3>
                        <p>Designation: {{ $p->designation }}</p>
                        <p>Frontend Order: {{ $p->order_index }}</p>
                        <a href = "{{ route('view-team', $p->id) }}" data-lity><button data-toggle="tooltip" title="" class="btn btn-primary btn-flat" type="button" data-original-title="View"> View  <i class="fa fa-fw fa-file"></i></button>  </a>
                        <a href = "{{ route('edit-team', $p->id )}}"><button data-toggle="tooltip" title="" class="btn btn-success btn-flat" type="button" data-original-title="Edit"> Edit <i class="fa fa-fw fa-edit"></i></button></a>
                        <a href = "{{ route('delete-team', $p->id) }}"><button data-toggle="tooltip" title="" class="btn btn-danger btn-flat" type="button" data-original-title="Delete"> Delete <i class="fa fa-fw fa-trash"></i></button></a>
                        </div>
                    </div>
                  </div>
                @endforeach 
               @endforeach 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  
@stop
@section('custom-js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.3.1/lity.min.js"></script>
@stop