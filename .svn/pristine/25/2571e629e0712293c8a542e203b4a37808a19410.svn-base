<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    public function showProfile(Request $request){
         $value = $request->session()->all();;
         dd($value);
         return view(profile);
    }
}
