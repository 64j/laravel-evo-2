<?php

declare(strict_types=1);

namespace Manager\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', []);
    }
}
