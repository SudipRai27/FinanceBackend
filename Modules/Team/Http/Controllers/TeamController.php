<?php

namespace Modules\Team\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Session;
use File;
use Illuminate\Support\Facades\Input;
use Modules\Team\Entities\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getListTeam()
    {
        $team = Team::orderBy('order_index')->paginate(3);
        return view('team::list')->with('team', $team);
    }       

    public function getViewTeam($id)
    {
        $team = Team::find($id);
        return view('team::view')->with('team', $team);
    }

    public function getCreateTeam()
    {
        return view('team::create');
    }

    public function postCreateTeam(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'phone' => 'required', 
            'email' => 'required', 
            'order_index' => 'required|integer|unique:team,order_index', 
        ]);

        $team = new Team;
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->phone = $request->phone;
        $team->email = $request->email;
        $team->description = $request->description;
        $team->order_index = $request->order_index;
        
       
        if($request->hasFile('photo')) 
        {
            $name = uniqid() . $request->photo->getClientOriginalName();
            $ext = $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path().'/images/team_photos', $name,$ext);
            $team->photo = $name;
        }

        $team->save();
        Session::flash('success-msg', 'Member Created Successfully');
        return redirect()->route('list-team');

    }

    public function getEditTeam($id)
    {
        $team = Team::find($id);
        return view('team::edit')->with('team', $team);
    }

    public function postEditTeam(Request $request, $id)
    {   
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'phone' => 'required', 
            'email' => 'required', 
            'order_index' => 'required|integer', 
        ]);

        $team = Team::find($id);
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->phone = $request->phone;
        $team->email = $request->email;
        $team->description = $request->description;
        $team->order_index = $request->order_index;

        if($request->hasFile('photo'))
        {
           $image_path = public_path()."/images/team_photos/{$team->photo}";     
           
            if(File::exists($image_path)) {
                File::delete($image_path);
                  } 
            $name = uniqid() . $request->photo->getClientOriginalName();
            $file = $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('images/team_photos'), $name, $file);
            $team->photo = $name;

        }       

        $team->save();
        Session::flash('success-msg', 'Member Updated Successfully');
        return redirect()->route('list-team');
    }

    public function getDeleteTeam($id)
    {
        $team = Team::find($id);
        
        $image_path = public_path()."/images/team_photos/{$team->photo}";
        
        if(File::exists($image_path)) {
            File::delete($image_path);
        }


        $team->delete();
        Session::flash('success-msg', 'Member Deleted successfully');
        return redirect()->back();

    }
}

