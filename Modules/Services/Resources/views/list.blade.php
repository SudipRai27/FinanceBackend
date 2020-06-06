
@extends('backend.superadmin.main')
	
@section('content')
<h4><b>List Services</b></h4>
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
	          <th>Photo</th>
	          <th>Status</th>
	          <th>CSS class</th>
	          <th>Action</th>
	        </tr>
	        </thead>
	        <tbody>
	        @if(count($services))
	        <?php
	         $i =1;
	        ?>
	        @foreach($services as $index => $d)
	        <tr>
	          <td>{{ $i++}}</td>
	          <td>{{ $d->title }}</td>
	          <td>{{ $d->description}}</td>
	          <td><img class="img-responsive" src="{{ URL::to('public/images/services_photos',$d->photo)}}" height="130px" width="120px" onerror="this.src= '{{ asset('public/images/no-photo.png')}}';"></td>
	          <td>{{ $d->status }}</td>
	          <td>{{ $d->class }}</td>
	          <td>
	          	<a href = "{{ route('edit-services',$d->id) }}"><button data-toggle="tooltip" title="" class="btn btn-success btn-flat" type="button" data-original-title="Edit"><i class="fa fa-fw fa-edit"></i></button></a>
				<a class="btn btn-danger btn-flat"  data-toggle="modal" data-target="#confirmDelete{{$d->id}}" data-title="Delete Services" data-message="Are you sure you want to delete ?">
     			<i class="glyphicon glyphicon-trash"></i></a>
     			@include('Services.Resources.views.modal.modal') 
	          </td>
	        </tr>
	        @endforeach
	        @else
	        <div style="color:red; text-align:center">No data found</div>
	        @endif
	        </tbody>
	       </table>
	       <div align="center">
	       	{{ $services->render()}}
	       </div>
	    </div>
	  </div>
  </div>
</div>  
@stop