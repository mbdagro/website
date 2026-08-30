<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductService;
use App\SubCategory;
use App\Category;
use App\Reward;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Yajra\Datatables\Datatables;
use Image;
use App\Helper\Helper;
use Illuminate\Support\Facades\Storage;
class ProductServiceController extends Controller
{

    public function ProductServiceDisplay($categoryID = null, $subCategoryID = null)
    {
        $ProductService = ProductService::query();
        if ($subCategoryID) $ProductService->where('sub_category_id', $subCategoryID);
        if ($categoryID) {
            $ProductService->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('sub_categories')
                    ->where('category_id', request()->id)
                    ->whereRaw('sub_categories.id = product_services.sub_category_id');
            });
        }
        $ProductService = $ProductService->get();
        if ($categoryID) {
            $CategoryName = Category::find($categoryID)->name;
        } elseif ($subCategoryID) {
            $CategoryName = SubCategory::find($subCategoryID)->name;
        } else {
            $CategoryName = 'All Services';
        }

        return view('shop_all_services', compact('ProductService', 'CategoryName'));
    }

    public function ProductService()
    {
        $categories = Category::all();  // get all categories
        return view('admin.product_service', compact('categories'));
    }

    public function ProductServiceInsertUpdate(Request $request)
    {
        if ($request->has('delete')) {
            $query = ProductService::find($request->delete);
            $query->delete();
            $message = ' Deleted Successfully!';
        } else {
            $request->validate(array(
                'name'    =>  'required',
            ));

            $message = 'Create Successfully!';

            if ($request->has('id')) {
                $query = ProductService::find($request->id);
                $message = 'Updated Successfully!';

                if (!$query) {
                    return response()->json([
                        'status' => "error",
                        'message' => "Not Found, Please Try Again..."
                    ], 422);
                }
            } else {
                $query = new ProductService;
                $query->user_id = Auth::id();
            }



            // if ($request->hasFile('image')) {

            //     $old_img = public_path($request->image);
            //     if (file_exists($old_img)) {
            //         @unlink($old_img);
            //     }

            //     $document = $request->file('image');
            //     $file = 'service_image/' . time() . $request->file('image')->getClientOriginalName();
            //     Image::make($document)->save(public_path($file), 90);
            //     $query->image = $file;
            // }
            // if ($request->hasFile('image1')) {

            //     $old_img = public_path($request->image1);
            //     if (file_exists($old_img)) {
            //         @unlink($old_img);
            //     }

            //     $document = $request->file('image1');
            //     $file = 'service_image/' . time() . $request->file('image1')->getClientOriginalName();
            //     Image::make($document)->save(public_path($file), 90);
            //     $query->image1 = $file;
            // }
            // if ($request->hasFile('image2')) {

            //     $old_img = public_path($request->image2);
            //     if (file_exists($old_img)) {
            //         @unlink($old_img);
            //     }

            //     $document = $request->file('image2');
            //     $file = 'service_image/' . time() . $request->file('image2')->getClientOriginalName();
            //     Image::make($document)->save(public_path($file), 90);
            //     $query->image2 = $file;
            // }
            // if ($request->hasFile('image3')) {

            //     $old_img = public_path($request->image3);
            //     if (file_exists($old_img)) {
            //         @unlink($old_img);
            //     }

            //     $document = $request->file('image3');
            //     $file = 'service_image/' . time() . $request->file('image3')->getClientOriginalName();
            //     Image::make($document)->save(public_path($file), 90);
            //     $query->image3 = $file;
            // }

            // if ($request->hasFile('image4')) {

            //     $old_img = public_path($request->image4);
            //     if (file_exists($old_img)) {
            //         @unlink($old_img);
            //     }

            //     $document = $request->file('image4');
            //     $file = 'service_image/' . time() . $request->file('image4')->getClientOriginalName();
            //     Image::make($document)->save(public_path($file), 90);
            //     $query->image4 = $file;
            // }
            if ($request->hasFile('image')) {
                $query->image = Helper::uploadAttachment(
                    $request->file('image'),
                    'gallary_image',
                    $query->image ?? null
                );
            }

            if ($request->hasFile('image1')) {
                $query->image1 = Helper::uploadAttachment(
                    $request->file('image1'),
                    'gallary_image',
                    $query->image1 ?? null
                );
            }

            if ($request->hasFile('image2')) {
                $query->image2 = Helper::uploadAttachment(
                    $request->file('image2'),
                    'gallary_image',
                    $query->image2 ?? null
                );
            }

            if ($request->hasFile('image3')) {
                $query->image3 = Helper::uploadAttachment(
                    $request->file('image3'),
                    'gallary_image',
                    $query->image3 ?? null
                );
            }

            if ($request->hasFile('image4')) {
                $query->image4 = Helper::uploadAttachment(
                    $request->file('image4'),
                    'gallary_image',
                    $query->image4 ?? null
                );
            }

            if ($request->hasFile('reward')) {
                $fileName = time() . '.' . $request->reward->extension();
                $request->reward->move(public_path('uploads'), $fileName);
                $query->reward = $fileName;
            }

            $query->code = $request->code;
            $query->name = $request->name;
            // $query->category = $request->category;
            $query->category_id = $request->category_id;
            $query->progress = $request->progress;
            $query->type = $request->type;
            $query->short_description = $request->short_description;
            $query->description = $request->description;
            $query->video_link = $request->video_link;
            $query->price = $request->price;
            $query->built_year = $request->built_year;
            $query->available_from = $request->available_from;
            $query->floor = $request->floor;
            $query->property_contact = $request->property_contact;
            $query->property_email = $request->property_email;
            $query->room_qty = $request->room_qty;
            $query->bathroom_qty = $request->bathroom_qty;
            $query->garadge_qty = $request->garadge_qty;
            $query->baranda_qty = $request->baranda_qty;
            $query->size = $request->size;
            $query->address = $request->address;
            $query->return_type = $request->return_type;
            $query->per_share = $request->per_share;
            $query->rio = $request->rio;
            $query->duration = $request->duration;
            $query->start_date = $request->start_date;
            $query->end_date = $request->end_date;
            $query->max_unit = $request->max_unit;
            $query->location = $request->location;
            $query->comments = $request->comments;

            $query->meta_author = $request->meta_author;
            $query->meta_title = $request->meta_title;
            $query->meta_description = $request->meta_description;
            $query->meta_keywords = $request->meta_keywords;
            $query->og_title = $request->og_title;
            $query->og_sitename = $request->og_sitename;
            $query->og_description = $request->og_description;
            $query->user_id = Auth::id();
            $query->save();
        }
        return response()->json([
            'status' => "success",
            'message' => $message
        ]);
    }

    public function ProductServiceEditData(Request $request)
    {
        $query = ProductService::find($request->id);
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
    public function ProductServiceData(Request $request)
    {
        $ProductService = ProductService::orderBy('id', 'desc')
            ->select('id', 'code', 'name', 'price', 'description', 'category', 'progress', 'image', 'user_id', 'category_id')
            ->get();
        $this->i = 1;
        return DataTables::of($ProductService)
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

                    return '
            <img src="' . $url . '"
                border="0"
                width="60"
                height="60"
                style="object-fit:cover;border-radius:6px;"
                class="img-rounded"
                align="center" />
        ';
                }

                return '<span>No Image</span>';
            })
            ->addColumn('category_id', function ($data) {
                return $data->CategoryNew ? $data->CategoryNew->name : 'N/A';
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
            ->rawColumns(['action', 'description', 'image'])
            ->toJson();
    }

    public function Reward()
    {
        $ProductServices = ProductService::orderBy('id', 'desc')->where('progress', 'completed')->get();
        return view('admin.reward', compact('ProductServices'));
    }

    public function RewardUpdate(Request $request)
    {
        if ($request->has('delete')) {
            $query = Reward::find($request->delete);
            $query->delete();
            $message = ' Deleted Successfully!';
        } else {
            $request->validate(array(
                'reward'    =>  'required'
            ));

            $message = 'Create Successfully!';

            if ($request->has('id')) {
                $query = Reward::find($request->id);
                $message = 'Updated Successfully!';

                if (!$query) {
                    return response()->json([
                        'status' => "error",
                        'message' => "Not Found, Please Try Again..."
                    ], 422);
                }
            } else {
                $query = new Reward;
                $query->user_id = Auth::id();
            }

            if ($request->hasFile('reward')) {
                $fileName = time() . '.' . $request->reward->extension();
                $request->reward->move(public_path('uploads'), $fileName);
                $query->reward = $fileName;
            }

            $query->product_id = $request->product_service_id;
            $query->user_id = Auth::id();
            $query->save();
        }
        return response()->json([
            'status' => "success",
            'message' => $message
        ]);
    }

    public function RewardData(Request $request)
    {
        $Reward = Reward::orderBy('id', 'desc')->select('id', 'reward', 'user_id')->get();
        $this->i = 1;
        return DataTables::of($Reward)
            ->addColumn('user_id', function ($data) {
                return $data->User->name;
            })
            // ->addColumn('product_id', function ($data){
            //     return $data->Product->name;
            // })
            // ->addColumn('reward', function ($data){
            //     $htmlData='';
            //     $htmlData .='<a href="{{ asset("public/uploads/1695725521.pdf") }}" >'.$data->reward.'</a>';
            //     return $htmlData;
            // })
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('action', function ($data) {
                $htmlData = '';
                //    $htmlData .= '<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-info btn-sm tableEdit"><i class="fa fa-edit"></i></a>';
                $htmlData .= '<a href="javascript:void(0)" data-id="' . $data->id . '" class="btn btn-danger btn-sm tableDelete"><i class="fa fa-trash"></i></a>';
                return $htmlData;
            })
            ->rawColumns(['action', 'reward'])
            ->toJson();
    }

    public function Category()
    {
        return "Hello";
    }
}
