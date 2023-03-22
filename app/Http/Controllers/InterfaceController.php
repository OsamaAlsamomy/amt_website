<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Add;
use App\Models\User;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InterfaceController extends Controller
{



    public function index()
    {
        if(Auth::user()->type != 'S' && Auth::user()->type != 'A' ){
            return redirect()->back();
        }

        $data = Slide::all();
        foreach ($data as $key) {
            if ($key->created_by != null) {
                $user = User::select('name')->find($key->created_by);
                $key->created =  $user->name;
            } else {
                $key->created = '';
            }
        }
        $add = Add::first();
        return view('interfaces.index', compact('data', 'add'));
    }

    // Change brands state
    public function change_state(Request $req)
    {
        if(Auth::user()->type != 'S' && Auth::user()->type != 'A' ){
            return redirect()->back();
        }

        try {
            $exist = Slide::find($req->id);
            if ($exist) {
                if ($exist->state == 1) {
                    $state = 0;
                } else {
                    $state = 1;
                }
                $done = Slide::find($req->id)->update([
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
        if(Auth::user()->type != 'S' && Auth::user()->type != 'A' ){
            return redirect()->back();
        }

        $count = Slide::select('id')->count();
        if ($count >= 10) {
            return response()->json(['status' => 2, 'error' => trans('err_msg_trans.slid_limt')]);
        }
        $validator = Validator::make($req->all(), [
            'title' => 'required',
            'image' => 'required|image',
            'desc' => 'required',
            'url' => 'required',

        ], [
            'name.required' => trans('err_msg_trans.name_req'),
            'image.required' => trans('err_msg_trans.img_req'),
            'image.image' => trans('err_msg_trans.img_img'),
            'desc.required' => trans('err_msg_trans.desc_req'),
            'url.required' => trans('err_msg_trans.desc_req'),

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        try {
            $result = $req->file('image')->store('slids', 'public');
            $path = 'storage/' . $result;
            $done = Slide::create([
                'title' => $req->title,
                'img' => $path,
                'content' => $req->desc,
                'url' => $req->url,
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


    // edit Brand
    public function update(Request $req)
    {
        if(Auth::user()->type != 'S' && Auth::user()->type != 'A' ){
            return redirect()->back();
        }

        $validator = Validator::make($req->all(), [
            'id' => 'required|integer',
            'title' => 'required',
            'image' => 'image',
            'desc' => 'required',
            'url' =>  'required',


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
            $exist = Slide::find($req->id);
            if ($exist) {
                if ($req->hasFile('image')) {
                    unlink($exist->img);
                    $result = $req->file('image')->store('slids', 'public');
                    $path = 'storage/' . $result;
                } else {
                    $path = $exist->img;
                }
                $done = Slide::find($req->id)->update([
                    'title' => $req->title,
                    'img' => $path,
                    'content' => $req->desc,
                    'url' => $req->url,
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
        if(Auth::user()->type != 'S' && Auth::user()->type != 'A' ){
            return redirect()->back();
        }

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
            $exist = Slide::find($req->id);
            if ($exist) {
                $done = Slide::find($req->id)->delete();
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



    public function update_adds(Request $req)
    {
        if(Auth::user()->type != 'S' && Auth::user()->type != 'A' ){
            return redirect()->back();
        }

        $validator = Validator::make($req->all(), [
            'add1' => 'image',
            'add2' => 'image',
            'add3' => 'image',
            'add4' => 'image',
            'add5' => 'image',
        ], [
            'add1.image' => trans('err_msg_trans.img_img'),
            'add2.image' => trans('err_msg_trans.img_img'),
            'add3.image' => trans('err_msg_trans.img_img'),
            'add4.image' => trans('err_msg_trans.img_img'),
            'add5.image' => trans('err_msg_trans.img_img'),

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $exist = Add::first();
        if ($exist) {


            if ($req->hasFile('add1')) {
                if ($exist->add1 != null) {
                    unlink($exist->add1);
                    $result = $req->file('add1')->store('adds', 'public');
                    $add1 = 'storage/' . $result;
                } else {
                    $result = $req->file('add1')->store('adds', 'public');
                    $add1 = 'storage/' . $result;
                }
            } else {
                $add1 = $exist->add1;
            }

            if ($req->hasFile('add2')) {
                if ($exist->add2 != null) {
                    unlink($exist->add2);
                    $result = $req->file('add2')->store('adds', 'public');
                    $add2 = 'storage/' . $result;
                } else {
                    $result = $req->file('add2')->store('adds', 'public');
                    $add2 = 'storage/' . $result;
                }
            } else {
                $add2 = $exist->add2;
            }

            if ($req->hasFile('add3')) {
                if ($exist->add3 != null) {
                    unlink($exist->add3);
                    $result = $req->file('add3')->store('adds', 'public');
                    $add3 = 'storage/' . $result;
                } else {
                    $result = $req->file('add3')->store('adds', 'public');
                    $add3 = 'storage/' . $result;
                }
            } else {
                $add3 = $exist->add3;
            }

            if ($req->hasFile('add4')) {
                if ($exist->add4 != null) {
                    unlink($exist->add4);
                    $result = $req->file('add4')->store('adds', 'public');
                    $add4 = 'storage/' . $result;
                } else {
                    $result = $req->file('add4')->store('adds', 'public');
                    $add4 = 'storage/' . $result;
                }
            } else {
                $add4 = $exist->add4;
            }


            if ($req->hasFile('add5')) {
                if ($exist->add5 != null) {
                    unlink($exist->add5);
                    $result = $req->file('add5')->store('adds', 'public');
                    $add5 = 'storage/' . $result;
                } else {
                    $result = $req->file('add5')->store('adds', 'public');
                    $add5 = 'storage/' . $result;
                }
            } else {
                $add5 = $exist->add5;
            }

            $done = Add::first()->update([
                'add1' => $add1,
                'add2' => $add2,
                'add3' => $add3,
                'add4' => $add4,
                'add5' => $add5,
                'updated_by' => Auth::user()->id
            ]);
            if ($done) {
                return response()->json(['status' => 1, 'success' => trans('err_msg_trans.global_success')]);

            } else {
                return response()->json(['status' => 2, 'error' => trans('err_msg_trans.global_error')]);
            }
        } else {
            return response()->json(['status' => 2, 'error' => trans('err_msg_trans.global_error')]);
        }
    }
}
