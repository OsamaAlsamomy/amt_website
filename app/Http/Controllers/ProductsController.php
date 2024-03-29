<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function index()
    {
        $data = Product::all();
        foreach ($data as $key) {
            if ($key->created_by != null) {
                $user = User::select('name')->find($key->created_by);
                $key->created =  $user->name;
            } else {
                $key->created = '';
            }
        }

        return view('products.index', compact('data'));
    }

    // Change blog state
    public function change_state(Request $req)
    {
        try {
            $exist = Product::find($req->id);
            if($exist){
                if($exist->state == 1){
                    $state = 0;
                }else{
                    $state = 1;
                }
                $done = Product::find($req->id)->update([
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


    // Change Product Top
    public function change_top(Request $req)
    {
        try {
            $exist = Product::find($req->id);
            if($exist){
                if($exist->top == 1){
                    $top = 0;
                }else{
                    $top = 1;
                }
                $done = Product::find($req->id)->update([
                    'top' => $top
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


    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'image' => 'required|image',
            'desc' => 'required',
            'section' => 'required|integer',
            'price' => 'required'

        ], [
            'name.required' => trans('err_msg_trans.name_req'),
            'image.required' => trans('err_msg_trans.img_req'),
            'image.image' => trans('err_msg_trans.img_img'),
            'desc.required' => trans('err_msg_trans.desc_req'),
            'price.required' => trans('err_msg_trans.price_req'),

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        try {
            $result = $req->file('image')->store('products', 'public');
            $path = 'storage/' . $result;
            $done = Product::create([
                'name' => $req->name,
                'img' => $path,
                'desc' => $req->desc,
                'price' => $req->price,
                'discount' => $req->discount,
                'sec_id' => $req->section,
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
            'section' => 'required|integer',
            'desc' => 'required',
            'price' => 'required'


        ], [
            'id.required' => trans('err_msg_trans.id_req'),
            'id.integer' => trans('err_msg_trans.id_req'),

            'name.required' => trans('err_msg_trans.name_req'),

            'image.image' => trans('err_msg_trans.img_img'),
            'desc.required' => trans('err_msg_trans.desc_req'),

            'price.required' => trans('err_msg_trans.price_req'),


        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        try {
            $exist = Product::find($req->id);
            if ($exist) {
                if ($req->hasFile('image')) {
                    unlink($exist->img);
                    $result = $req->file('image')->store('products', 'public');
                    $path = 'storage/' . $result;
                } else {
                    $path = $exist->img;
                }
                $done = Product::find($req->id)->update([
                    'name' => $req->name,
                    'img' => $path,
                    'sec_id' => $req->section,
                    'desc' => $req->desc,
                    'price' => $req->price,
                    'discount' => $req->discount,
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

     // Delete Product
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
             $exist = Product::find($req->id);
             if($exist){
                 $done = Product::find($req->id)->delete();
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
