<?php

namespace App\Http\Controllers\Admin\Config;
use App\Http\Controllers\Controller;
use App\Models\MasterData;
use DB;
use Session;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function index()
    {
        return view('admin.config.master.index');
    }
}
