<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index(Request $request){
        return view('ui.frontend.aboutUs');
    }
}
