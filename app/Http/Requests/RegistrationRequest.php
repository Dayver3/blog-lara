<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

/**
 *
 */
class RegistrationRequest extends FormRequest
{
    /*
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
   /* public function authorize(): bool
    {
        return true;
    }
*/
    /*
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'nickname' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'password' => 'required',

        ];
    }

    /**
     * @return string
     */
    public function getPasswordHash(): string
    {
        return Hash::make($this->password);
    }
}
