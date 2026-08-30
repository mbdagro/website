<?php

namespace App\Http\Controllers;

use App\NoticeBoard;
use App\WhatMakesUsBest;
use App\VideoLink;
use App\Pricing;
use App\Carrer;
use App\ClientReview;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Image;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class NoticeBoardController extends Controller
{
    public function Notice (){
        $notices = NoticeBoard::orderBy('id', 'DESC')->get();
        // return $notices;
        return view('notice_board', compact('notices'));
    }
    public function NoticeBoardEditData(Request $request)
    {
        $query = NoticeBoard::
        select('id','title','publish_date','notice','user_id')
        ->find($request->id);
        if (!$query) {
            return response()->json([
                'status' => "error",
                'message' => "Not Found, Please Try Again..."
            ], 422);
        }

        return response()->json([
            'status' => "success",
            'data' => $query,

        ]);
    }

    public function NoticeBoardData(Request $request)
    {
        $NewsEvent = NoticeBoard::orderBy('id','desc')
        ->select('id','title','publish_date','notice','user_id')
        ->get();
        $this->i=1;
        return DataTables::of($NewsEvent)
        ->addColumn('user_id', function ($data){
            return $data->User->name;
        })

        ->addColumn('id', function ($data){
            return $this->i++;
        })
        ->addColumn('action', function ($data){
            $htmlData='';
           $htmlData .= '<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-info btn-sm tableEdit"><i class="fa fa-edit"></i></a>';
           $htmlData .='<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-danger btn-sm tableDelete"><i class="fa fa-trash"></i></a>';
            return $htmlData;
        })
        ->rawColumns(['action'])
        ->toJson();
    }
    public function NoticeBoardInsertUpdate(Request $request)
    {
        if ($request->has('delete')) {
            $query = NoticeBoard::find($request->delete);
            $query->delete();
            $message = ' Deleted Successfully!';
        } else {
            $request->validate(array(
                'title'    =>  'required',
                'notice' => 'required|mimes:pdf,xlx,csv,txt'
            ));
            $message = 'Create Successfully!';

            if ($request->has('id')) {
                $query = NoticeBoard::find($request->id);
                $message = 'Updated Successfully!';

                if (!$query) {
                    return response()->json([
                        'status' => "error",
                        'message' => "Not Found, Please Try Again..."
                    ], 422);
                }
            } else {
                $query = new NoticeBoard;
                $query->user_id = Auth::id();
            }



            if ($request->hasFile('notice')) {



                $fileName = time().'.'.$request->notice->extension();

                $request->notice->move(public_path('uploads'), $fileName);

                $query->notice = $fileName;
            }

            $query->title  = $request->title;
            $query->publish_date = $request->publish_date;
            // $query->notice = $request->notice;
            $query->user_id = Auth::id();
            $query->save();
        }
        return response()->json([
            'status' => "success",
            'message' => $message
        ]);
    }

    public function NoticeBoard()
    {
        return view('admin.notice_board');
    }

    public function WhatMakesUsBest()
    {
        return view('admin.what_makes_us_best');
    }

    public function WhatMakesUsBestData(Request $request)
    {
        $Query = WhatMakesUsBest::orderBy('id','desc')->get();
        $this->i=1;
        return DataTables::of($Query)
        ->addColumn('user_id', function ($data){
            return $data->User->name;
        })

        ->addColumn('id', function ($data){
            return $this->i++;
        })
        ->addColumn('action', function ($data){
            $htmlData='';
           $htmlData .= '<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-info btn-sm tableEdit"><i class="fa fa-edit"></i></a>';
           $htmlData .='<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-danger btn-sm tableDelete"><i class="fa fa-trash"></i></a>';
            return $htmlData;
        })
        ->rawColumns(['action'])
        ->toJson();
    }

    public function WhatMakesUsBestInsertUpdate(Request $request)
    {
        if ($request->has('delete')) {
            $query = WhatMakesUsBest::find($request->delete);
            $query->delete();
            $message = ' Deleted Successfully!';
        } else {
            $request->validate(array(
                'what_makes_us_best' => 'required'
            ));
            $message = 'Create Successfully!';

            if ($request->has('id')) {
                $query = WhatMakesUsBest::find($request->id);
                $message = 'Updated Successfully!';

                if (!$query) {
                    return response()->json([
                        'status' => "error",
                        'message' => "Not Found, Please Try Again..."
                    ], 422);
                }
            } else {
                $query = new WhatMakesUsBest;
                $query->user_id = Auth::id();
            }

            $query->what_makes_us_best  = $request->what_makes_us_best;
            $query->user_id = Auth::id();
            $query->save();
        }
        return response()->json([
            'status' => "success",
            'message' => $message
        ]);
    }

    public function WhatMakesUsBestEditData(Request $request)
    {
        $query = WhatMakesUsBest::find($request->id);
        if (!$query) {
            return response()->json([
                'status' => "error",
                'message' => "Not Found, Please Try Again..."
            ], 422);
        }

        return response()->json([
            'status' => "success",
            'data' => $query,

        ]);
    }

    public function VideoLink()
    {
        return view('admin.video_link');
    }

    public function VideoLinkInsertUpdate(Request $request)
    {
        if ($request->has('delete')) {
            $query = VideoLink::find($request->delete);
            $query->delete();
            $message = ' Deleted Successfully!';
        } else {
            $request->validate(array(
                'link' => 'required'
            ));
            $message = 'Create Successfully!';

            if ($request->has('id')) {
                $query = VideoLink::find($request->id);
                $message = 'Updated Successfully!';

                if (!$query) {
                    return response()->json([
                        'status' => "error",
                        'message' => "Not Found, Please Try Again..."
                    ], 422);
                }
            } else {
                $query = new VideoLink;
                $query->user_id = Auth::id();
            }

            $query->video_link  = $request->link;
            $query->user_id = Auth::id();
            $query->save();
        }
        return response()->json([
            'status' => "success",
            'message' => $message
        ]);
    }

    public function VideoLinkEditData(Request $request)
    {
        $query = VideoLink::find($request->id);
        if (!$query) {
            return response()->json([
                'status' => "error",
                'message' => "Not Found, Please Try Again..."
            ], 422);
        }

        return response()->json([
            'status' => "success",
            'data' => $query,

        ]);
    }

    public function VideoLinkData(Request $request)
    {
        $Query = VideoLink::orderBy('id','desc')->get();
        $this->i=1;
        return DataTables::of($Query)
        ->addColumn('user_id', function ($data){
            return $data->User->name;
        })

        ->addColumn('id', function ($data){
            return $this->i++;
        })
        ->addColumn('action', function ($data){
            $htmlData='';
           $htmlData .= '<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-info btn-sm tableEdit"><i class="fa fa-edit"></i></a>';
           $htmlData .='<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-danger btn-sm tableDelete"><i class="fa fa-trash"></i></a>';
            return $htmlData;
        })
        ->rawColumns(['action'])
        ->toJson();
    }

    public function Pricing()
    {
        return view('admin.pricing');
    }

    public function PricingInsertUpdate(Request $request)
    {
        if($request->has('delete')){
            $query = Pricing::find($request->delete);
            $query->delete();
            $message = ' Deleted Successfully!';
        }else{
            $request->validate(array(
            'image'    =>  'required',
            ));

            $message = 'Create Successfully!';

            if($request->has('id')){
                $query = Pricing::find($request->id);
                $message = 'Updated Successfully!';

                if(!$query){
                    return response()->json([
                    'status' => "error",
                    'message' => "Not Found, Please Try Again..."
                    ],422);
                }
                }else{
                $query = new Pricing;
                $query->user_id = Auth::id();
            }

            if($request->hasFile('image')){

                $old_img = public_path($request->image);
                if (file_exists($old_img)) {
                    @unlink($old_img);
                }

                $document = $request->file('image');
                $file = 'pricing_image/'.time().$request->file('image')->getClientOriginalName();
                Image::make($document)->save(public_path($file));
                $query->pricing_image = $file;
            }

            $query->save();

            }
        return response()->json([
        'status' => "success",
        'message' => $message
        ]);
    }

    public function PricingData(Request $request)
    {
        $Pricing = Pricing::orderBy('id','desc')->get();
        $this->i=1;
        return DataTables::of($Pricing)
        ->addColumn('user_id', function ($data){
            return $data->User->name;
        })

        ->addColumn('image', function ($data) {
            $url=asset("/$data->pricing_image");
            return '<img src='.$url.' border="0" width="100" class="img-rounded" align="center" />';
        })
        ->addColumn('id', function ($data){
            return $this->i++;
        })
        ->addColumn('action', function ($data){
            $htmlData='';
            // $htmlData .= '<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-info btn-sm tableEdit"><i class="fa fa-edit"></i></a>';
            $htmlData .='<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-danger btn-sm tableDelete"><i class="fa fa-trash"></i></a>';
            return $htmlData;
        })
        ->rawColumns(['action','image'])
        ->toJson();
    }

    public function Carrer()
    {
        return view('admin.carrer');
    }

    public function CarrerInsertUpdate(Request $request)
    {
        if ($request->has('delete')) {
            $query = Carrer::find($request->delete);
            $query->delete();
            $message = ' Deleted Successfully!';
        } else {
            $request->validate(array(
                'position' =>  'required',
                'carrer' => 'required|mimes:pdf,xlx,csv,txt'
            ));
            $message = 'Create Successfully!';

            if ($request->has('id')) {
                $query = Carrer::find($request->id);
                $message = 'Updated Successfully!';

                if (!$query) {
                    return response()->json([
                        'status' => "error",
                        'message' => "Not Found, Please Try Again..."
                    ], 422);
                }
            } else {
                $query = new Carrer;
                $query->user_id = Auth::id();
            }

            if ($request->hasFile('carrer')) {
                $fileName = time().'.'.$request->carrer->extension();
                $request->carrer->move(public_path('uploads'), $fileName);
                $query->carrer = $fileName;
            }

            $query->position  = $request->position;
            $query->publish_date = $request->publish_date;
            // $query->notice = $request->notice;
            $query->user_id = Auth::id();
            $query->save();
        }
        return response()->json([
            'status' => "success",
            'message' => $message
        ]);
    }

    public function CarrerData(Request $request)
    {
        $Carrer = Carrer::orderBy('id','desc')->get();
        $this->i=1;
        return DataTables::of($Carrer)
        ->addColumn('user_id', function ($data){
            return $data->User->name;
        })

        ->addColumn('id', function ($data){
            return $this->i++;
        })
        ->addColumn('action', function ($data){
            $htmlData='';
        //    $htmlData .= '<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-info btn-sm tableEdit"><i class="fa fa-edit"></i></a>';
           $htmlData .='<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-danger btn-sm tableDelete"><i class="fa fa-trash"></i></a>';
            return $htmlData;
        })
        ->rawColumns(['action'])
        ->toJson();
    }

    public function ClientReview()
    {
        return view('admin.client_review');
    }

    public function ClientReviewData(Request $request)
    {
        $ClientReview = ClientReview::orderBy('id','desc')->get();
        $this->i=1;
        return DataTables::of($ClientReview)
        ->addColumn('user_id', function ($data){
            return $data->User->name;
        })

        ->addColumn('image', function ($data) {
            $url=asset("/$data->client_review");
            return '<img src='.$url.' border="0" width="100" class="img-rounded" align="center" />';
        })
        ->addColumn('id', function ($data){
            return $this->i++;
        })
        ->addColumn('action', function ($data){
            $htmlData='';
            // $htmlData .= '<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-info btn-sm tableEdit"><i class="fa fa-edit"></i></a>';
            $htmlData .='<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-danger btn-sm tableDelete"><i class="fa fa-trash"></i></a>';
            return $htmlData;
        })
        ->rawColumns(['action','image'])
        ->toJson();
    }

    public function ClientReviewInsertUpdate(Request $request)
    {
        if($request->has('delete')){
            $query = ClientReview::find($request->delete);
            $query->delete();
            $message = ' Deleted Successfully!';
        }else{
            $request->validate(array(
            'image'    =>  'required',
            ));

            $message = 'Create Successfully!';

            if($request->has('id')){
                $query = ClientReview::find($request->id);
                $message = 'Updated Successfully!';

                if(!$query){
                    return response()->json([
                    'status' => "error",
                    'message' => "Not Found, Please Try Again..."
                    ],422);
                }
                }else{
                $query = new ClientReview;
                $query->user_id = Auth::id();
            }

            if($request->hasFile('image')){

                $old_img = public_path($request->image);
                if (file_exists($old_img)) {
                    @unlink($old_img);
                }

                $document = $request->file('image');
                $file = 'client_review_image/'.time().$request->file('image')->getClientOriginalName();
                Image::make($document)->save(public_path($file));
                $query->client_review = $file;
            }

            $query->save();

            }
        return response()->json([
        'status' => "success",
        'message' => $message
        ]);
    }
}
