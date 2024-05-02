<?php

namespace App\Http\Controllers;


class WelcomeController extends Controller
{
    //
    public function index()
    {

        // Pass the data to the view
        return view('welcome');
    }
}
