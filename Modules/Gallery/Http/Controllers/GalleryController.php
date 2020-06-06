<?php

namespace Modules\Gallery\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Session;
use Illuminate\Support\Facades\Input;
use File;
use Modules\Gallery\Entities\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
   public function getList()
   {
      $gallery = Gallery::orderBy('created_at', 'DESC')->get();
      return view('gallery::list')->with('gallery', $gallery);
      
   }

   public function getCreate()
   {
      return view('gallery::create');
   }

   public function postUpload(Request $request)
   {
        
        $file = Input::file('file');
        
        $destinationPath = 'public/images/gallery_photos';
                
        $filename =  uniqid() .  $file->getClientOriginalName();
        
        Input::file('file')->move($destinationPath, $filename);

        $gallery = new Gallery;
        $gallery->file = $filename;
        $gallery->save();
        
     
       /*     
        
        $name = $request->file->getClientOriginalName();
        $ext = $request->file->getClientOriginalExtension();
        $request->file->move(public_path().'/images/gallery_photos',$name,$ext);

        $gallery = new Gallery;
        $gallery->photo = $filename;
        $gallery->save();*/

   }

   public function getDeletePhotos($id)
   {
        $gallery = Gallery::find($id);

        $image_path = public_path()."/images/gallery_photos/{$gallery->file}";
        
        if(File::exists($image_path)) {
            File::delete($image_path);
        }


        $gallery->delete();
        Session::flash('success-msg', 'Photo Deleted successfully');
        return redirect()->back();

   }
}
