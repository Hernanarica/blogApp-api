<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\ImageService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageTextEditorController extends Controller
{
	public function store(Request $request)
	{
		try {
			$img       = Image::make($request->file('upload'));
			$imageName = Str::uuid() . '.' . $request->file('upload')->getClientOriginalExtension();
			
			$img->save(public_path('uploads/' . $imageName));
			
			return response()->json([
				'url' => 'http://127.0.0.1:8000/uploads/' . $imageName
			]);
			
		} catch (Exception $e) {
			return response()->json([
				'error' => 'asdf1234'
			]);
		}
	}
}
