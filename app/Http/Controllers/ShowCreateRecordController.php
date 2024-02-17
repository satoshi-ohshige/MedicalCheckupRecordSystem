<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\CheckupCourse;
use App\Usecases\ShowCreateRecordUsecase;
use App\ViewModels\UserViewModel;
use Illuminate\Contracts\View\View;
use Symfony\Component\Uid\Ulid;

class ShowCreateRecordController extends Controller
{
    public function __invoke(string $userId, ShowCreateRecordUsecase $usecase): View
    {
        if (!Ulid::isValid($userId)) {
            abort(404);
        }

        $output = $usecase(Ulid::fromString($userId));

        return view('create-record', [
            'user' => new UserViewModel($output->user),
            'courses' => CheckupCourse::cases(),
        ]);
    }
}
