<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Validator;

class UserStoreRequest extends FormRequest
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
			'message' => $validator->errors()->first()
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
			'name'                  => ['required'],
			'email'                 => ['required', 'unique:users', 'email'],
			'password'              => ['required', 'confirmed'],
			'password_confirmation' => ['required'],
		];
	}
	
	public function messages(): array
	{
		return [
			'name.required'                  => 'El nombre es requerido',
			'email.required'                 => 'El email es requerido',
			'email.unique'                   => 'El email ya fue registrado con anterioridad',
			'email.email'                    => 'Formato de email invalido',
			'password.required'              => 'La contraseña es requerida',
			'password.confirmed'             => 'Las contraseñas no coinciden',
			'password_confirmation.required' => 'Las confirmacion de contraseña es requerida',
		];
	}
}