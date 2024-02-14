<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Usecases\ShowUserDetailUsecase;
use App\ViewModels\MedicalRecordViewModel;
use App\ViewModels\UserViewModel;
use Illuminate\Contracts\View\View;
use Symfony\Component\Uid\Ulid;

class ShowUserDetailController extends Controller
{
    public function __invoke(string $userId, ShowUserDetailUsecase $usecase): View
    {
        if (!Ulid::isValid($userId)) {
            abort(404);
        }

        $output = $usecase(Ulid::fromString($userId));

        return view('user-detail', [
            'user' => new UserViewModel($output->user),
            'medicalRecords' => array_map(fn (MedicalRecord $medicalRecord) => new MedicalRecordViewModel($medicalRecord), $output->medicalRecords),
        ]);
    }
}
