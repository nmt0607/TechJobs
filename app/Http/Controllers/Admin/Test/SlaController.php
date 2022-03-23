<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Reponse;

class SlaController extends Controller{

    public function priority(Request $request){
        return view('admin.sla.priority');
    }

    public function prioritySPDV(Request $request){
        return view('admin.sla.priority-spdv');
    }

    public function priorityPLYC(Request $request){
        return view('admin.sla.priority-plyc');
    }
}
