@extends('backend.superadmin.main')
@section('content')
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Map Settings</button>
<!-- Modal -->

<h4><b>Current Map</b></h4>
<div class="row">
	<div class="col-xs-12">
	  <div class="box"> 
	    <div class="box-body">
		    <div class="container">
			    <div id="myModal" class="modal fade" role="dialog">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <form action="{{ route('update-map-config-settings') }}" method="POST">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Map Settings</h4>
				      </div>	      
				      <div class="modal-body">
				      
				      Latitude: <input type="text" class="form-control" name="lat" value="{{ $lat}}"><br>
				      Longitude: <input type="text" name="long" class="form-control" value="{{ $long}}"><br>
				      Name To Display On Map<input type="text" name="name" class="form-control" value="{{$name}}">
				      </div>
				      <div class="modal-footer">
				      	<input type="submit" value="Update" class="btn btn-primary">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>
				      {{ csrf_field()}}
				      </form>
				    </div>
				  </div>
				</div>
			<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDi28CoOpUJ0a6WoimwYa5foXwgTDLLKDw'></script><div style='overflow:hidden;height:350px;width:100%;'><div id='gmap_canvas' style='height:350px;width:100%;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://www.embedmap.net/'>Google Map</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=88aadb10dbd24bf2a758c6b42f59d50dff1430a1'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:16,center:new google.maps.LatLng({{ $lat}},{{$long}}),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng({{$lat}}, {{ $long}})});infowindow = new google.maps.InfoWindow({content:'<strong>{{$name}}</strong><br>{{$lat}}<br> {{$long}}<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
		    </div>
	    </div>
	  </div>
    </div>
</div>  
@stop