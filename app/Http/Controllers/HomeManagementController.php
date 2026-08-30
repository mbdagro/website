<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeManagement;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Image;
use App\Helper\Helper;

class HomeManagementController extends Controller
{
    public function HomeManagement()
    {
        return view('admin.home_management');
    }


    public function HomeManagementUpdate(Request $request)
    {

        $HomeManagementSetting = HomeManagement::first();
        if (!$HomeManagementSetting) $HomeManagementSetting = new HomeManagement;

        // if($request->hasFile('logo')){

        // 	$old_img = public_path($request->logo);
        // 	if (file_exists($old_img)) {
        // 		@unlink($old_img);
        // 	}

        //         $image = $request->file('logo');
        //         $imageName = time() . '_' . $image->getClientOriginalName();
        //         $directory = 'upload/logo-images/';
        //         $image->move(public_path($directory), $imageName);
        //         $imageUrl = $directory . $imageName;
        //         $HomeManagementSetting->logo = $imageUrl;

        // }
        // if($request->hasFile('background_image')){

        // 	$old_img = public_path($request->background_image);
        // 	if (file_exists($old_img)) {
        // 		@unlink($old_img);
        // 	}

        // 	$document = $request->file('background_image');
        // 	$file = 'home_image/'.time().$request->file('background_image')->getClientOriginalName();
        // 	Image::make($document)->save(public_path($file));
        // 	$HomeManagementSetting->background_image = $file;
        // }
        // if($request->hasFile('welcome_image')){

        // 	$old_img = public_path($request->welcome_image);
        // 	if (file_exists($old_img)) {
        // 		@unlink($old_img);
        // 	}

        //     $welcome_image = $request->file('welcome_image');
        //     $wimageName = time() . '_' . $welcome_image->getClientOriginalName();
        //     $wdirectory = 'upload/wlogo-images/';
        //     $welcome_image->move(public_path($wdirectory), $wimageName);
        //     $welcome_imageimageUrl = $wdirectory . $wimageName;
        //     $HomeManagementSetting->welcome_image = $welcome_imageimageUrl;

        // }
        // if($request->hasFile('vision_image')){

        // 	$old_img = public_path($request->vision_image);
        // 	if (file_exists($old_img)) {
        // 		@unlink($old_img);
        // 	}

        //     $vision_image = $request->file('vision_image');
        //     $wimageName = time() . '_' . $vision_image->getClientOriginalName();
        //     $wdirectory = 'upload/wlogo-images/';
        //     $vision_image->move(public_path($wdirectory), $wimageName);
        //     $vision_imageimageUrl = $wdirectory . $wimageName;
        //     $HomeManagementSetting->vision_image = $vision_imageimageUrl;

        // }
        if ($request->hasFile('logo')) {
            $HomeManagementSetting->logo = Helper::uploadAttachment(
                $request->file('logo'),
                'logo_images',
                $HomeManagementSetting->logo ?? null
            );
        }

        if ($request->hasFile('background_image')) {
            $HomeManagementSetting->background_image = Helper::uploadAttachment(
                $request->file('background_image'),
                'home_image',
                $HomeManagementSetting->background_image ?? null
            );
        }

        if ($request->hasFile('welcome_image')) {
            $HomeManagementSetting->welcome_image = Helper::uploadAttachment(
                $request->file('welcome_image'),
                'welcome_images',
                $HomeManagementSetting->welcome_image ?? null
            );
        }

        if ($request->hasFile('vision_image')) {
            $HomeManagementSetting->vision_image = Helper::uploadAttachment(
                $request->file('vision_image'),
                'vision_images',
                $HomeManagementSetting->vision_image ?? null
            );
        }
        $HomeManagementSetting->company_name = $request->company_name;
        $HomeManagementSetting->slogan = $request->slogan;
        $HomeManagementSetting->address = $request->address;
        $HomeManagementSetting->welcome_title = $request->welcome_title;
        $HomeManagementSetting->welcome_description = $request->welcome_description;
        $HomeManagementSetting->vision_description = $request->vision_description;
        $HomeManagementSetting->email = $request->email;
        $HomeManagementSetting->contact_no  = $request->contact_no;
        $HomeManagementSetting->youtube_vedio_url  = $request->youtube_vedio_url;


        $HomeManagementSetting->start_date  = $request->start_date;
        $HomeManagementSetting->mobile  = $request->mobile;
        $HomeManagementSetting->facebook_link  = $request->facebook_link;
        $HomeManagementSetting->youtube_link  = $request->youtube_link;
        $HomeManagementSetting->linkedin_link  = $request->linkedin_link;
        $HomeManagementSetting->instagram_link  = $request->instagram_link;
        $HomeManagementSetting->opening_time  = $request->opening_time;
        $HomeManagementSetting->closing_time  = $request->closing_time;
        $HomeManagementSetting->our_mission  = $request->our_mission;
        $HomeManagementSetting->our_vission  = $request->our_vission;
        $HomeManagementSetting->our_focus  = $request->our_focus;
        $HomeManagementSetting->about_us_card  = $request->about_us_card;
        $HomeManagementSetting->founder_name  = $request->founder_name;



        $HomeManagementSetting->user_id = Auth::id();
        $HomeManagementSetting->save();

        return response()->json([
            'status' => 'success',
            'message' => "Setting Update Successfully"
        ]);
    }
}
