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
use App\Mail\MessageSend;
use App\Models\Comments;
use App\Models\Message;
use App\Models\Subscription;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\Validator;

use Exception;
use Illuminate\Support\Facades\Mail;

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
            'message' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        try {
            $done = Message::create([
                'name' => $req->name,
                'email' => $req->email,
                'phone' => $req->phone,
                'subject' => $req->subject,
                'message' => $req->message,
            ]);
            if ($done) {
                $data = [
                    'name' => $req->name,
                    'email' => $req->email,
                    'phone' => $req->phone,
                    'subject' => $req->subject,
                    'message' => $req->message,
                ];
                Mail::to('os.alsamomy@gmail.com')->send(new MessageSend($data));

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

        $products = Product::where('state',1)->inRandomOrder()->paginate(20);
        foreach ($products as $key){
            $s = Section::select('name')->find($key->sec_id);
            $key->section = $s->name;
        }
        return view('FrontEnd.products.index',compact('products'));
    }


    public function product(Request $req)
    {
        $data = Product::find($req->id);
        $s = Section::select('name')->find($data->sec_id);
        $data->section = $s->name;
        $products = Product::where('state', 1)->where('top', 1)->inRandomOrder()->limit(5)->get();
        foreach ($products as $key) {
            $s = Section::select('name')->find($key->sec_id);
            $key->section =  $s->name;
        }

        $products_same = Product::where('state', 1)->where('id','!=',$req->id)->where('sec_id',$data->sec_id)->inRandomOrder()->limit(2)->get();
        foreach ($products as $key) {
            $s = Section::select('name')->find($key->sec_id);
            $key->section =  $s->name;
        }

        return view('FrontEnd.products.show',compact('data','products','products_same'));

    }

    public function products_serch(Request $req)
    {
        if($req->section == 0 && $req->serch != null){
            $serch = $req->serch;
            $products = Product::where('state',1)->where('name', 'LIKE', '%' . $serch . '%')->inRandomOrder()->paginate(20);
            return view('FrontEnd.products.index',compact('products','serch'));
        }
        if($req->serch == null && $req->section != 0){
            $section = $req->section;
            $products = Product::where('state',1)->where('sec_id',$section)->inRandomOrder()->paginate(20);
            $s = Section::select('name')->find($section);
            if(!$s){
                $section = '';
            }else{
                $section = $s->name;
            }

            return view('FrontEnd.products.index',compact('products','section'));
        }

        if($req->serch != null && $req->section != 0){
            $section = $req->section;
            $serch = $req->serch;
            $products = Product::where('state',1)->where('sec_id',$section)->where('name', 'LIKE', '%' . $serch . '%')->inRandomOrder()->paginate(20);
            $s = Section::select('name')->find($section);
            if(!$s){
                $section = '';
            }else{
                $section = $s->name;
            }

            return view('FrontEnd.products.index',compact('products','section','serch'));
        }



        $products = Product::where('state',1)->where('sec_id',$req->section)->where('name', 'LIKE', '%' . $req->serch  . '%')->inRandomOrder()->paginate(20);
        foreach ($products as $key){
            $s = Section::select('name')->find($key->sec_id);
            $key->section = $s->name;
        }
        return view('FrontEnd.products.index',compact('products'));



    }


    public function section(Request $req)
    {
        $section = Section::find($req->id);
        $products = Product::where('state',1)->where('sec_id',$req->id)->inRandomOrder()->paginate(20);
        foreach ($products as $key){
            $key->section = $section->name;
        }
        return view('FrontEnd.products.section',compact('section','products'));
    }

    public function blogs(Request $req)
    {
        $blogs = Blog::where('state',1)->inRandomOrder()->paginate(9);
        foreach ($blogs as $key){
            $user = User::select('name')->find($key->created_by);
            $key->auther = $user->name;
        }
        $blogs_last = Blog::where('state',1)->orderBy('id','DESC')->limit(6)->get();

        return view('FrontEnd.blog.index',compact('blogs','blogs_last'));
    }

    public function blog(Request $req)
    {
        $data = Blog::find($req->id);
        $user = User::select('name')->find($data->created_by);
        $data->auther = $user->name;
        $blogs_last = Blog::where('state',1)->orderBy('id','DESC')->limit(6)->get();
        $comments = Comments::where('blog_id',$req->id)->get();
        return view('FrontEnd.blog.show',compact('data','blogs_last','comments'));
    }

    public function blogs_serch(Request $req)
    {
        $blogs = Blog::where('state',1)->where('name', 'LIKE', '%' . $req->search  . '%')->inRandomOrder()->paginate(9);
        foreach ($blogs as $key){
            $user = User::select('name')->find($key->created_by);
            $key->auther = $user->name;
        }
        $blogs_last = Blog::where('state',1)->orderBy('id','DESC')->limit(6)->get();

        return view('FrontEnd.blog.index',compact('blogs','blogs_last'));
    }


    public function comment(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
            'blog'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        try {
            $done = Comments::create([
                'name' => $req->name,
                'email' => $req->email,
                'comment' => $req->comment,
                'blog_id' => $req->blog,
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


    public function services(Request $req)
    {
        $services = Service::where('state',1)->inRandomOrder()->get();
        return view('FrontEnd.services.index',compact('services'));
    }

    public function service(Request $req)
    {
        $data = Service::find($req->id);
        return view('FrontEnd.services.show',compact('data'));

    }


}
