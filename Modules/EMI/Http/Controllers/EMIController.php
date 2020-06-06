<?php

namespace Modules\EMI\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class EMIController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getCalculateEMI()
    {
        return view('emi::calculate-emi');
    }
}
