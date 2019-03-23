<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admin');
    }


    public function index(){
        return view('backend.dashboard');
    }

    public function addNewsForm(){
        return view('backend.add-news');
    }
}
