<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use App\TreatmentLog;

class TreatmentLogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function insert(Request $requset)
    {
        
    }

    public function get($id)
    {
        
    }
}
