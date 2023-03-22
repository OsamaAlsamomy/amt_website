<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Sitting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SittingController extends Controller
{
    public function index()
    {
        if(Auth::user()->type != 'S' && Auth::user()->type != 'A' ){
            return redirect()->back();
        }

        $data = Sitting::first();
        return view('sittings.index', compact('data'));
    }


    public function change_site(Request $req)
    {
        if(Auth::user()->type != 'S' && Auth::user()->type != 'A' ){
            return redirect()->back();
        }

        try {
            if($req->val == 1){
                $val = 0;
            }else{
                $val = 1;
            }
            $done = Sitting::first()->update([
                'site_run' => $val
            ]);
            if ($done) {
                return response()->json(['status' => 1, 'success' => trans('err_msg_trans.global_success')]);
            } else {
                return response()->json(['status' => 2, 'error' => trans('err_msg_trans.global_error')]);
            }
        } catch (Exception $ex) {
            return response()->json(['status' => 2, 'error' => $ex->getMessage()]);
        }
    }


    public function change_commint(Request $req)
    {
        if(Auth::user()->type != 'S' && Auth::user()->type != 'A' ){
            return redirect()->back();
        }

        try {
            if($req->val == 1){
                $val = 0;
            }else{
                $val = 1;
            }
            $done = Sitting::first()->update([
                'comment_run' => $val
            ]);
            if ($done) {
                return response()->json(['status' => 1, 'success' => trans('err_msg_trans.global_success')]);
            } else {
                return response()->json(['status' => 2, 'error' => trans('err_msg_trans.global_error')]);
            }
        } catch (Exception $ex) {
            return response()->json(['status' => 2, 'error' => $ex->getMessage()]);
        }
    }


    public function change_email(Request $req)
    {
        if(Auth::user()->type != 'S' && Auth::user()->type != 'A' ){
            return redirect()->back();
        }

        $validator = Validator::make($req->all(), [
            'email' => 'required|email',

        ], [
            'email.required' => trans('err_msg_trans.email_req'),
            'email.email' => trans('err_msg_trans.email_email'),


        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        try {
            $done = Sitting::first()->update([
                'contact_mail' => $req->email
            ]);
            if ($done) {
                return response()->json(['status' => 1, 'success' => trans('err_msg_trans.global_success')]);
            } else {
                return response()->json(['status' => 2, 'error' => trans('err_msg_trans.global_error')]);
            }
        } catch (Exception $ex) {
            return response()->json(['status' => 2, 'error' => $ex->getMessage()]);
        }
    }


    public function change_phpne(Request $req)
    {
        if(Auth::user()->type != 'S' && Auth::user()->type != 'A' ){
            return redirect()->back();
        }

        $validator = Validator::make($req->all(), [
            'phone' => 'required',

        ], [
            'phone.required' => trans('err_msg_trans.email_req'),


        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        try {
            $done = Sitting::first()->update([
                'contact_phone' => $req->phone
            ]);
            if ($done) {
                return response()->json(['status' => 1, 'success' => trans('err_msg_trans.global_success')]);
            } else {
                return response()->json(['status' => 2, 'error' => trans('err_msg_trans.global_error')]);
            }
        } catch (Exception $ex) {
            return response()->json(['status' => 2, 'error' => $ex->getMessage()]);
        }
    }



    public function change_lang(Request $req)
    {
        if(Auth::user()->type != 'S' && Auth::user()->type != 'A' ){
            return redirect()->back();
        }

        try {
            if($req->val == 'ar'){
                $val = 'en';
            }else{
                $val = 'ar';
            }
            $done = Sitting::first()->update([
                'view_lang' => $val
            ]);
            if ($done) {
                return response()->json(['status' => 1, 'success' => trans('err_msg_trans.global_success')]);
            } else {
                return response()->json(['status' => 2, 'error' => trans('err_msg_trans.global_error')]);
            }
        } catch (Exception $ex) {
            return response()->json(['status' => 2, 'error' => $ex->getMessage()]);
        }
    }


}
