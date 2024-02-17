<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions\UserNotFoundException;
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

        try {
            $output = $usecase(Ulid::fromString($userId));
        } catch (UserNotFoundException) {
            abort(404);
        }

        return view('create-record', [
            'user' => new UserViewModel($output->user),
            'courses' => CheckupCourse::cases(),
        ]);
    }
}
