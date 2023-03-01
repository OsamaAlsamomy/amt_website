<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $req)
    {
        $data = User::all();
        return view('users/index',compact('data'));
    }

    public function change_state(Request $req)
    {

        return response()->json(['success'=>$req->id]);
    }
}
