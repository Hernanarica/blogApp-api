<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    public static $wrap = 'user';

	/**
	 * Transform the resource into an array.
	 *
	 * @param Request $request
	 * @return array
	 */
	public function toArray($request): array
	{
		return [
			'id'    => $this->id,
			'role' => $this->getRoleNames()->first(),
			'name'  => $this->name,
			'email' => $this->email,
			'image' => $this->image,
		];
	}

	public function with($request): array
	{
		return [
			'status' => 'success',
			'token'  => $this->createToken('token')->plainTextToken,
		];
	}
}
