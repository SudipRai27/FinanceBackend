@extends('backend.superadmin.main')
@section('content')
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Facebook Page Widget Settings</button>
<!-- Modal -->
<h4>Current Facebook URL Username:<b>{{$facebook_url_username}}</b></h4>
<h4>Type To Display: <b>{{$type}}</b></h4>
<br>
<h4><b>Current Facebook Public Page Widget</b></h4>
<div class="row">
	<div class="col-xs-12">
	  <div class="box"> 
	    <div class="box-body">
		    <div class="container">
			    <div id="myModal" class="modal fade" role="dialog">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <form action="{{ route('update-facebook-widget-config-settings') }}" method="POST">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Facebook Public Page Widget Settings</h4>
				      </div>	      
				      <div class="modal-body">
				      
				      Facebook URL Username (Only Enter FB Public Page but not personal page) : <input type="text" class="form-control" name="facebook_url_username" value="{{ $facebook_url_username }}"><br>
				      Type: 
				      <select name="type" class="form-control">
				      	<option value="timeline" @if($type=="timeline") selected @endif>Timeline</option>
				      	<option value="events" @if($type=="events") selected @endif>Events</option>
				      	<option value="messages" @if($type=="messages") selected @endif>Messages</option>
				      </select>
				      
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
		    </div>

		    <div class="row">
		    <div class = "col-sm-3">
				<!-- <div id="fb-root"></div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=1668256066838090&autoLogAppEvents=1';
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>

				<div class="fb-page" data-href="https://www.facebook.com/{{$facebook_url_username}}/" data-tabs="{{$type}}" data-width="1500" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/SuDip-Yacha-rae-311337119015839/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/SuDip-Yacha-rae-311337119015839/">SuDip Yacha rae</a></blockquote></div> -->

		    </div>
		    <div class="col-sm-8">
		    	<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F{{$facebook_url_username}}%2F&tabs={{$type}}&width=340&height=450&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="450" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
		    </div>
		    <div class="col-sm-1">
		    	
		    </div>
	    </div>
	  </div>
    </div>
</div>  
@stop