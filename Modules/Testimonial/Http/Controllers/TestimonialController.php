<?php

namespace Modules\Testimonial\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Session;
use Illuminate\Support\Facades\Input;
use File;
use Modules\Testimonial\Entities\Testimonial;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
   public function getListTestimonial()
   {
        $testimonial = Testimonial::orderBy('id', 'DESC')->paginate(4);
        return view('testimonial::list')->with('testimonial', $testimonial);
   }

   public function getViewTestimonial($id)
   {
        $testimonial = Testimonial::find($id);
        return view('testimonial::view')->with('testimonial', $testimonial);
   }


   public function getCreate()
   {
        return view('testimonial::create');
   }

   public function postCreateTestimonial(Request $request)
   {    
        $request->validate([
            'name' => 'required',
            'message' => 'required',
            'publish' => 'required'
        ]);

        $testimonial = new Testimonial;
        $testimonial->name = $request->name;
        $testimonial->message = $request->message;
        $testimonial->publish = $request->publish;
        
       
        if($request->hasFile('photo')) 
        {
            $name = uniqid() . $request->photo->getClientOriginalName();
            $ext = $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path().'/images/testimonial_photos', $name,$ext);
            $testimonial->photo = $name;
        }

        $testimonial->save();
        Session::flash('success-msg', 'Testimonial Created Successfully');
        return redirect()->route('list-testimonial');

   }

   public function getEditTestimonial($id)
   {
        $testimonial = Testimonial::find($id);
        return view('testimonial::edit')->with('testimonial', $testimonial);
   }

   public function postEditTestimonial(Request $request, $id)
   {    
        $request->validate([
            'name' => 'required',
            'message' => 'required',
            'publish' => 'required'
        ]);

        $testimonial = Testimonial::find($id);
        $testimonial->name = $request->name;
        $testimonial->message = $request->message;
        $testimonial->publish = $request->publish;

        if($request->hasFile('photo'))
        {
           $image_path = public_path()."/images/testimonial_photos/{$testimonial->photo}";     
           
            if(File::exists($image_path)) {
                File::delete($image_path);
                  } 
            $name = uniqid() . $request->photo->getClientOriginalName();
            $file = $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('images/testimonial_photos'),$name, $file);
            $testimonial->photo = $name;

        }     

        $testimonial->save();
        Session::flash('success-msg', 'Testimonial Updated Successfully'); 
        return redirect()->route('list-testimonial');


   }

   public function postDeleteTestimonial(Request $request, $id)
   {    
        $testimonial = Testimonial::find($id);
        
        $image_path = public_path()."/images/testimonial_photos/{$testimonial->photo}";
        
        if(File::exists($image_path)) {
            File::delete($image_path);
        }


        $testimonial->delete();
        Session::flash('success-msg', 'Testimonial Deleted successfully');
        return redirect()->back();

   }
}
