<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return JsonResponse
	 */
	public function store()
	{
		auth()->user()->tokens()->delete();
		
		return response()->json([
			'status' => 'success',
		]);
	}
}