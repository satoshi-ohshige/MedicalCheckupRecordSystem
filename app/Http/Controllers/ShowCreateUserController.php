<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ShowCreateUserController extends Controller
{
    public function __invoke(): View
    {
        return view('sign-up');
    }
}
