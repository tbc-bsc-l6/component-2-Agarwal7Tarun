<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //This nethod will display home page
    public function index() {
        return view('front.home');
    }

}
