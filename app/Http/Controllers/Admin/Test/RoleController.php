<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Reponse;
use App\Model\Role;

class RoleController extends Controller{

    public function index(Request $request){
        return view('admin.role.index');
    }

    public function create(){
        $mode = 'create';
        $id = null;
        return view('admin.role.detail', [
            'id' => $id,
            'mode' => $mode
        ]);
    }

    public function edit($id){
        $mode = 'update';
        return view('admin.role.detail', [
            'id' => $id,
            'mode' => $mode,
        ]);
    }

}
