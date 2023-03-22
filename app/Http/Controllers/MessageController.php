<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function index()
    {
        $data = Message::all();
        return view('messages.index', compact('data'));
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
            $exist = Message::find($req->id);
            if ($exist) {
                $done = Message::find($req->id)->delete();
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

    public function show(Request $req)
    {

        $data = Message::find($req->id);
        $done = Message::find($req->id)->update([
            'read' => 1
        ]);
        return view('messages.show',compact('data'));
    }
}
