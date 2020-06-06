@extends('backend.superadmin.main')

@section('content')
<h4><b>Forex Details</b></h4>
 <div class="row">
	<div class="col-xs-12">
	 <div class="box"> 
	   <div class="box-body">
	      <table id="example2" class="table table-bordered table-hover">
	        <thead>
	        <tr>
	          <th>SN</th>
	          <th>Currency</th>
	          <th>Unit</th>
	          <th>Buying</th>
	          <th>Selling</th>
	          <th>Action</th>
	        </tr>
	        </thead>
	        <tbody>
	        @if(count($forex))
	        <?php
	         $i =1;
	        ?>
	        @foreach($forex as $index => $d)
	        <tr>
	          <td>{{ $i++}}</td>
	          <td>{{ $d->currency }}</td>
	          <td>{{ $d->unit}}</td>
	          <td>{{ $d->buying}}</td>
	          <td>{{ $d->selling}}</td>
	          
	          <td>
	          	<a href = "{{ route('edit-forex',$d->id) }}" data-lity><button data-toggle="tooltip" title="" class="btn btn-success btn-flat" type="button" data-original-title="Edit"><i class="fa fa-fw fa-edit"></i></button></a>
				<a class="btn btn-danger btn-flat"  data-toggle="modal" data-target="#confirmDelete{{$d->id}}" data-title="Delete Slider" data-message="Are you sure you want to delete ?">
     			<i class="glyphicon glyphicon-trash"></i></a>
     			@include('Forex.Resources.views.modal.modal') 
	          </td>
	        </tr>
	        @endforeach
	        @else
	        <div style="color:red; text-align:center">No data found</div>
	        @endif
	        </tbody>
	       </table>
	       {{ $forex->render() }}
	    </div>
	  </div>
  </div>
</div>  
@stop
