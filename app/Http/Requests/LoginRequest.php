<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Validator;

class LoginRequest extends FormRequest
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
	
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules(): array
	{
		return [
			'email'    => ['required', 'email'],
			'password' => ['required'],
		];
	}
	
	public function messages(): array
	{
		return [
			'email.required'    => 'El email es requerido',
			'email.email'       => 'Formato de email invalido',
			'password.required' => 'La contraseña es requerida',
		];
	}
}