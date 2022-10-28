<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\v1\LoginResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param LoginRequest $request
	 * @return JsonResponse
	 */
	public function store(LoginRequest $request)
	{
		if (Auth::attempt($request->only('email', 'password'))) {
			
			return (new LoginResource(auth()->user()))->response()->setStatusCode(200);
		}
		
		return response()->json([
			'status'  => 'error',
			'message' => 'Credenciales no validas'
		]);
	}
}