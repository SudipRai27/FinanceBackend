<?php

namespace Modules\Slider\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Slider\Entities\Slider;
use Session;
use Illuminate\Support\Facades\Input;
use File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getCreate()
    {
        return view('slider::create');
    }

    public function getList()
    {
        $slider = Slider::orderBy('order_index', 'ASC')->paginate(4);
        return view('slider::list')->with('slider', $slider);
    }

    public function postCreate(\Modules\Slider\Http\Requests\SliderRequest $request)
    {

        $slider = new Slider;
        $slider->title = $request->title;
        $slider->order_index = $request->order_index;
        $slider->description = $request->description;
        $slider->status = $request->status;
       
        if($request->hasFile('photo')) 
        {
            $name = uniqid() . $request->photo->getClientOriginalName();
            $ext = $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path().'/images/slider_photos', $name,$ext);
            $slider->photo = $name;
        }

        $slider->save();
        Session::flash('success-msg', 'Created Successfully');
        return redirect()->route('list-slider');
    }

    public function getEditView($id)
    {
        $slider = Slider::find($id);
        return view('slider::edit')->with('slider', $slider);
    }

    public function postEdit(\Modules\Slider\Http\Requests\SliderRequest $request, $id)
    {   
        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->order_index = $request->order_index;
        $slider->description = $request->description;
        $slider->status = $request->status;

        if($request->hasFile('photo'))
        {
           $image_path = public_path()."/images/slider_photos/{$slider->photo}";     
           
            if(File::exists($image_path)) {
                File::delete($image_path);
                  } 
            $name = uniqid() . $request->photo->getClientOriginalName();
            $file = $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('images/slider_photos'), $name, $file);
            $slider->photo = $name;

        }        

        $slider->save();
        Session::flash('success-msg', 'Slider updated successfully');
        return redirect()->route('list-slider');
    }
    
    public function postDelete(Request $request, $id)
    {
        $slider = Slider::find($id);

        $image_path = public_path()."/images/slider_photos/{$slider->photo}";
        
        if(File::exists($image_path)) {
            File::delete($image_path);
        }


        $slider->delete();
        Session::flash('success-msg', 'Slider Deleted successfully');
        return redirect()->back();
    }
}
