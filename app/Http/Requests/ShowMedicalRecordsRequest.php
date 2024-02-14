<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowMedicalRecordsRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->prepareFy();
    }

    /**
     * fyが1以上の整数文字列でないなら無視するようにする
     */
    private function prepareFy(): void
    {
        $data = $this->validationData();

        if (!isset($data['fy'])) {
            return;
        }

        if (ctype_digit($data['fy'])) {
            return;
        }

        unset($data['fy']);
        $this->replace($data);
    }
}
