
@extends('backend.superadmin.main')
	
@section('content')
<h4><b>List Sliders</b></h4>
 <div class="row">
	<div class="col-xs-12">
	 <div class="box"> 
	   <div class="box-body">
	      <table id="example2" class="table table-bordered table-hover">
	        <thead>
	        <tr>
	          <th>SN</th>
	          <th>Title</th>
	          <th>Description</th>
	          <th>Order</th>
	          <th>Photo</th>
	          <th>Status</th>
	          <th>Action</th>
	        </tr>
	        </thead>
	        <tbody>
	        @if(count($slider))
	        <?php
	         $i =1;
	        ?>
	        @foreach($slider as $index => $d)
	        <tr>
	          <td>{{ $i++}}</td>
	          <td>{{ $d->title }}</td>
	          <td>{{ $d->description}}</td>
	          <td>{{ $d->order_index}}</td>
	          <td><img class="img-responsive " src="{{ URL::to('public/images/slider_photos',$d->photo)}}" height="130px" width="120px" onerror="this.src= '{{ asset('public/images/no-photo.png')}}';"></td>
	          <td>{{ $d->status}}</td>
	          <td>
	          	<a href = "{{ route('edit-slider',$d->id) }}"><button data-toggle="tooltip" title="" class="btn btn-success btn-flat" type="button" data-original-title="Edit"><i class="fa fa-fw fa-edit"></i></button></a>
				<a class="btn btn-danger btn-flat"  data-toggle="modal" data-target="#confirmDelete{{$d->id}}" data-title="Delete Slider" data-message="Are you sure you want to delete ?">
     			<i class="glyphicon glyphicon-trash"></i></a>
     			@include('Slider.Resources.views.modal.modal') 
	          </td>
	        </tr>
	        @endforeach
	        @else
	        <div style="color:red; text-align:center">No data found</div>
	        @endif
	        </tbody>
	       </table>
	       {{ $slider->render() }}
	    </div>
	  </div>
  </div>
</div>  
@stop