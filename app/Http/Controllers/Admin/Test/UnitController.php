<?php

namespace app\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Reponse;
use App\Model\Unit;

class UnitController extends Controller{

    public function index(Request $request){
        return view('admin.unit.index');
    }

}
