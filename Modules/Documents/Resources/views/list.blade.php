@extends('backend.superadmin.main')
  
@section('content')
<h4><b>List Files</b></h4>
 <div class="row">
  <div class="col-xs-12">
    <div class="box"> 
     <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>SN</th>
            <th>Title / Short Description</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          @if(count($documents))
          <?php
           $i =1;
          ?>
          @foreach($documents as $index => $d)
          <tr>
            <td>{{ $i++}}</td>
            <td>{{ $d->description }}</td>
            
            <td>
              <a href = "{{ route('download-document-file',$d->id) }}"><button data-toggle="tooltip" title="" class="btn btn-success btn-flat" type="button" data-original-title="Download"><i class="fa fa-fw fa-download"></i></button></a>
        <a class="btn btn-danger btn-flat"  data-toggle="modal" data-target="#confirmDelete{{$d->id}}" data-title="Delete Document" data-message="Are you sure you want to delete ?">
          <i class="glyphicon glyphicon-trash"></i></a>
          @include('Documents.Resources.views.modal.modal') 
            </td>
          </tr>
          @endforeach
          @else
          <div style="color:red; text-align:center">No data found</div>
          @endif
          </tbody>
         </table>
         <div align="center">
          {{ $documents->render()}}
         </div>
      </div>
    </div>
  </div>
</div>  
@stop