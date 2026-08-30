<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OurTeam;
use App\Models\OurDirector;
use App\Models\AuthoritySpeech;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Yajra\Datatables\Datatables;
use Image;
use App\Helper\Helper;
use Illuminate\Support\Facades\Storage;

class OurTeamController extends Controller
{
    public function OurTeam()
    {
        $OurTeam = OurTeam::get();
        return view('admin.our_team', compact('OurTeam'));
    }

    public function OurTeamInsertUpdate(Request $request)
    {
        if ($request->has('delete')) {
            $query = OurTeam::find($request->delete);
            $query->delete();
            $message = ' Deleted Successfully!';
        } else {
            $request->validate(array(
                'name'    =>  'required',
            ));

            $message = 'Create Successfully!';

            if ($request->has('id')) {
                $query = OurTeam::find($request->id);
                $message = 'Updated Successfully!';

                if (!$query) {
                    return response()->json([
                        'status' => "error",
                        'message' => "Not Found, Please Try Again..."
                    ], 422);
                }
            } else {
                $query = new OurTeam;
                $query->user_id = Auth::id();
            }



            // if ($request->hasFile('image')) {

            //     $old_img = public_path($request->image);
            //     if (file_exists($old_img)) {
            //         @unlink($old_img);
            //     }




            //     $image = $request->file('image');
            //     $imageName = time() . '_' . $image->getClientOriginalName();
            //     $directory = 'upload/member-images/';
            //     $image->move(public_path($directory), $imageName);
            //     $imageUrl = $directory . $imageName;
            //     $query->image = $imageUrl;
            // }
            if ($request->hasFile('image')) {
                $query->image = Helper::uploadAttachment(
                    $request->file('image'),
                    'member_images',
                    $query->image ?? null
                );
            }

            $query->name = $request->name;
            $query->designation  = $request->designation;
            $query->education = $request->education;
            $query->user_id = Auth::id();
            $query->save();
        }
        return response()->json([
            'status' => "success",
            'message' => $message
        ]);
    }

    public function OurTeamEditData(Request $request)
    {
        $query = OurTeam::select('id', 'name', 'designation', 'education', 'image', 'image')->find($request->id);
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

    public function OurTeamData(Request $request)
    {
        $OurTeam = OurTeam::orderBy('id', 'desc')
            ->select('id', 'name', 'designation', 'education', 'image', 'image', 'user_id')
            ->get();
        $this->i = 1;
        return DataTables::of($OurTeam)
            ->addColumn('user_id', function ($data) {
                return $data->User->name;
            })
            ->addColumn('image', function ($data) {
                if (!$data->image) {
                    return '<span>No Image</span>';
                }
                $disk = config('filesystems.voucher_disk', 'public');
                $url = Storage::disk($disk)->url($data->image);
                $extension = strtolower(pathinfo($data->image, PATHINFO_EXTENSION));
                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    return '<img src="' . $url . '"border="0" width="60" class="img-rounded" align="center" />';
                }
                return '<span>No Image</span>';
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

    public function OurDirector()
    {
        // $OurDirector = OurDirector::get();
        return view('admin.our_director');
    }

    public function OurDirectorInsertUpdate(Request $request)
    {
        if ($request->has('delete')) {
            $query = OurDirector::find($request->delete);
            $query->delete();
            $message = ' Deleted Successfully!';
        } else {
            $request->validate(array(
                'name'    =>  'required',
            ));

            $message = 'Create Successfully!';

            if ($request->has('id')) {
                $query = OurDirector::find($request->id);
                $message = 'Updated Successfully!';

                if (!$query) {
                    return response()->json([
                        'status' => "error",
                        'message' => "Not Found, Please Try Again..."
                    ], 422);
                }
            } else {
                $query = new OurDirector;
                $query->user_id = Auth::id();
            }

            if ($request->hasFile('image')) {

                $old_img = public_path($request->image);
                if (file_exists($old_img)) {
                    @unlink($old_img);
                }

                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $directory = 'upload/member-images/';
                $image->move(public_path($directory), $imageName);
                $imageUrl = $directory . $imageName;
                $query->image = $imageUrl;
            }

            $query->name = $request->name;
            $query->user_id = Auth::id();
            $query->save();
        }
        return response()->json([
            'status' => "success",
            'message' => $message
        ]);
    }

    public function OurDirectorEditData(Request $request)
    {
        $query = OurDirector::select('id', 'name', 'image', 'image')->find($request->id);
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

    public function OurDirectorData(Request $request)
    {
        $OurTeam = OurDirector::orderBy('id', 'desc')
            ->select('id', 'name', 'image', 'user_id')
            ->get();
        $this->i = 1;
        return DataTables::of($OurTeam)
            ->addColumn('user_id', function ($data) {
                return $data->User->name;
                //  return $data->User ? $data->User->name : 'N/A';
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

    public function AuthoritySpeech()
    {
        // $OurDirector = OurDirector::get();
        return view('admin.authority_speech');
    }

    public function AuthoritySpeechInsertUpdate(Request $request)
    {
        if ($request->has('delete')) {
            $query = AuthoritySpeech::find($request->delete);
            $query->delete();
            $message = ' Deleted Successfully!';
        } else {
            $request->validate(array(
                'name'    =>  'required',
            ));

            $message = 'Create Successfully!';

            if ($request->has('id')) {
                $query = AuthoritySpeech::find($request->id);
                $message = 'Updated Successfully!';

                if (!$query) {
                    return response()->json([
                        'status' => "error",
                        'message' => "Not Found, Please Try Again..."
                    ], 422);
                }
            } else {
                $query = new AuthoritySpeech;
                $query->user_id = Auth::id();
            }
            if ($request->hasFile('image')) {

                $old_img = public_path($request->image);
                if (file_exists($old_img)) {
                    @unlink($old_img);
                }

                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $directory = 'upload/member-images/';
                $image->move(public_path($directory), $imageName);
                $imageUrl = $directory . $imageName;
                $query->image = $imageUrl;
            }

            $query->name = $request->name;
            $query->designation  = $request->designation;
            $query->speech = $request->speech;
            $query->user_id = Auth::id();
            $query->save();
        }
        return response()->json([
            'status' => "success",
            'message' => $message
        ]);
    }

    public function AuthoritySpeechEditData(Request $request)
    {
        $query = AuthoritySpeech::select('id', 'name', 'designation', 'speech', 'image', 'image')->find($request->id);
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

    public function AuthoritySpeechData(Request $request)
    {
        $OurTeam = AuthoritySpeech::orderBy('id', 'desc')
            ->select('id', 'name', 'designation', 'speech', 'image', 'user_id')
            ->get();
        $this->i = 1;
        return DataTables::of($OurTeam)
            ->addColumn('user_id', function ($data) {
                return $data->User->name;
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
