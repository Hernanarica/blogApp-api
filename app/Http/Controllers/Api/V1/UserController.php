<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		dd('login..');
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param UserStoreRequest $request
	 * @return JsonResponse
	 */
	public function store(UserStoreRequest $request)
	{
		
		$user = User::create([
			'email'    => $request->email,
			'name'     => $request->name,
			'password' => Hash::make($request->password),
		]);
		
		return response()->json([
			'status' => 'success',
			'data'   => $user
		]);
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @return UserResource
	 */
	public function show()
	{
		return (new UserResource(auth()->user()))->additional([
			'status' => 'success'
		]);
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param int $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		//
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}
