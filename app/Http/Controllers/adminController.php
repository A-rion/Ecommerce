<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function adminDash(){
        return view('admin.dash.dash');
    }
}
