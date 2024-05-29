<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser(){
        $users = User::all();
        return response()->json($users);
    }
    public function getAll(){
        $getAll = User::all();
        return response()->json($getAll);
    }
    public function index(){
        return view('users.index');
    }

    public function create(){
        return view('users.create');
    }
}
