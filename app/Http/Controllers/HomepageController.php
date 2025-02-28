<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $trenutnoVreme = date('h:i:s');
        return view ('welcome', compact('trenutnoVreme'));
    }
}
