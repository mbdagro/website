<?php

namespace App\Http\Controllers;

use App\Concern;
use App\Models\SisterProject;
use Illuminate\Support\Facades\Auth;
use Image;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class ConcernController extends Controller
{
    public function ConcernEditData(Request $request)
    {
        $query = Concern::select('id', 'title', 'description', 'logo')->find($request->id);
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
    public function ConcernData(Request $request)
    {
        $NewsEvent = Concern::orderBy('id', 'desc')
            ->select('id', 'title','type', 'description', 'logo', 'user_id')
            ->get();
        $this->i = 1;
        return DataTables::of($NewsEvent)
            ->addColumn('user_id', function ($data) {
                return $data->User->name;
            })

            ->addColumn('type', function ($data) {
                return $data->type;
            })

            ->addColumn('logo', function ($data) {
                $url = asset("/$data->logo");
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
            ->rawColumns(['action', 'logo', 'type'])
            ->toJson();
    }
    public function ConcernInsertUpdate(Request $request)
    {
        if ($request->has('delete')) {
            $query = Concern::find($request->delete);
            $query->delete();
            $message = ' Deleted Successfully!';
        } else {
            $request->validate(array(
                'title'    =>  'required'
            ));

            $message = 'Create Successfully!';

            if ($request->has('id')) {
                $query = Concern::find($request->id);
                $message = 'Updated Successfully!';

                if (!$query) {
                    return response()->json([
                        'status' => "error",
                        'message' => "Not Found, Please Try Again..."
                    ], 422);
                }
            } else {
                $query = new Concern;
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
                $query->logo = $file;
            }
            $query->type = $request->type;
            $query->title  = $request->title;
            $query->description = $request->description;
            $query->user_id = Auth::id();
            $query->save();
        }
        return response()->json([
            'status' => "success",
            'message' => $message
        ]);
    }

    public function Concern()
    {
        return view('admin.concern');
    }

    public function SisterProject()
    {
        $Projects = Concern::get();
        return view('admin.sister_project', compact('Projects'));
    }
    public function SisterProjectInsertUpdate(Request $request)
    {
        if ($request->has('delete')) {
            $query = SisterProject::find($request->delete);
            $query->delete();
            $message = ' Deleted Successfully!';
        } else {
            $request->validate(array(
                'title'    =>  'required'
            ));

            $message = 'Create Successfully!';

            if ($request->has('id')) {
                $query = SisterProject::find($request->id);
                $message = 'Updated Successfully!';

                if (!$query) {
                    return response()->json([
                        'status' => "error",
                        'message' => "Not Found, Please Try Again..."
                    ], 422);
                }
            } else {
                $query = new SisterProject;
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
                $query->logo = $file;
            }
            $query->project_id = $request->project_id;
            $query->title  = $request->title;
            $query->description = $request->description;
            $query->user_id = Auth::id();
            $query->save();
        }
        return response()->json([
            'status' => "success",
            'message' => $message
        ]);
    }

    public function SisterProjectData(Request $request)
    {
        $NewsEvent = SisterProject::with('User')
        ->orderBy('id', 'desc')
        ->select('id', 'title','project_id', 'description', 'logo', 'user_id');
        $this->i = 1;
        return DataTables::of($NewsEvent)
            ->addColumn('user_id', function ($data) {
                return $data->User->name;
            })

            // ->addColumn('Company', function ($data) {
            //     return $data->project_id;
            // })
            ->addColumn('company_name', function ($data) {
                return $data->Project ? $data->Project->title : 'N/A'; // Concern table এর title
            })

            ->addColumn('logo', function ($data) {
                $url = asset("/$data->logo");
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
            ->rawColumns(['action', 'logo', 'type'])
            ->toJson();
    }
    public function SisterProjectEditData(Request $request)
    {
        $query = SisterProject::select('id', 'title', 'description', 'logo', 'project_id')->find($request->id);
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
}
