<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class FaqController extends Controller
{
    public $i = 1;

    public function index()
    {
        return view('admin.faq.index');
    }

    public function getData(Request $request)
    {
        $data = Faq::orderBy('order', 'asc')->select('id', 'question', 'answer', 'order', 'is_active');
        $this->i = 1;

        return DataTables::of($data)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('is_active', function ($data) {
                return $data->is_active
                    ? '<span class="badge badge-success">Active</span>'
                    : '<span class="badge badge-danger">Inactive</span>';
            })
            ->addColumn('action', function ($data) {
                $htmlData = '';
                $htmlData .= '<a href="javascript:void(0)" data-id="' . $data->id . '" class="btn btn-info me-2 btn-sm tableEdit"><i class="fa fa-edit"></i></a>';
                $htmlData .= '<a href="javascript:void(0)" data-id="' . $data->id . '" class="btn btn-danger btn-sm tableDelete"><i class="fa fa-trash"></i></a>';
                return $htmlData;
            })
            ->rawColumns(['is_active', 'action'])
            ->toJson();
    }

    public function insert(Request $request)
    {
        if ($request->has('delete')) {
            $query = Faq::find($request->delete);
            if ($query) {
                $query->delete();
                $message = 'FAQ Deleted Successfully!';
            } else {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Not Found, Please Try Again...',
                ], 422);
            }
        } else {
            $request->validate([
                'question' => 'required',
                'answer'   => 'required',
            ]);

            if ($request->has('id') && !empty($request->id)) {
                $query   = Faq::find($request->id);
                $message = 'FAQ Updated Successfully!';
                if (!$query) {
                    return response()->json([
                        'status'  => 'error',
                        'message' => 'Not Found, Please Try Again...',
                    ], 422);
                }
            } else {
                $query   = new Faq();
                $message = 'FAQ Created Successfully!';
            }

            $query->question  = $request->question;
            $query->answer    = $request->answer;
            $query->order     = $request->order ?? 0;
            $query->is_active = $request->has('is_active') ? 1 : 0;
            $query->save();
        }

        return response()->json([
            'status'  => 'success',
            'message' => $message,
        ]);
    }

    public function edit(Request $request)
    {
        $query = Faq::find($request->id);
        if (!$query) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Not Found, Please Try Again...',
            ], 422);
        }

        return response()->json([
            'status' => 'success',
            'data'   => $query,
        ]);
    }
}
