<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function login(){
        return view('backend.auth-login');
    }

    public function register(){
        return view('backend.auth-register');
    }

    public function lock_screen(){
        return view('backend.auth-lock-screen');
    }

    public function recover_password(){
        return view('backend.auth-recoverpw');
    }

    public function index(){
        return view('backend.index');
    }

}
