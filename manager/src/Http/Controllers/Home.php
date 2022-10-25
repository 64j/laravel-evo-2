<?php

declare(strict_types=1);

namespace Manager\Http\Controllers;

class Home extends Controller
{
    public function index()
    {
        return view('home', []);
    }
}
