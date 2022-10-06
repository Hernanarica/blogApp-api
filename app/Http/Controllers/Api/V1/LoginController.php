<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function store(Request $request)
	{
		if (Auth::attempt($request->only('email', 'password'))) {
			$token = auth()->user()->createToken('access_token')->plainTextToken;
			
			return response()->json([
				'status'       => 'success',
				'data'         => auth()->user(),
				'access_token' => $token
			]);
		}
	}
}
