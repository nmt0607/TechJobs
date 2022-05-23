<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Reponse;

class ChatController extends Controller{

    public function index(){
        return view('chat.index');
    }
}
