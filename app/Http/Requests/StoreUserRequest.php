<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'birthdate' => ['required', 'date', 'before:now'],
        ];
    }

    public function messages(): array
    {
        return [
            'birthdate.before' => ':attributeが未来になっています。'
        ];
    }
}
