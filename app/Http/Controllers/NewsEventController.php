<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsEvent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Yajra\Datatables\Datatables;
use Image;


class NewsEventController extends Controller
{
    public function NewsEvent()
    {
        return view('admin.news_event');
    }


    public function NewsEventInsertUpdate(Request $request)
    {
        if ($request->has('delete')) {
            $query = NewsEvent::find($request->delete);
            $query->delete();
            $message = ' Deleted Successfully!';
        } else {
            $request->validate(array(
                'name'    =>  'required',
            ));

            $message = 'Create Successfully!';

            if ($request->has('id')) {
                $query = NewsEvent::find($request->id);
                $message = 'Updated Successfully!';

                if (!$query) {
                    return response()->json([
                        'status' => "error",
                        'message' => "Not Found, Please Try Again..."
                    ], 422);
                }
            } else {
                $query = new NewsEvent;
                $query->user_id = Auth::id();
            }

            if ($request->hasFile('image')) {

                $old_img = public_path($request->image);
                if (file_exists($old_img)) {
                    @unlink($old_img);
                }

                $document = $request->file('image');
                $file = 'newsevent_image/' . time() . $request->file('image')->getClientOriginalName();
                Image::make($document)->save(public_path($file));
                $query->image = $file;
            }

            $query->name = $request->name;
            $query->type = $request->type;
            $query->title  = $request->title;
            $query->news_event_date = $request->news_event_date;
            $query->description = $request->description;
            if ($request->has('is_pop_up')) {
                $query->is_pop_up = true;
            } else {
                $query->is_pop_up = false;
            }
            $query->user_id = Auth::id();
            $query->save();
        }
        return response()->json([
            'status' => "success",
            'message' => $message
        ]);
    }

    public function NewsEventEditData(Request $request)
    {
        $query = NewsEvent::select('id', 'name', 'title', 'description', 'news_event_date', 'image', 'is_pop_up')->find($request->id);
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
    public function NewsEventData(Request $request)
    {
        $NewsEvent = NewsEvent::orderBy('id', 'desc')
            ->select('id', 'name', 'title','type','news_event_date', 'description', 'image', 'user_id', 'is_pop_up')
            ->get();
        $this->i = 1;
        return DataTables::of($NewsEvent)
            ->addColumn('user_id', function ($data) {
                return $data->User->name;
            })

            ->addColumn('type', function ($data) {
                return $data->type;
            })
            ->addColumn('is_pop_up', function ($data) {
                if ($data->is_pop_up) {
                    return 'Yes';
                } else {
                    return 'No';
                }
            })
            ->addColumn('image', function ($data) {
                $url = asset("/$data->image");
                return '<img src=' . $url . ' border="0" width="60" class="img-rounded" align="center" />';
            })
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('action', function ($data) {
                $htmlData = '';
                $htmlData .= '<a href="javascript:void(0)" data-id="' . $data->id . '" class="btn btn-info btn-sm tableEdit"><i class="fa fa-edit"></i></a>';
                $htmlData .= '<a href="javascript:void(0)" data-id="' . $data->id . '" class="btn btn-danger btn-sm tableDelete"><i class="fa fa-trash"></i></a>';
                return $htmlData;
            })
            ->rawColumns(['action', 'image'])
            ->toJson();
    }
}
