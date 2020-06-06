<?php

namespace Modules\News\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\News\Entities\News;
use Session;
use Illuminate\Support\Facades\Input;
use File;
use Illuminate\Support\Facades\Auth;



class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

/*    public function __contsruct()
    {
        $this->middleware('customAuthCheck');
    }
*/
    public function getListNews()
    {

        $news = News::orderBy('created_at', 'DESC')->paginate(1);
        return view('news::list')->with('news', $news);
    }

    public function getViewNews($id)
    {
        $news = News::find($id);
        return view('news::view')->with('news', $news);
    }

    public function getCreateNews()
    {
        return view('news::create');
    }


    public function postCreateNews(\Modules\News\Http\Requests\NewsRequest $request)
    {

        $news = new News;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->publish = $request->publish;
        
       
        if($request->hasFile('photo')) 
        {
            $name = uniqid() . $request->photo->getClientOriginalName();
            $ext = $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path().'/images/news_photos', $name,$ext);
            $news->photo = $name;
        }

        $news->save();
        Session::flash('success-msg', 'News Created Successfully');
        return redirect()->route('list-news');
    }


    public function getEditNews($id)
    {
        $news = News::find($id);
        return view('news::edit')->with('news', $news);
    }


    public function postEditNews(\Modules\News\Http\Requests\NewsRequest $request, $id)
    {
        $news = News::find($id);
        $news->title = $request->title;
        $news->content = $request->content;
        $news->publish = $request->publish;

        if($request->hasFile('photo'))
        {
           $image_path = public_path()."/images/news_photos/{$news->photo}";     
           
            if(File::exists($image_path)) {
                File::delete($image_path);
                  } 
            $name = uniqid() . $request->photo->getClientOriginalName();
            $file = $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('images/news_photos'),$name, $file);
            $news->photo = $name;

        }     

        $news->save();
        Session::flash('success-msg', 'News Updated Successfully'); 
        return redirect()->route('list-news');

    }

    public function postDeleteNews(Request $request, $id)
    {
        $news = News::find($id);
        
        $image_path = public_path()."/images/news_photos/{$news->photo}";
        
        if(File::exists($image_path)) {
            File::delete($image_path);
        }


        $news->delete();
        Session::flash('success-msg', 'News Deleted successfully');
        return redirect()->back();
    }

}
