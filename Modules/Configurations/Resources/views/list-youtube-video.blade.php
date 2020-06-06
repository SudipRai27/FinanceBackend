@extends('backend.superadmin.main')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.3.1/lity.css">
@stop 
@section('content')
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Youtube Channel Settings</button>

<button type="button" class="btn btn-primary btn-lg" onclick="openNewTab()">Go to Current Channel</button> 

<a href="{{ route('view-frontend-youtube-video') }}" data-lity> <button type="button" class="btn btn-success btn-lg">Fronted Youtube Video</button> </a>
<h4>Current Channel ID: <b>{{ $channelID }}</b></h4>
<h4>Current Video Id: <b>{{ $video_id }}</b></h4>
<br>
<h4><b>Current Youtube Videos</b></h4>
 <div class="row">
	<div class="col-xs-12">
	 <div class="box"> 
	   <div class="box-body">	   
	    <div class="container">
		  	<div class="modal fade" id="myModal" role="dialog">
			    <div class="modal-dialog">
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Youtube Channel Settings</h4>
			        </div>
			        <form action="{{ route('update-youtube-config-settings') }}" method="POST"> 
			        <div class="modal-body"> 
			          Channel ID: <input type="text" name="channelID" class="form-control" value="{{ $channelID}}" placeholder="Channel Id"><br>
			          No of Videos: <input type="text" id="maxResults" name="maxResults" class="form-control" placeholder="Max Results" value="{{ $maxResults}}"><br>
			          Video Id to show in frontend: <input type="text" name="video_id" class="form-control" placeholder="Video Id" value="{{ $video_id}}">
			        </div>
			        <div class="modal-footer">
			          <input type="submit" value="Update Settings" class="btn btn-primary">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
			        {{ csrf_field() }}
			        </form>
			      </div>
			    </div>
			</div>
		</div>

			<br>
	      	<?php
			//Get videos from channel by YouTube Data API
			stream_context_set_default([
				'ssl' => [
					 	'verify_peer' => false,
					 	'verify_peer_name' => false,
					]
				]);	
			$API_key    = 'AIzaSyDi28CoOpUJ0a6WoimwYa5foXwgTDLLKDw';
			
			try
			{	
				$videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults='.$maxResults.'&key='.$API_key.''));
			}
			catch(Exception $e)
			{

				return redirect()->route('list-youtube-videos')->with('error-msg', $e->getMessage());
			}

			/*echo '<pre>';
			print_r($videoList);
			die();*/
			foreach($videoList->items as $video)
			{
				$date = $video->snippet->publishedAt;
				echo 

				'<div class="container">
					<div class = "row">
					 	<div class = "col-sm-4">
					 	<iframe width="350px" height="250px" src="https://www.youtube.com/embed/'.$video->id->videoId.'"></iframe>
						</div>

						<div class = "col-sm-8">
						<h4>'. $video->snippet->title .'</h4>
						<p>'. $video->snippet->description.'</p>
						<p>' .date('M j, Y', strtotime($date)).'</p>
						</div>
					</div>				
				</div>';

			}
			?>
							
 
	    </div>
	  </div>
  </div>
</div>  
@stop
@section('custom-js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.3.1/lity.js"></script>
<script type="text/javascript">
	function openNewTab() {
    window.open("https://www.youtube.com/channel/{{ $channelID }}");
}
</script>
@stop
