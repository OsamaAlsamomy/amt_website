<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Blog;
use App\Models\User;
use App\Models\Brand;
use App\Models\Slide;
use App\Models\Review;
use App\Models\Product;
use App\Models\Section;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Subscription;
use Illuminate\Support\Facades\Validator;

use Exception;


class HomeController extends Controller
{
    public function index()
    {
        $slids = Slide::where('state', 1)->get();
        $sections = Section::where('state', 1)->get();
        $products = Product::where('state', 1)->limit(8)->get();
        foreach ($products as $key) {
            $s = Section::select('name')->find($key->sec_id);
            $key->section =  $s->name;
        }
        $services = Service::where('state', 1)->get();
        $top_products = Product::where('state', 1)->where('top', 1)->get();
        foreach ($top_products as $key) {
            $s = Section::select('name')->find($key->sec_id);
            $key->section =  $s->name;
        }
        $pro_sec = Section::whereIn('id', Product::select('sec_id')->limit(8)->get())->get();

        $review = Review::where('state', 1)->get();

        $brands = Brand::where('state', 1)->get();
        $blogs  = Blog::where('state', 1)->get();
        foreach ($blogs as $key) {
            $u = User::select('name')->find($key->created_by);
            $key->created =  $u->name;
        }
        return view('FrontEnd.index', compact('slids', 'sections', 'products', 'pro_sec', 'services', 'top_products', 'review', 'brands', 'blogs'));
    }

    public function about_us()
    {
        $review = Review::where('state', 1)->get();
        return view('FrontEnd.about', compact('review'));
    }

    public function contact_us()
    {
        return view('FrontEnd.contact');
    }


    public function subscrip(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required|email|unique:subscriptions,email',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        try {
            $done = Subscription::create([
                'email' => $req->email
            ]);
            if ($done) {
                return response()->json(['status' => 1, 'error' => 'Subscription Success']);
            } else {
                return response()->json(['status' => 2, 'error' => 'Subscription Filed']);
            }
        } catch (Exception $ex) {
            return response()->json(['status' => 2, 'error' => $ex->getMessage()]);
        }
    }


    public function message(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        try {
            $done = Message::create([
                'email' => $req->name,
                'name' => $req->email,
                'phone' => $req->phone,
                'subject' => $req->subject,
                'message' => $req->message,
            ]);
            if ($done) {
                return response()->json(['status' => 1, 'error' => 'Send Message Success']);
            } else {
                return response()->json(['status' => 2, 'error' => 'Send Message Filed']);
            }
        } catch (Exception $ex) {
            return response()->json(['status' => 2, 'error' => $ex->getMessage()]);
        }
    }



    public function products(Request $req)
    {
        $products = Product::where('state',1)->get();
        foreach ($products as $key){
            $s = Section::select('name')->find($key->sec_id);
            $key->section = $s->name;
        }
        return view('FrontEnd.products.index',compact('products'));

    }
}
