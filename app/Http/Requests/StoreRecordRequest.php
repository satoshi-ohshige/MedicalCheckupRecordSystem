<?php
declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\CheckupCourse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreRecordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'checkupDate' => ['required', 'date'],
            'course' => ['required', new Enum(CheckupCourse::class)],
            'place' => ['required', 'string', 'max:500'],
        ];
    }

    public function messages(): array
    {
        return [
            'birthdate.before' => ':attributeが未来になっています。'
        ];
    }
}
