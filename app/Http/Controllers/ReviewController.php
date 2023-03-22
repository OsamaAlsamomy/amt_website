<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function index()
    {
        $data = Review::all();
        foreach ($data as $key) {
            if ($key->created_by != null) {
                $user = User::select('name')->find($key->created_by);
                $key->created =  $user->name;
            } else {
                $key->created = '';
            }
        }

        return view('reviews.index', compact('data'));
    }

    // Change brands state
    public function change_state(Request $req)
    {
        try {
            $exist = Review::find($req->id);
            if ($exist) {
                if ($exist->state == 1) {
                    $state = 0;
                } else {
                    $state = 1;
                }
                $done = Review::find($req->id)->update([
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

    // create new section
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'image' => 'required|image',
            'desc' => 'required',
            'review' => 'required',

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
            $result = $req->file('image')->store('reviews', 'public');
            $path = 'storage/' . $result;
            $done = Review::create([
                'name' => $req->name,
                'logo' => $path,
                'adjective' => $req->desc,
                'review' => $req->review,
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


    // edit section
    public function update(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required|integer',
            'name' => 'required',
            'image' => 'image',
            'desc' => 'required',
            'review' => 'required',

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
            $exist = Review::find($req->id);
            if ($exist) {
                if ($req->hasFile('image')) {
                    unlink($exist->logo);
                    $result = $req->file('image')->store('reviews', 'public');
                    $path = 'storage/' . $result;
                } else {
                    $path = $exist->logo;
                }
                $done = Review::find($req->id)->update([
                    'name' => $req->name,
                    'logo' => $path,
                    'adjective' => $req->desc,
                    'review' => $req->review,
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

    // Delete Brand
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
            $exist = Review::find($req->id);
            if ($exist) {
                $done = Review::find($req->id)->delete();
                if ($done) {
                    unlink($exist->logo);
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
