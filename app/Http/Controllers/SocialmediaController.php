<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Socialmedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SocialmediaController extends Controller
{
    public function index()
    {
        $data = Socialmedia::all();
        foreach ($data as $key) {
            if ($key->created_by != null) {
                $user = User::select('name')->find($key->updated_by);
                $key->updated =  $user->name;
            } else {
                $key->updated = '';
            }
        }

        return view('socialmedia.index', compact('data'));
    }

    // Change phone or email state
    public function change_state(Request $req)
    {
        try {
            $exist = Socialmedia::find($req->id);
            if($exist){
                if($exist->state == 1){
                    $state = 0;
                }else{
                    $state = 1;
                }
                $done = Socialmedia::find($req->id)->update([
                    'state' => $state
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

   
    // Edite phone or email data
    public function update(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required|integer',
            'url' => 'required',
        ], [
            'id.required' => trans('err_msg_trans.id_req'),
            'id.integer' => trans('err_msg_trans.id_req'),
            'url.required' => trans('err_msg_trans.desc_req'),
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        try {
            $exist = Socialmedia::find($req->id);
            if ($exist) {
                
                $done = Socialmedia::find($req->id)->update([
                    'content' => $req->content,
                    'updated_by' => Auth::user()->id
                ]);
                if ($done) {
                    return response()->json(['status' => 1, 'success' => trans('err_msg_trans.global_success')]);
                } else {
                    return response()->json(['status' => 2, 'error' => trans('err_msg_trans.global_error')]);
                }
            } else {
                return response()->json(['status' => 2, 'error' => trans('err_msg_trans.id_req')]);
            }
        } catch (Exception $ex) {
            return response()->json(['status' => 2, 'error' => $ex->getMessage()]);
        }
    }

}
