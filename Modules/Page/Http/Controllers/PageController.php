<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use File;
use Session;
use Modules\Page\Entities\Page;
use Validator;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
   public function getPageSettings()
   {    
        $page_index = Page::all();
        $page_details = Page::first();
        return view('page::page-settings')->with('page_index', $page_index)
                                          ->with('page_details', $page_details);
   }



   public function postUpdatePageContent(Request $request)
   {
        
            $input = request()->all();
            $id = $request->page_details_id;
            $page = Page::find($id);
            $page->title = $input['title'];
            $page->description = $input['description'];

           
          

            $page->save();
            return response()->json(['success' => 'Successfully Uploaded']);

        

        
    }

   public function getDeletePagePhoto($id)
   {  
        $page = Page::find($id);

        $image_path = public_path()."/images/page_photos/{$page->photo}";
        
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        /*$del_photo_name = pages::where('photo', 'like' , $page->photo)->first();*/
        $page->update(['photo' => null]);
       
        return redirect()->back();  

   }

// AJAX FUNCTION 
   public function getAjaxDynamicPageForm(Request $request)
   {
        $page_index_id = $request->page_index_id;
        
        $page_details = Page::where('id', $page_index_id)->first();  
        
        return view('page::update-page-content-form')
                                  ->with('page_details', $page_details)
                                  ->with('page_index_id', $page_index_id);
   }
}
