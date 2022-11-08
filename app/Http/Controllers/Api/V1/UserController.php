<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\v1\UserShowResource;
use App\Http\Resources\v1\UserStoreResource;
use App\Models\User;
use App\Services\ImageService;
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
		if ($request->hasFile('image')) {
			$image = new ImageService($request->file('image'), public_path('uploads/profile'));
			$image->resizeImage(100, 100);
			$image->saveImage();
		}
		
		$user = User::create([
			'email'    => $request->email,
			'name'     => $request->name,
			'image'    => $image->imageName ?? 'avatar-default.png',
			'password' => Hash::make($request->password),
		]);
		
		return (new UserStoreResource($user))->response()->setStatusCode(200);
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @return JsonResponse
	 */
	public function show()
	{
		return (new UserShowResource(auth()->user()))->response()->setStatusCode(200);
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
