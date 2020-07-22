<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::get();
        return view('admin.users', compact('users'));
    }

}
