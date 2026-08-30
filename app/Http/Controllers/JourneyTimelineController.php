<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\JourneyTimeline;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JourneyTimelineController extends Controller
{
    public $i = 1;

    public function index()
    {
        return view('admin.journey.index');
    }

    public function getData(Request $request)
    {
        $data    = JourneyTimeline::orderBy('sort_order', 'asc')
            ->select('id', 'year', 'title', 'description', 'image', 'image_position', 'sort_order', 'is_active');
        $this->i = 1;

        return DataTables::of($data)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('image', function ($data) {
                if (!$data->image) {
                    return '<span>No Image</span>';
                }

                $disk      = config('filesystems.voucher_disk', 'public');
                $url       = \Storage::disk($disk)->url($data->image);
                $extension = strtolower(pathinfo($data->image, PATHINFO_EXTENSION));

                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    return '<img src="' . $url . '" border="0" width="60" class="img-rounded" align="center" />';
                }

                return '<span>No Image</span>';
            })
            ->addColumn('is_active', function ($data) {
                return $data->is_active
                    ? '<span class="badge badge-success">Active</span>'
                    : '<span class="badge badge-danger">Inactive</span>';
            })
            ->addColumn('action', function ($data) {
                $html  = '';
                $html .= '<a href="javascript:void(0)" data-id="' . $data->id . '" class="btn btn-info me-2 btn-sm tableEdit"><i class="fa fa-edit"></i></a>';
                $html .= '<a href="javascript:void(0)" data-id="' . $data->id . '" class="btn btn-danger btn-sm tableDelete"><i class="fa fa-trash"></i></a>';
                return $html;
            })
            ->rawColumns(['image', 'is_active', 'action'])
            ->toJson();
    }

    public function insert(Request $request)
    {
        // ── DELETE ──────────────────────────────────────────────
        if ($request->has('delete')) {
            $journey = JourneyTimeline::find($request->delete);
            if ($journey) {
                $journey->delete();
                $message = 'Journey Deleted Successfully!';
            } else {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Not Found, Please Try Again...',
                ], 422);
            }
            return response()->json(['status' => 'success', 'message' => $message]);
        }

        // ── VALIDATE ────────────────────────────────────────────
        $isUpdate = $request->has('id') && !empty($request->id);

        $request->validate([
            'year'           => 'required|digits:4|integer',
            'title'          => 'required|string|max:255',
            'description'    => 'required|string',
            'image_position' => 'required|in:left,right',
            'sort_order'     => 'nullable|integer|min:0',
            'image'          => $isUpdate
                ? 'nullable|image|mimes:jpg,jpeg,png,webp'
                : 'required|image|mimes:jpg,jpeg,png,webp',
        ]);

        // ── UPDATE ──────────────────────────────────────────────
        if ($isUpdate) {
            $journey = JourneyTimeline::find($request->id);
            if (!$journey) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Not Found, Please Try Again...',
                ], 422);
            }
            $message = 'Journey Updated Successfully!';

            // ── CREATE ──────────────────────────────────────────────
        } else {
            $journey = new JourneyTimeline();
            $message = 'Journey Created Successfully!';
        }

        // ── IMAGE UPLOAD (same as GallaryController) ────────────
        if ($request->hasFile('image')) {
            $journey->image = Helper::uploadAttachment(
                $request->file('image'),
                'journey',
                $journey->image ?? null
            );
        }

        $journey->year           = $request->year;
        $journey->title          = $request->title;
        $journey->description    = $request->description;
        $journey->image_position = $request->image_position;
        $journey->sort_order     = $request->sort_order ?? 0;
        $journey->is_active      = $request->has('is_active') ? 1 : 0;
        $journey->save();

        return response()->json(['status' => 'success', 'message' => $message]);
    }

    public function edit(Request $request)
    {
        $journey = JourneyTimeline::find($request->id);
        if (!$journey) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Not Found, Please Try Again...',
            ], 422);
        }

        return response()->json([
            'status' => 'success',
            'data'   => $journey,
        ]);
    }
}
