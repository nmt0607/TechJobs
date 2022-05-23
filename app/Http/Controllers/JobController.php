<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Reponse;

class JobController extends Controller{

    public function index(){
        return view('job.index');
    }

    public function detail($id){
        return view('job.detail',['id'=>$id]);
    }

    public function applyList($id){
        return view('job.apply-list',['id'=>$id]);
    }

    public function create(){
        return view('job.create');
    }

    public function edit($id){
        return view('job.edit', ['id' => $id]);
    }

    public function pushlished(){
        return view('job.pushlished');
    }
}
