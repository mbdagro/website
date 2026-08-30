<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
	use App\Category;
	use App\SubCategory;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Foundation\Auth\RegistersUsers;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Carbon;
	use Yajra\Datatables\Datatables;
	use Image;

class SubCategoryController extends Controller
{
   public function SubCategory(){
		$Category = Category::get();
		return view('admin.sub_category',compact('Category'));
	}
	
	
    public function SubCategoryInsertUpdate(Request $request){
			if($request->has('delete')){
				$query = SubCategory::find($request->delete);
				$query->delete();
				$message = ' Deleted Successfully!';
				}else{
				$request->validate(array(
				'name'    =>  'required',
				));
				
				$message = 'Create Successfully!';
				
				if($request->has('id')){
					$query = SubCategory::find($request->id);
					$message = 'Updated Successfully!';
					
					if(!$query){
						return response()->json([
						'status' => "error",
						'message' => "Not Found, Please Try Again..."
						],422);
					}
					}else{
					$query = new SubCategory;
					$query->user_id = Auth::id();
				}
	
			$query->name = $request->name;
			$query->category_id = $request->category_id;
			$query->user_id = Auth::id();
			$query->save();
			}			
			return response()->json([
			'status' => "success",
			'message' => $message
			]);		
		}
		
	public function SubCategoryEditData(Request $request)
		{
			$query = SubCategory::select('id','category_id','name')->find($request->id);		
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
		public function SubCategoryData(Request $request)
		{	
			$SubCategory = SubCategory::orderBy('id','desc')
			->select('id','category_id','name','user_id')
			->get();
			$this->i=1;
			return DataTables::of($SubCategory)
			->addColumn('user_id', function ($data){
                return $data->User->name;
			})
			->addColumn('category_id', function ($data){
                return $data->Category->name;
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