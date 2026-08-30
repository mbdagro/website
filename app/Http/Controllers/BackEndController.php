<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;

class BackEndController extends Controller
{
    public function change_password()
    {
        return view('admin.change_password');
    }

    public function index()
    {
        $Orders = Order::selectRaw("(COALESCE(count(CASE WHEN `order_type` = 'Order' THEN id END), 0)) AS `total_order`")
            ->selectRaw("(COALESCE(count(CASE WHEN `order_type` = 'Order' AND `order_type` = 'Complete' THEN id END), 0)) AS `total_complete`")
            ->selectRaw("(COALESCE(count(CASE WHEN `order_type` = 'Order' AND `order_type` = 'Waiting' THEN id END), 0)) AS `total_waiting`")
            ->selectRaw("(COALESCE(count(CASE WHEN `order_type` = 'Order' AND `order_type` = 'Download' THEN id END), 0)) AS `total_download`");

        // if (Auth::user()->hasRole('user')) {
            // $Orders->where('user_id', Auth::id());
        // }

        $Orders = $Orders->first();

        return view('admin.home', compact('Orders'));
    }
    public function quote_add()
    {
        return view('admin.quote_add');
    }
    public function quote_list()
    {
        return view('admin.quote_list');
    }
    public function print_order_list()
    {
        return view('admin.print_order_list');
    }
    public function message_add()
    {
        return $this->elfinder_hash_path('fggfd');
        return view('admin.message_add');
    }
    public function new_message()
    {
        return view('admin.new_message');
    }
    public function message_list()
    {
        return view('admin.message_list');
    }
    public function navbar_add()
    {
        return view('admin.navbar_add');
    }
    public function home_management()
    {
        return view('admin.home_management');
    }
    public function post_management()
    {
        return view('admin.post_management');
    }

    public function getFileManager()
    {

        return view('admin.filemanager');
        //     return view('vendor.elfinder.elfinder', ['dir' => 'public/packages/barryvdh/elfinder', 'locale' => 'en']);
    }

    public function elfinder_hash_path($path)
    {
        if ($path == '') $path = DIRECTORY_SEPARATOR;
        // $hash = substr($path, strlen("root-name") + 1);
        $hash = $path;
        // hash is used as id in HTML that means it must contain vaild chars
        // make base64 html safe and append prefix in begining
        $hash = strtr(base64_encode($hash), '+/=', '-_.');
        // remove dots '.' at the end, before it was '=' in base64
        $hash = rtrim($hash, '.');
        // append volume id to make hash unique
        return "elf_fls2_" . $hash;
    }
}
