<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $data = Company::first();

        if ($data->updated_by != null) {
            $user = User::select('name')->find($data->updated_by);
            $data->updated =  $user->name;
        } else {
            $data->updated = '';
        }


        return view('company.index', compact('data'));
    }

    
}
