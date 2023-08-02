<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    function index() 
    {
        $user = User::all();
        return view('admin.index',['users' => $user]);
    }
}
