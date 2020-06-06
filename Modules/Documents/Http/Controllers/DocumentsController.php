<?php

namespace Modules\Documents\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use File;
use Session;
use Illuminate\Support\Facades\Input;
use Modules\Documents\Entities\Documents;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
   public function getListDocuments()
   {
        $documents = Documents::orderBy('id', 'DESC')->paginate(6);
        return view('documents::list')->with('documents', $documents);
   }

   public function getCreateDocuments()
   {
        return view('documents::create');
   }

   public function postCreateDocuments(Request $request)
   {
        $request->validate([
            'file' => 'required', 
            'description' => 'required'
        ]);

        $document = new Documents;
        $document->description = $request->description;
        if($request->hasFile('file')) 
        {
            $name = uniqid() . $request->file->getClientOriginalName();
            $ext = $request->file->getClientOriginalExtension();
            $request->file->move(public_path().'/document_files', $name,$ext);
            $document->file = $name;
        }

        $document->save();
        Session::flash('success-msg', 'Document Created Successfully');
        return redirect()->route('list-documents');

   }

   public function downloadFilesDocuments($id)
   {
        $document = Documents::find($id);

        $file_path = public_path()."/document_files/{$document->file}";

        if(File::exists($file_path)) {

            return response()->download($file_path);    
             
        }
        else
        {
            Session::flash('error-msg','No File Found');
            return redirect()->back();
        }       
   }

   public function postDelete(Request $request, $id)
   {    
        $documents = Documents::find($id);
        
        $file_path = public_path()."/document_files/{$documents->file}";
        
        if(File::exists($file_path)) {
            File::delete($file_path);
        }


        $documents->delete();
        Session::flash('success-msg', 'Document Deleted successfully');
        return redirect()->back();

   }
}
