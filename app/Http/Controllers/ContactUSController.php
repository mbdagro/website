<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUS;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Foundation\Auth\RegistersUsers;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Carbon;
	use Yajra\Datatables\Datatables;
	use Image;

class ContactUSController extends Controller
{
  public function ContactUSUpdate(Request $request){
			// dd($request);
			// return true;

				$request->validate(array(
				'full_name'    =>  'required',
				'phone'    =>  'required',
				'address'    =>  'required',
				));

				$message = 'Create Successfully!';

				$query = new ContactUS;
				if($request->hasFile('image')){

				$old_img = public_path($request->image);
				if (file_exists($old_img)) {
					@unlink($old_img);
				}

				$document = $request->file('image');
				$file = 'contact_us_image/'.time().$request->file('image')->getClientOriginalName();
				Image::make($document)->save(public_path($file));
				$query->image = $file;
			}

			$query->full_name = $request->full_name;
			$query->phone = $request->phone;
			$query->email  = $request->email;
			$query->address  = $request->address;
			$query->order_details = $request->order_details;
			$query->product_serivice_id = $request->product_serivice_id;
			$query->save();
			// return response()->json([
			// 'status' => "success",
			// 'message' => $message
			// 'message' => route("contact_us"),
			// ]);
			return redirect(route('contact_us', ["id" => $request->product_serivice_id]));
		}

		public function ContactUsList(){
			return view('admin.contact_list');
		}

		public function ContactUSData(Request $request)
		{
			$ContactUS = ContactUS::orderBy('id','desc')->get();
			$this->i=1;
			return DataTables::of($ContactUS)

			->addColumn('image', function ($data){
                $url=asset("/$data->image");
				return '<img src='.$url.' border="0" width="60" class="img-rounded" align="center" />';
            })
			->addColumn('product_serivice_id',function($data){
				return $data->ProductService? $data->ProductService->code:'';
			})
			->addColumn('id', function ($data){
                return $this->i++;
			})

			->rawColumns(['image'])
			->toJson();
		}
}
