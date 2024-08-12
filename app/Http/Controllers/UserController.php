<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(){
        $user = Auth::user();

        return view('user', ['user' => $user]);
    }
}
