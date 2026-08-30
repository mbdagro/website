<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallary;
use App\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Yajra\Datatables\Datatables;
use Image;
use App\Helper\Helper;
use Illuminate\Support\Facades\Storage;

class GallaryController extends Controller
{
    public function Gallary()
    {
        $Category = Category::get();
        return view('admin.gallary', compact('Category'));
    }


    public function GallaryInsertUpdate(Request $request)
    {
        if ($request->has('delete')) {
            $query = Gallary::find($request->delete);
            $query->delete();
            $message = ' Deleted Successfully!';
        } else {
            $request->validate(array(
                'name'    =>  'required',
            ));

            $message = 'Create Successfully!';

            if ($request->has('id')) {
                $query = Gallary::find($request->id);
                $message = 'Updated Successfully!';

                if (!$query) {
                    return response()->json([
                        'status' => "error",
                        'message' => "Not Found, Please Try Again..."
                    ], 422);
                }
            } else {
                $query = new Gallary;
                $query->user_id = Auth::id();
            }



            if ($request->hasFile('image')) {
                $query->image = Helper::uploadAttachment(
                    $request->file('image'),
                    'gallary_image',
                    $query->image ?? null
                );
            }
            $oldMultiImages = $query->multi_image ?? [];
            if (is_string($oldMultiImages)) {
                $oldMultiImages = json_decode($oldMultiImages, true) ?: [];
            }
            if (!is_array($oldMultiImages)) {
                $oldMultiImages = [];
            }
            $existingMultiImages = $request->input('existing_multi_image', []);
            if (!is_array($existingMultiImages)) {
                $existingMultiImages = [];
            }
            $removedImages = array_diff($oldMultiImages, $existingMultiImages);
            if (!empty($removedImages)) {
                $disk = config('filesystems.voucher_disk', 'public');
                foreach ($removedImages as $removedImage) {
                    Storage::disk($disk)->delete($removedImage);
                }
            }
            if ($request->hasFile('multi_image')) {
                foreach ($request->file('multi_image') as $file) {
                    $existingMultiImages[] = Helper::uploadAttachment($file, 'gallary_multi_image', null);
                }
            }
            $query->multi_image = $existingMultiImages;
            $query->name = $request->name;
            $query->type = $request->type;
            $query->title  = $request->title;
            $query->sort_des = $request->sort_des;
            $query->long_des = $request->long_des;
            $query->user_id = Auth::id();
            $query->save();
        }
        return response()->json([
            'status' => "success",
            'message' => $message
        ]);
    }

    public function GallaryEditData(Request $request)
    {
        $query = Gallary::select('id', 'type', 'category_id', 'name', 'title', 'sort_des', 'long_des', 'image', 'multi_image')->find($request->id);
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
    public function GallaryData(Request $request)
    {
        $Gallary = Gallary::orderBy('id', 'desc')
            ->select('id', 'category_id', 'type', 'name', 'title', 'sort_des', 'long_des', 'image', 'user_id')
            ->get();
        $this->i = 1;
        return DataTables::of($Gallary)
            ->addColumn('user_id', function ($data) {
                return $data->User->name;
            })

            ->addColumn('image', function ($data) {
                if (!$data->image) {
                    return '<span>No Image</span>';
                }

                $disk      = config('filesystems.voucher_disk', 'public'); // ✅ fixed
                $url       = Storage::disk($disk)->url($data->image);
                $extension = strtolower(pathinfo($data->image, PATHINFO_EXTENSION));

                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    return '<img src="' . $url . '" border="0" width="60" class="img-rounded" align="center" />';
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
}
