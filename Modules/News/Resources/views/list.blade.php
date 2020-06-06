@extends('backend.superadmin.main')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.3.1/lity.css">
@stop 
@section('content')
<h4><b>List News</b></h4>
 <div class="row">
	<div class="col-xs-12">
	 <div class="box"> 
	   <div class="box-body">
	      <table id="example2" class="table table-bordered table-hover">
	        <thead>
	        <tr>
	          <th>SN</th>
	          <th>Title</th>
	          <th>Content</th>
	          <th>Publishable</th>
	          <th>Photo</th>
	          
	        </tr>
	        </thead>
	        <tbody>
	        @if(count($news))
	        <?php
	         $i =1;
	        ?>
	        @foreach($news as $index => $d)
	        <tr>
	          <td>{{ $i++}}</td>
	          <td>{{ $d->title }}</td>
	          <td>{!! substr($d->content , 0 ,500) !!} {{ strlen($d->content )>500? "..." : "" }}</td>
	          <td>{{ $d->publish}}</td>
	          <td><img class="img-responsive " src="{{ URL::to('public/images/news_photos',$d->photo)}}" height="150px" width="150px"  onerror="this.src= '{{ asset('public/images/no-photo.png')}}';"></td>
	          <td>{{ $d->status}}</td>
	          <td>
	          	<a href = "{{ route('view-news',$d->id) }}" data-lity><button data-toggle="tooltip" title="" class="btn btn-success btn-flat" type="button" data-original-title="View"><i class="fa fa-fw fa-file"></i></button></a><br><br>
	          	<a href = "{{ route('edit-news',$d->id) }}"><button data-toggle="tooltip" title="" class="btn btn-success btn-flat" type="button" data-original-title="Edit"><i class="fa fa-fw fa-edit"></i></button></a><br><br>
				<a class="btn btn-danger btn-flat"  data-toggle="modal" data-target="#confirmDelete{{$d->id}}" data-title="Delete Slider" data-message="Are you sure you want to delete ?">
     			<i class="glyphicon glyphicon-trash"></i></a>
     			@include('News.Resources.views.modal.modal') 
	          </td>
	        </tr>
	        @endforeach
	        @else
	        <div style="color:red; text-align:center">No data found</div>
	        @endif
	        </tbody>
	       </table>
	       {{ $news->render() }}
	    </div>
	  </div>
  </div>
</div>  
@stop
@section('custom-js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.3.1/lity.min.js"></script>
@stop