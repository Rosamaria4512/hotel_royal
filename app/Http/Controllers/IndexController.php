<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $sites = Site::all();
        return view(('dashboard'), compact('sites'));
    }
}
