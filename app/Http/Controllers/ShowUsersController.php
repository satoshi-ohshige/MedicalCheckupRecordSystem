<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Usecases\ShowUsersUsecase;
use Illuminate\Contracts\View\View;

class ShowUsersController extends Controller
{
    public function __invoke(ShowUsersUsecase $usecase): View
    {
        $output = $usecase();

        return view('users', ['users' => $output->users]);
    }
}
