<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubscriptionsController extends Controller
{
    public function index()
    {


        $data = Subscription::all();
        return view('subscriptions.index', compact('data'));
    }

     // Change blog state
     public function change_state(Request $req)
     {
         try {
             $exist = Subscription::find($req->id);
             if($exist){
                 if($exist->state == 1){
                     $state = 0;
                 }else{
                     $state = 1;
                 }
                 $done = Subscription::find($req->id)->update([
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


     // Delete service
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
            $exist = Subscription::find($req->id);
            if($exist){
                $done = Subscription::find($req->id)->delete();
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
