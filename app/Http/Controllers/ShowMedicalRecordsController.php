<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ShowMedicalRecordsRequest;
use App\Models\FiscalYear;
use App\Usecases\ShowMedicalRecordsUsecase;
use App\ViewModels\MedicalRecordsViewModel;
use Illuminate\Contracts\View\View;

class ShowMedicalRecordsController extends Controller
{
    public function __invoke(ShowMedicalRecordsRequest $request, ShowMedicalRecordsUsecase $usecase): View
    {
        // デフォルトを今年度の値として、未来の年度が指定された場合は今年度として扱うようにする
        $fiscalYear = FiscalYear::now();
        if ($request->has('fy') && (int)$request->input('fy') < $fiscalYear->year()) {
            $fiscalYear = new FiscalYear((int)$request->input('fy'));
        }

        $output = $usecase($fiscalYear);

        return view('medical-records', [
            'medicalRecordsViewModel' => new MedicalRecordsViewModel($fiscalYear, $output->medicalRecords),
        ]);
    }
}
