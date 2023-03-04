<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{

    public function index()
    {
        $data = Service::all();
        foreach ($data as $key) {
            if ($key->created_by != null) {
                $user = User::select('name')->find($key->created_by);
                $key->created =  $user->name;
            } else {
                $key->created = '';
            }
        }
        return view('services.index', compact('data'));
    }

    // Change srvice state
    public function change_state(Request $req)
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
            $exist = Service::find($req->id);
            if ($exist) {
                if ($exist->state == 1) {
                    $state = 0;
                } else {
                    $state = 1;
                }
                $done = Service::find($req->id)->update([
                    'state' => $state
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


    // Create new service
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'image' => 'required|image',
            'desc' => 'required',

        ], [
            'name.required' => trans('err_msg_trans.name_req'),
            'image.required' => trans('err_msg_trans.img_req'),
            'image.image' => trans('err_msg_trans.img_img'),
            'desc.required' => trans('err_msg_trans.desc_req'),

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        try {
            $result = $req->file('image')->store('services', 'public');
            $path = 'storage/' . $result;
            $done = Service::create([
                'name' => $req->name,
                'img' => $path,
                'desc' => $req->desc,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id
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


    // Edite service data
    public function update(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required|integer',
            'name' => 'required',
            'image' => 'image',
            'desc' => 'required',

        ], [
            'id.required' => trans('err_msg_trans.id_req'),
            'id.integer' => trans('err_msg_trans.id_req'),

            'name.required' => trans('err_msg_trans.name_req'),

            'image.image' => trans('err_msg_trans.img_img'),
            'desc.required' => trans('err_msg_trans.desc_req'),


        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        try {
            $exist = Service::find($req->id);
            if ($exist) {
                if ($req->hasFile('image')) {
                    $result = $req->file('image')->store('services', 'public');
                    $path = 'storage/' . $result;
                } else {
                    $path = $exist->img;
                }
                $done = Service::find($req->id)->update([
                    'name' => $req->name,
                    'img' => $path,
                    'desc' => $req->desc,
                    'updated_by' => Auth::user()->id
                ]);
                if ($done) {
                    unlink($exist->img);
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
            $exist = Service::find($req->id);
            if($exist){
                $done = Service::find($req->id)->delete();
                if($done){
                    unlink($exist->img);
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
