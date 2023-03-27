<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefaultRedirector extends Controller
{
    public function index()
    {
        return redirect('/admin/login');
    }
}
