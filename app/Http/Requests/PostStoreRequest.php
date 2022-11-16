<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostStoreRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}
	
	protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
	{
		throw new HttpResponseException(response()->json([
			'status'  => 'error',
			'errors' => $validator->errors()
		], 400));
	}
	
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules(): array
	{
		return [
			'title'       => ['required', 'max:30'],
			'description' => ['required', 'max:150'],
		];
	}
	
	public function messages(): array
	{
		return [
			'title.required'       => 'Obligatorio',
			'title.max'            => 'Debe tener un máximo de 30 caracteres',
			'description.required' => 'Obligatorio',
			'description.max'      => 'Debe tener un máximo de 150 caracteres',
		];
	}
}
