<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Birthdate;
use App\Usecases\StoreUserUsecase;
use Illuminate\Http\RedirectResponse;

class StoreUserController extends Controller
{
    public function __invoke(StoreUserRequest $request, StoreUserUsecase $usecase): RedirectResponse
    {
        $output = $usecase($request->input('name'), Birthdate::factory($request->input('birthdate')));

        return redirect(route('user-detail', ['userId' => $output->user->getUserId()]));
    }
}
