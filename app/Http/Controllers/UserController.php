<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Reponse;

class UserController extends Controller{

    public function info($id){
        return view('user.info', ['id' => $id]);
    }
}
