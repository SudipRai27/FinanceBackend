<?php

namespace Modules\Forex\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Forex\Entities\Forex;
use Session;
use DB;

class ForexController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
   public function getCreateForex()
   {
        return view('forex::create');
   }

   public function getListForex()
   {

        $forex = Forex::orderBy('created_at', 'DESC')->paginate(6);
        return view('forex::list')->with('forex', $forex);
    }

   public function postCreateForex(\Modules\Forex\Http\Requests\ForexRequest $request)
   {
        $forex = request()->all();

        DB::beginTransaction();
        try 
        {           
            $insert_data = [];

            //keeping each set of asssociative inputs in its new array
            $i=0;
            foreach($forex['currency'] as $index => $key) {   
                $insert_data[$i]['currency'] = $key;       
                $i++;
            }
            

            $i = 0;
            foreach($forex['unit'] as $key) {
                $insert_data[$i]['unit'] = $key;
                $i++;
            }

            $i = 0;
            foreach($forex['buying'] as $key) {
                $insert_data[$i]['buying'] = $key;
                $i++;
            }

            $i = 0;
            foreach($forex['selling'] as $key) {
                $insert_data[$i]['selling'] = $key;
                $i++;
            }

            //inserting new array
            foreach ($insert_data as $key) {
                Forex::create($key);
            }  

            
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with('error-msg',$e->getMessage());
        }

        DB::commit();

        Session::flash('success-msg', 'Created Successfully');
        return redirect()->route('list-forex');
   }


   public function getEditForex($id)
   {    
        $forex = Forex::find($id);

        return view('forex::edit')->with('forex', $forex);
   }

   public function postEditForex(\Modules\Forex\Http\Requests\ForexRequest $request, $id)
   {    
        try
        {
            $forex = Forex::find($id);
            $forex->currency = $request->currency;
            $forex->unit = $request->unit;
            $forex->selling = $request->selling;
            $forex->buying = $request->buying;
            $forex->save();
            Session::flash('success-msg', 'Updated Successfully');
            return redirect()->route('list-forex');
        }
        catch(\Exception $e)
        {      
            return redirect()->back()->with('error-msg', $e->getMessage());
        }

   }

   public function postDeleteForex($id)
   {
        $forex = Forex::find($id);
        $forex->delete();
        Session::flash('success-msg', 'Forex Deleted Successfully');
        return redirect()->route('list-forex');
   }


}
