<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
	use App\Category;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Foundation\Auth\RegistersUsers;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Carbon;
	use Yajra\Datatables\Datatables;
	use Image;

class CategoryController extends Controller
{
    public function Category(){
		return view('admin.category');
	}
	
	
    public function CategoryInsertUpdate(Request $request){
			if($request->has('delete')){
				$query = Category::find($request->delete);
				$query->delete();
				$message = ' Deleted Successfully!';
				}else{
				$request->validate(array(
				'name'    =>  'required',
				));
				
				$message = 'Create Successfully!';
				
				if($request->has('id')){
					$query = Category::find($request->id);
					$message = 'Updated Successfully!';
					
					if(!$query){
						return response()->json([
						'status' => "error",
						'message' => "Not Found, Please Try Again..."
						],422);
					}
					}else{
					$query = new Category;
					$query->user_id = Auth::id();
				}
				
				
				
				if($request->hasFile('image')){
				
				$old_img = public_path($request->image);
				if (file_exists($old_img)) {
					@unlink($old_img);
				}
				
				$document = $request->file('image');
				$file = 'category_image/'.time().$request->file('image')->getClientOriginalName();
				Image::make($document)->save(public_path($file));
				$query->image = $file;
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
		
	public function CategoryEditData(Request $request)
		{
			$query = Category::select('id','name','image')->find($request->id);		
			if(!$query){
				return response()->json([
				'status' => "error",
				'message' => "Not Found, Please Try Again..."
				],422);
			}
			
			return response()->json([
			'status' => "success", 
			'data' => $query, 
			
			]);
			
		}
		public function CategoryData(Request $request)
		{	
			$Category = Category::orderBy('id','desc')
			->select('id','name','image','user_id')
			->get();
			$this->i=1;
			return DataTables::of($Category)
			->addColumn('user_id', function ($data){
                return $data->User->name;
			})
			->addColumn('id', function ($data){
                return $this->i++;
			})
			->addColumn('action', function ($data){
				$htmlData='';
               $htmlData .= '<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-info btn-sm tableEdit"><i class="fa fa-edit"></i></a>';
               $htmlData .='<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-danger btn-sm tableDelete"><i class="fa fa-trash"></i></a>';
				return $htmlData;
			})
			->rawColumns(['action'])
			->toJson();
		}	
}

