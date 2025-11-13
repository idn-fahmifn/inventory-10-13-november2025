<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('dashboard');
    }

    public function petugas()
    {
        return view('petugas');
    }
}
