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
			$image = new ImageService($request->file('upload'), public_path('uploads'));
			$image->saveImage();
			
			return response()->json([
				'url' => 'http://127.0.0.1:8000/uploads/' . $image->imageName
			]);
			
		} catch (Exception $e) {
			return response()->json([
				'error' => 'Ocurrió un error al subir la imagen'
			]);
		}
	}
}
