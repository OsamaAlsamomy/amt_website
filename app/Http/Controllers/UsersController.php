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
    // show all users
    public function index()
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
        return view('users.index', compact('data'));
    }

    public function show()
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
        return $data;
    }

    


    // Change user state
    public function change_state(Request $req)
    {
        try {
            $exist = User::find($req->id);
            if($exist){
                if($exist->state == 1){
                    $state = 0;
                }else{
                    $state = 1;
                }
                $done = User::find($req->id)->update([
                    'state' => $state
                ]);
                if($done){
                    $data = $this->show();
                    return response()->json(['status' => 1, 'success' => trans('err_msg_trans.global_success'),'data' => $data]);
                }else{
                    return response()->json(['status' => 2, 'error' => trans('err_msg_trans.global_error')]);
                }
            }else{
                return response()->json(['status' => 2, 'error' => trans('err_msg_trans.id_req')]);
            }

        } catch (Exception $ex) {
            return response()->json(['status' => 2, 'error' => $ex->getMessage()]);
        }
    }


    // Create new user
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
                return response()->json(['status' => 1, 'success' => trans('err_msg_trans.global_success'),'text' => trans('err_msg_trans.refresh_update')]);
            }else{
                return response()->json(['status' => 2, 'error' => trans('err_msg_trans.global_error')]);
            }
        } catch (Exception $ex) {
            return response()->json(['status' => 2, 'error' => $ex->getMessage()]);
        }
    }


    // Edite user data
    public function update(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required|integer',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$req->id,
            'password' => 'confirmed',
            'roll' => 'required|min:1|max:1'
        ], [
            'id.required' => trans('err_msg_trans.id_req'),
            'id.integer' => trans('err_msg_trans.id_req'),


            'name.required' => trans('err_msg_trans.name_req'),

            'email.required' => trans('err_msg_trans.email_req'),
            'email.email' => trans('err_msg_trans.email_email'),
            'email.unique' => trans('err_msg_trans.email_uq'),


            'password.confirmed' => trans('err_msg_trans.password_conf'),


            'roll.required' => trans('err_msg_trans.roll_req'),
            'roll.min' => trans('err_msg_trans.roll_uq'),
            'roll.max' => trans('err_msg_trans.roll_uq'),
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        try {
            $exist = User::find($req->id);
            if($exist){
                if($req->password == null){
                    $pass = $exist->password;
                }else{
                    $pass = Hash::make($req->password);
                }
                $done = User::find($req->id)->update([
                    'name' => $req->name,
                    'email' => $req->email,
                    'password' => $pass,
                    'type' => $req->roll,
                    'updated_by' =>Auth::user()->id
                ]);
                if($done){
                    return response()->json(['status' => 1, 'success' => trans('err_msg_trans.global_success')]);
                }else{
                    return response()->json(['status' => 2, 'error' => trans('err_msg_trans.global_error')]);
                }
            }else{
                return response()->json(['status' => 2, 'error' => trans('err_msg_trans.id_req')]);
            }

        } catch (Exception $ex) {
            return response()->json(['status' => 2, 'error' => $ex->getMessage()]);
        }

    }


    // Delete user
    public function destroy(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required|integer',
        ], [
            'id.required' => trans('err_msg_trans.id_req'),
            'id.integer' => trans('err_msg_trans.id_req'),
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        try {
            $exist = User::find($req->id);
            if($exist){
                $done = User::find($req->id)->delete();
                if($done){
                    return response()->json(['status' => 1, 'success' => trans('err_msg_trans.global_success')]);
                }else{
                    return response()->json(['status' => 2, 'error' => trans('err_msg_trans.global_error')]);
                }
            }else{
                return response()->json(['status' => 2, 'error' => trans('err_msg_trans.id_req')]);
            }

        } catch (Exception $ex) {
            return response()->json(['status' => 2, 'error' => $ex->getMessage()]);
        }
    }
}

