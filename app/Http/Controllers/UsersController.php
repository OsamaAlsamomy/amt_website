<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index(Request $req)
    {
        $data = User::all();
        foreach($data as $key){
            if($key->created_by != null){
                $user = User::select('name')->find($key->created_by);
                $key->created =  $user->name;
            }else{
                $key->created = '';
            }
          
        }
        return view('users/index', compact('data'));
    }

    public function change_state(Request $req)
    {
        echo $req->id;
        ///return response()->json(['success' => $req->id]);
    }


    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
            'roll' => 'required|min:1|max:1'
        ], [
            'name.required' => trans('err_msg_trans.name_req'),

            'email.required' => trans('err_msg_trans.email_req'),
            'email.email' => trans('err_msg_trans.email_email'),
            'email.unique' => trans('err_msg_trans.email_uq'),

            'password.required' => trans('err_msg_trans.password_req'),
            'password.confirmed' => trans('err_msg_trans.password_conf'),
            'password.min' => trans('err_msg_trans.password_min'),

            'password_confirmation.required' => trans('err_msg_trans.passwordconf_req'),

            'roll.required' => trans('err_msg_trans.roll_req'),
            'roll.min' => trans('err_msg_trans.roll_uq'),
            'roll.max' => trans('err_msg_trans.roll_uq'),
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        try {
            $done = User::create([
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'type' => $req->roll,
                'created_by' => Auth::user()->id,
                'updated_by' =>Auth::user()->id
            ]);
            if($done){
                return response()->json(['status' => 1, 'success' => 'Post created successfully.']);
            }else{
                return response()->json(['status' => 2, 'success' => 'Post created successfully.']);
            }
        } catch (Exception $ex) {
            return response()->json(['status' => 2, 'success' => $ex->getMessage()]);
        }
    }
}
