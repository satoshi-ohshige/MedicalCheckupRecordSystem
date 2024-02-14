<?php
declare(strict_types=1);

namespace App\Usecases;

use App\Models\Birthdate;
use App\Models\User;
use App\ViewModels\UsersItemViewModel;
use Illuminate\Support\Str;

final readonly class ShowUsersUsecase
{
    public function __invoke(): ShowUsersUsecaseOutput
    {
        $users = [
            new UsersItemViewModel(new User(Str::ulid(), '島田直樹', Birthdate::factory('1996-04-30')), 5),
            new UsersItemViewModel(new User(Str::ulid(), '山口貴志', Birthdate::factory('1986-08-09')), 12),
            new UsersItemViewModel(new User(Str::ulid(), '北野大輔', Birthdate::factory('1978-07-21')), 23),
            new UsersItemViewModel(new User(Str::ulid(), '横山麻衣子', Birthdate::factory('1992-01-30')), 8),
            new UsersItemViewModel(new User(Str::ulid(), '岡美樹', Birthdate::factory('1984-11-02')), 2),
        ];

        return new ShowUsersUsecaseOutput($users);
    }
}
