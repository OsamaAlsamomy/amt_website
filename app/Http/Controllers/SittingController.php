<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Sitting;
use Illuminate\Http\Request;

class SittingController extends Controller
{
    public function index()
    {
        $data = Sitting::first();
        return view('sittings.index', compact('data'));
    }


    public function change_site(Request $req)
    {
        try {
            $done = Sitting::first()->update([
                'site_run' => $req->val
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
        try {
            $done = Sitting::first()->update([
                'comment_run' => $req->val
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
        try {
            $done = Sitting::first()->update([
                'contact_mail' => $req->val
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
