<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostShowResource extends JsonResource
{
    public static $wrap = 'post';

	/**
	 * Transform the resource into an array.
	 *
	 * @param Request $request
	 * @return array
	 */
	public function toArray($request)
	{
		return [
			'title'       => $this->title,
			'description' => $this->description,
			'body'        => $this->body,
			'published'   => $this->published,
		];
	}

	public function with($request): array
	{
		return [
			'status' => 'success'
		];
	}
}
