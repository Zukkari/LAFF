<?php

namespace App\Http\Controllers;

use Illuminate\Console\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function getHome() {
        return view('welcome');
    }

    public function getLisa() {
        return view('lisa');
    }
}
