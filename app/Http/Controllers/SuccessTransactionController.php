<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuccessTransactionController extends Controller
{
    public function show(){
        return view('successTransaction');
    }
}
