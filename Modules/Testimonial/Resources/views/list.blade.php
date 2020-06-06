@extends('backend.superadmin.main')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.3.1/lity.css">
@stop 
@section('content')
<h4><b>List Testimnoial</b></h4>
 <div class="row">
	<div class="col-xs-12">
	 <div class="box"> 
	   <div class="box-body">
	      <table id="example2" class="table table-bordered table-hover">
	        <thead>
	        <tr>
	          <th>SN</th>
	          <th>Name</th>
	          <th>Message</th>
	          <th>Publishable</th>
	          <th>Photo</th>
	          
	        </tr>
	        </thead>
	        <tbody>
	        @if(count($testimonial))
	        <?php
	         $i =1;
	        ?>
	        @foreach($testimonial as $index => $d)
	        <tr>
	          <td>{{ $i++}}</td>
	          <td>{{ $d->name }}</td>
	          <td>{!! substr($d->message , 0 ,500) !!} {!! strlen($d->message )>500? "..." : "" !!}</td>
	          <td>{{ $d->publish}}</td>
	          <td><img class="img-responsive " src="{{ URL::to('public/images/testimonial_photos',$d->photo)}}" height="130px" width="120px"  onerror="this.src= '{{ asset('public/images/no-photo.png')}}';"></td>
	          <td>{{ $d->status}}</td>
	          <td>
	          	<a href = "{{ route('view-testimonial',$d->id) }}" data-lity><button data-toggle="tooltip" title="" class="btn btn-primary" type="button" data-original-title="View"><i class="fa fa-fw fa-file"></i></button></a><br><br>
	          	<a href = "{{ route('edit-testimonial',$d->id) }}"><button data-toggle="tooltip" title="" class="btn btn-success btn-flat" type="button" data-original-title="Edit"><i class="fa fa-fw fa-edit"></i></button></a><br><br>
				<a class="btn btn-danger btn-flat"  data-toggle="modal" data-target="#confirmDelete{{$d->id}}" data-title="Delete Slider" data-message="Are you sure you want to delete ?">
     			<i class="glyphicon glyphicon-trash"></i></a>
     			@include('Testimonial.Resources.views.modal.modal') 
	          </td>
	        </tr>
	        @endforeach
	        @else
	        <div style="color:red; text-align:center;">No data found</div>
	        @endif
	        </tbody>
	       </table>
	       {{ $testimonial->render() }}
	    </div>
	  </div>
  </div>
</div>  
@stop
@section('custom-js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.3.1/lity.min.js"></script>
@stop