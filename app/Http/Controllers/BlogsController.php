<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogsController extends Controller
{
    public function index()
    {
        $data = Blog::all();
        foreach ($data as $key) {
            if ($key->created_by != null) {
                $user = User::select('name')->find($key->created_by);
                $key->created =  $user->name;
            } else {
                $key->created = '';
            }
        }
        return view('blogs.index', compact('data'));
    }


    // Change blog state
    public function change_state(Request $req)
    {
        try {
            $exist = Blog::find($req->id);
            if($exist){
                if($exist->state == 1){
                    $state = 0;
                }else{
                    $state = 1;
                }
                $done = Blog::find($req->id)->update([
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


    // Create new blog
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'image' => 'required|image',
            'desc' => 'required'

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
            $result = $req->file('image')->store('blogs', 'public');
            $path = 'storage/' . $result;
            $done = Blog::create([
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


    // Edite blog data
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
            $exist = Blog::find($req->id);
            if ($exist) {
                if ($req->hasFile('image')) {

                    $result = $req->file('image')->store('blogs', 'public');
                    $path = 'storage/' . $result;
                    if($result){
                        unlink($exist->img);
                    }
                } else {
                    $path = $exist->img;
                }
                $done = Blog::find($req->id)->update([
                    'name' => $req->name,
                    'img' => $path,
                    'desc' => $req->desc,
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


     // Delete blog
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
             $exist = Blog::find($req->id);
             if($exist){
                 $done = Blog::find($req->id)->delete();
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
