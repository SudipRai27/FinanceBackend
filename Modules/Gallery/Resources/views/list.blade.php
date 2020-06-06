@extends('backend.superadmin.main')

@section('content')
<h4><b>Available Photos</b></h4>
<div class="row">
	<div class="col-xs-12">
	  <div class="box"> 
	    <div class="box-body">


			@foreach($gallery->chunk(3) as $photos)
			
			  @foreach($photos as $d)
				    <div class="col-sm-8 col-sm-4">
				        <br>
		        		<a href=""><img  src="{{ URL::to('public/images/gallery_photos',$d->file)}}" width="285px" height="200px"> </a> 
		        		<br><br>
		         		<a href = "{{ route('delete-photos', $d->id) }}" class="btn btn-danger btn-flat" data-title="Delete Photo" data-message="Are you sure you want to delete ?" >
		     			 Delete Photo -- <i class="glyphicon glyphicon-trash"></i> -- </a>
		     			
		        	</div>
		      @endforeach 
		    
		  @endforeach 
		  

	    </div>
	  </div>
    </div>
</div>  
@stop