<?php

namespace Modules\Services\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Services\Entities\Services;
use Session;
use Illuminate\Support\Facades\Input;
use File;


class ServicesController extends Controller
{
   
    public function getCreate()
    {
        return view('services::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function getList()
    {
        $service = Services::orderBy('created_at', 'DESC')->paginate(4);
        return view('services::list')->with('services', $service);
    }

    public function postCreate(\Modules\Services\Http\Requests\ServicesRequest $request)
    {

        $service = new Services;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->status = $request->status;
        $service->class = $request->class;    
       
        if($request->hasFile('photo')) 
        {
            $name = uniqid() . $request->photo->getClientOriginalName();
            $ext = $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path().'/images/services_photos', $name,$ext);
            $service->photo = $name;
        }

        $service->save();
        Session::flash('success-msg', 'Created Successfully');
        return redirect()->route('list-services');
    }

    public function getEditView($id)
    {
        $services = Services::find($id);
        return view('services::edit')->with('services', $services);
    }

    public function postEdit(\Modules\Services\Http\Requests\ServicesRequest $request, $id)
    {   
        $service = Services::find($id);
        $service->title = $request->title;
        $service->description = $request->description;
        $service->status = $request->status;
        $service->class = $request->class;

        if($request->hasFile('photo'))
        {
           $image_path = public_path()."/images/services_photos/{$service->photo}";     
           
            if(File::exists($image_path)) {
                File::delete($image_path);
                  } 
            $name = uniqid(). $request->photo->getClientOriginalName();
            $file = $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('images/services_photos'), $name, $file);
            $service->photo = $name;

        }        

        $service->save();
        Session::flash('success-msg', 'Service updated successfully');
        return redirect()->route('list-services');
    }
      public function destroy(Request $request, $id)
    {
        $service = Services::find($id);

        $image_path = public_path()."/images/services_photos/{$service->photo}";
        
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $service->delete();
        Session::flash('success-msg', 'Service Deleted successfully');
        return redirect()->back();
    }

    public function getDeleteServiceImage(Request $request, $id)
    {
        $service = Services::find($id);

        $image_path = public_path()."/images/services_photos/{$service->photo}";
        
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        /*$del_photo_name = Services::where('photo', 'like' , $service->photo)->first();*/
        $service->update(['photo' => null]);
        Session::flash('success-msg', 'Photo Deleted successfully');
        return redirect()->back();
    }
}
