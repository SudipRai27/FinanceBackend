<?php

namespace Modules\Configurations\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use File;
use Session;
use Illuminate\Support\Facades\Input;
use Modules\Configurations\Entities\GeneralSettings;

class ConfigurationsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function getUpdateGeneralSettings()
    {
        $general_settings = GeneralSettings::first();
        return view('configurations::general-settings')->with('general_settings', $general_settings);
    }

    public function postUpdateGeneralSettings(Request $request)
    {
        $general_settings = GeneralSettings::first();

        if(!count($general_settings))
        { 
            $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required', 
            'address' => 'required', 
            'working_hours' => 'required',
            'logo' => 'required|mimes:jpeg,jpg,png' 
            ]);

            $general_settings = new GeneralSettings;
            $general_settings->name = $request->name;
            $general_settings->email = $request->email;
            $general_settings->phone = $request->phone;
            $general_settings->address = $request->address;
            $general_settings->working_hours = $request->working_hours;
            
            if($request->hasFile('logo')) 
            {
                $name = uniqid() . $request->logo->getClientOriginalName();
                $ext = $request->logo->getClientOriginalExtension();
                $request->logo->move(public_path().'/images/logo', $name,$ext);
                $general_settings->logo = $name;
            }

            $general_settings->save();
            Session::flash('success-msg', 'General Settings Updated Successfully');
            return redirect()->back();
        } 
        else
        {
            $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required', 
            'address' => 'required', 
            'working_hours' => 'required'
            
            ]);
            $general_settings_id = $request->general_settings_id;
            $general_settings = GeneralSettings::where('id', $general_settings_id)->first();
            $general_settings->name = $request->name;
            $general_settings->email = $request->email;
            $general_settings->phone = $request->phone;
            $general_settings->address = $request->address;
            $general_settings->working_hours = $request->working_hours;

            if($request->hasFile('logo'))
            {
                $logo_path = public_path()."/images/logo/{$general_settings->logo}";     
               
                if(File::exists($logo_path)) {
                    File::delete($logo_path);
                      } 
                $name = uniqid() . $request->logo->getClientOriginalName();
                $file = $request->logo->getClientOriginalExtension();
                $request->logo->move(public_path('images/logo'), $name, $file);
                $general_settings->logo = $name;

            }   
            
            $general_settings->save();
            Session::flash('success-msg', 'General Settings Updated Successfully');
            return redirect()->back();  
            
        }
    }


   public function getListYoutubeVideos()
   {
        $youtube_config = File::get(base_path().'/Modules/Configurations/youtube-config.json');
        $youtube_config = json_decode($youtube_config);

        if($youtube_config)
        {
            $channelID = $youtube_config->channelID;
            $maxResults = $youtube_config->maxResults;
            $video_id = $youtube_config->video_id;
        }
        else
        {
            $channelID = '';
            $maxResults = '';
            $video_id = '';
        }
        
        return view('configurations::list-youtube-video')
                            ->with('channelID', $channelID)
                            ->with('maxResults', $maxResults)
                            ->with('video_id', $video_id);   
   }

   public function postUpdateYoutubeConfigSettings(Request $request)
   {
        $input = request()->all();
        File::put(base_path().'/Modules/Configurations/youtube-config.json', json_encode($input, JSON_PRETTY_PRINT));
        Session::flash('success-msg', 'Youtube Setting Updated Successfully');
        return redirect()->back();
   }

   public function getYoutubeVideoFrontend()
   {
        $youtube_config = File::get(base_path().'/Modules/Configurations/youtube-config.json');
        $youtube_config = json_decode($youtube_config);
        if($youtube_config)
        {
            $video_id = $youtube_config->video_id;
        }
        else
        {
            $video_id = '';
        }
        
        return view('configurations::view-youtube-video-frontend')
                            ->with('video_id', $video_id);
   }

   public function getMapViewSettings()
   {    
        $map_config = File::get(base_path().'/Modules/Configurations/google-map-config.json');
        $map_config = json_decode($map_config);

        if($map_config)
        {
            $lat = $map_config->lat;
            $long = $map_config->long;
            $name = $map_config->name;
        }
        else
        {
            $lat = '';
            $long = '';
            $name = '';
        }
        return view('configurations::view-map-settings')
                            ->with('lat', $lat)
                            ->with('long', $long)
                            ->with('name', $name);
   }

   public function postUpdateMapConfigSettings(Request $request)
   {    
        $input = request()->all();
        File::put(base_path().'/Modules/Configurations/google-map-config.json', json_encode($input, JSON_PRETTY_PRINT));
        Session::flash('success-msg', 'Google Map Setting Updated Successfully');
        return redirect()->back();
   }


   public function getFacebookWidgetViewSettings()
   {    
        $facebook_config = File::get(base_path().'/Modules/Configurations/facebook-widget-config.json');
        $facebook_config = json_decode($facebook_config);
        
        if($facebook_config)
        {
            $facebook_url_username = $facebook_config->facebook_url_username;
            $type = $facebook_config->type;
         
        }
        else
        {
            $facebook_url_username = '';
            $type = '';
        }
        
        return view('configurations::facebook-widget-view-settings')
                                ->with('facebook_url_username', $facebook_url_username)
                                ->with('type', $type);
   }

   public function postUpdateFacebookConfigSettings(Request $request)
   {    
        $input = request()->all();
        File::put(base_path().'/Modules/Configurations/facebook-widget-config.json', json_encode($input, JSON_PRETTY_PRINT));
        Session::flash('success-msg', 'Facebook Widget Setting Updated Successfully');
        return redirect()->back();

   }
}
