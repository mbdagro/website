<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class DocumentController extends Controller
{
    public $i = 1;

    public function index()
    {
        return view('admin.documents');
    }

    public function getData(Request $request)
    {
        $data    = Document::orderBy('sort_order', 'asc')->select('id', 'title', 'pdf', 'is_active', 'sort_order', 'created_at');
        $this->i = 1;

        return DataTables::of($data)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('pdf', function ($data) {
                if (!$data->pdf) return '<span class="text-muted">No PDF</span>';
                return '<a href="' . route('document.download', $data->id) . '" class="btn btn-outline-secondary btn-sm"><i class="fa fa-file-pdf-o"></i> Download</a>';
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
            ->rawColumns(['pdf', 'is_active', 'action'])
            ->toJson();
    }

    public function insert(Request $request)
    {
        // ── DELETE ──────────────────────────
        if ($request->has('delete')) {
            $document = Document::find($request->delete);
            if ($document) {
                $document->delete();
                return response()->json(['status' => 'success', 'message' => 'Document Deleted Successfully!']);
            }
            return response()->json(['status' => 'error', 'message' => 'Not Found!'], 422);
        }

        // ── VALIDATE ────────────────────────
        $isUpdate = $request->has('id') && !empty($request->id);

        $request->validate([
            'title'      => 'required|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'pdf'        => $isUpdate ? 'nullable|mimes:pdf|max:10240' : 'required|mimes:pdf|max:10240',
        ]);

        // ── UPDATE ──────────────────────────
        if ($isUpdate) {
            $document = Document::find($request->id);
            if (!$document) return response()->json(['status' => 'error', 'message' => 'Not Found!'], 422);
            $message = 'Document Updated Successfully!';
        } else {
            // ── CREATE ──────────────────────
            $document = new Document();
            $message  = 'Document Created Successfully!';
        }

        if ($request->hasFile('pdf')) {
            $document->pdf = Helper::uploadAttachment(
                $request->file('pdf'),
                'documents',
                $document->pdf ?? null
            );
        }

        $document->title      = $request->title;
        $document->sort_order = $request->sort_order ?? 0;
        $document->is_active  = $request->has('is_active') ? 1 : 0;
        $document->save();

        return response()->json(['status' => 'success', 'message' => $message]);
    }

    public function edit(Request $request)
    {
        $document = Document::find($request->id);
        if (!$document) return response()->json(['status' => 'error', 'message' => 'Not Found!'], 422);
        return response()->json(['status' => 'success', 'data' => $document]);
    }

    public function download($id)
    {
        $document = Document::find($id);
        if (!$document || !$document->pdf) {
            abort(404, 'PDF Not Found!');
        }

        $disk = config('filesystems.voucher_disk', 'public');

        if (!Storage::disk($disk)->exists($document->pdf)) {
            abort(404, 'File Missing on Server!');
        }

        return Storage::disk($disk)->download(
            $document->pdf,
            Str::slug($document->title) . '.pdf'
        );
    }
}
