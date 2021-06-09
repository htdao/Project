<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\userInfo;

class DashboardController extends Controller
{
    public function index(){
        return view('backend.dashboard');
    }
}
