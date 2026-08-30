<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    public $i = 1;

    public function index()
    {
        return view('admin.blogs');
    }

    public function getData(Request $request)
    {
        $data    = Blog::orderBy('sort_order', 'asc')->select('id', 'title', 'image', 'is_active', 'sort_order', 'created_at');
        $this->i = 1;

        return DataTables::of($data)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('image', function ($data) {
                if (!$data->image) return '<span>No Image</span>';
                $disk = config('filesystems.voucher_disk', 'public');
                $url  = Storage::disk($disk)->url($data->image);
                return '<img src="' . $url . '" border="0" width="60" class="img-rounded">';
            })
            ->addColumn('is_active', function ($data) {
                return $data->is_active
                    ? '<span class="badge badge-success">Active</span>'
                    : '<span class="badge badge-danger">Inactive</span>';
            })
            ->addColumn('action', function ($data) {
                $html  = '<a href="javascript:void(0)" data-id="' . $data->id . '" class="btn btn-info me-2 btn-sm tableEdit"><i class="fa fa-edit"></i></a>';
                $html .= '<a href="javascript:void(0)" data-id="' . $data->id . '" class="btn btn-danger btn-sm tableDelete"><i class="fa fa-trash"></i></a>';
                return $html;
            })
            ->rawColumns(['image', 'is_active', 'action'])
            ->toJson();
    }

    public function insert(Request $request)
    {
        // ── DELETE ──────────────────────────
        if ($request->has('delete')) {
            $blog = Blog::find($request->delete);
            if ($blog) {
                $blog->delete();
                return response()->json(['status' => 'success', 'message' => 'Blog Deleted Successfully!']);
            }
            return response()->json(['status' => 'error', 'message' => 'Not Found!'], 422);
        }

        // ── VALIDATE ────────────────────────
        $isUpdate = $request->has('id') && !empty($request->id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'excerpt'     => 'nullable|string',
            'description' => 'nullable|string',
            'sort_order'  => 'nullable|integer|min:0',
            'image'       => $isUpdate ? 'nullable|image|mimes:jpg,jpeg,png,webp' : 'required|image|mimes:jpg,jpeg,png,webp',
        ]);

        // ── UPDATE ──────────────────────────
        if ($isUpdate) {
            $blog = Blog::find($request->id);
            if (!$blog) return response()->json(['status' => 'error', 'message' => 'Not Found!'], 422);
            $message = 'Blog Updated Successfully!';
        } else {
            // ── CREATE ──────────────────────
            $blog    = new Blog();
            $message = 'Blog Created Successfully!';
        }

        if ($request->hasFile('image')) {
            $blog->image = Helper::uploadAttachment(
                $request->file('image'),
                'blogs',
                $blog->image ?? null
            );
        }

        $blog->title       = $request->title;
        $blog->slug        = Str::slug($request->title) . '-' . ($blog->id ?? uniqid());
        $blog->excerpt     = $request->excerpt;
        $blog->description = $request->description;
        $blog->sort_order  = $request->sort_order ?? 0;
        $blog->is_active   = $request->has('is_active') ? 1 : 0;
        $blog->save();

        return response()->json(['status' => 'success', 'message' => $message]);
    }

    public function edit(Request $request)
    {
        $blog = Blog::find($request->id);
        if (!$blog) return response()->json(['status' => 'error', 'message' => 'Not Found!'], 422);
        return response()->json(['status' => 'success', 'data' => $blog]);
    }
}
