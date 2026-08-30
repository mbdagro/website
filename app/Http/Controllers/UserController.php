<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use DataTables;

class UserController extends Controller
{

	public function profile()
	{
		$users = Auth::User();

		return view('admin.profile', compact('users'));
	}

	public function profileUpdate(Request $request)
	{
		$this->validate($request, [
			'name' => ['required', 'string', 'max:255'],
			'mobile' => ['required', 'string', 'max:255'],
			'address' => ['required', 'string', 'max:255']
		]);

		$user = Auth::User();
		$user->name = $request->name;
		$user->mobile = $request->mobile;
		$user->company = $request->business_name;
		$user->email = $request->email;
		$user->house_no = $request->flat_house;
		$user->road_no = $request->road_no;
		$user->address = $request->address;
		if (!empty($request->current_password)) {
			if (Hash::check($request->current_password, $user->password)) {
				$this->validate($request, [
					'current_password' => ['required', 'string', 'max:255'],
					'new_password' => ['required', 'string', 'max:255']
				]);
				$user->password = Hash::make($request->new_password);
			} else {
				return response()->json([
					'status' => "error",
					'message' => "The old password does not match our records."
				], 422);
			}
		}
		$user->save();
		return response()->json([
			'status' => "success",
			'message' => "Profile Update Successfully",
		]);
	}

	public function UserListData(Request $request)
	{
		$Users = User::get();

		return DataTables::of($Users)
			// ->addColumn('role', function ($data){
			// $roleData = $data->getRoleNames()[0];
			// $output = str_replace(',,', ',', $roleData);
			// return ucfirst(trim($output, ','));
			// })
			->addColumn('action', function ($data) {
				return '<a href="' . route('user_management', ["id" => $data->id]) . '" data-id="' . $data->id . '" class="btn btn-info btn-sm tableEdit"><i class="fa fa-edit"></i></a>
		<a href="javascript:void(0)" data-id="' . $data->id . '" class="btn btn-danger btn-sm tableDelete"><i class="fa fa-trash"></i></a>';
			})
			->toJson();
	}


	public function UserListDataOnlyUser(Request $request)
	{
		$Users = User::role(['user'])->get();

		return DataTables::of($Users)
			//	->addColumn('role', function ($data){
			// $roleData = $data->getRoleNames()[0];
			// $output = str_replace(',,', ',', $roleData);
			// return ucfirst(trim($output, ','));
			// })
			->toJson();
	}

	public function user_management($users = null)
	{
		if ($users) {
			$users = User::find($users);
		}

		return view('admin.user_management', compact('users'));
	}

	public function client_list($users = null)
	{
		if ($users) {
			$users = User::find($users);
		}

		return view('admin.client_list', compact('users'));
	}

	public function user_management_update(Request $request)
	{
		if ($request->has('id')) {
			$this->validate($request, [
				'name' => ['required', 'string', 'max:255'],
				'mobile' => ['required', 'string', 'max:255']
			]);
			$user = User::find($request->id);
		} else {
			$this->validate($request, [
				'name' => ['required', 'string', 'max:255'],
				'mobile' => ['required', 'string', 'max:255', 'unique:users']
			]);
			$user = new User;
		}

		$user->name = $request->name;
		$user->mobile = $request->mobile;
		if (!empty($request->password)) {
			$user->password = Hash::make($request->password);
		}
		$user->save();
		//$user->syncRoles($request->user_role);

		return response()->json([
			'status' => "success",
			'massage' => "New User Register Successfuly",
		]);
	}
}