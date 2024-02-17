<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecordRequest;
use App\Models\CheckupCourse;
use App\Usecases\StoreRecordUsecase;
use Carbon\CarbonImmutable;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\Uid\Ulid;

class StoreRecordController extends Controller
{
    public function __invoke(string $userId, StoreRecordRequest $request, StoreRecordUsecase $usecase): RedirectResponse
    {
        if (!Ulid::isValid($userId)) {
            abort(404);
        }

        $output = $usecase(Ulid::fromString($userId), new CarbonImmutable($request->input('checkupDate')), CheckupCourse::from($request->input('course')), $request->input('place'));

        return redirect(route('user-detail', ['userId' => $userId]));
    }
}
