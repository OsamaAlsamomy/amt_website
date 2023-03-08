<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function index()
    {
        $data = Company::first();
        return view('company.index', compact('data'));
    }

    public function update(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'logo' => 'image',
            'icon' => 'image',
            'desc' => 'required',
            'address' => 'required',
            'long' => 'required|numeric',
            'lat' => 'required|numeric',
            'about' => 'required',

        ], [

            'name.required' => trans('err_msg_trans.name_req'),

            'logo.image' => trans('err_msg_trans.img_img'),
            'icon.image' => trans('err_msg_trans.img_img'),

            'desc.required' => trans('err_msg_trans.desc_req'),

            'address.required' => trans('err_msg_trans.desc_req'),

            'long.required' => trans('err_msg_trans.long_req'),
            'long.numeric' => trans('err_msg_trans.num_num'),
            'lat.required' => trans('err_msg_trans.lat_req'),
            'lat.numeric' => trans('err_msg_trans.num_num'),

            'about.required' => trans('err_msg_trans.about_req'),

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        try {
            $comp = Company::first();
            if ($req->hasFile('logo')) {
                $result = $req->file('logo')->store('company', 'public');
                $logo_path = 'storage/' . $result;
            } else {
                $logo_path = $comp->logo;
            }
            if ($req->hasFile('icon')) {
                $result = $req->file('icon')->store('company', 'public');
                $icon_path = 'storage/' . $result;
            } else {
                $icon_path = $comp->icon;
            }

            $done = Company::first()->update([
                'name' => $req->name,
                'icon' => $icon_path,
                'logo' => $logo_path,
                'desc' => $req->desc,
                'address' => $req->address,
                'long' => $req->long,
                'lat' => $req->lat,
                'about' => $req->about,
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
}
