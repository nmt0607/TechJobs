<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Reponse;
use App\Model\Customer;

class CustomerController extends Controller{

    public function index(Request $request){
        return view('admin.customer.index');
    }

}
