<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\Birthdate;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\Uid\Ulid;

class UserFactory
{
    public static function factory(?Ulid $userId = null, ?string $name = null, ?Birthdate $birthdate = null): User
    {
        $userId ??= Str::ulid();
        $name ??= fake()->name;
        $birthdate ??= Birthdate::factory(fake()->dateTimeBetween('-60years', '-10years')->format('Y-m-d'));

        $user = new User($userId, $name, $birthdate);

        DB::table('user')->insert([
            ['user_id' => $user->getUserId(), 'name' => $user->getName(), 'birthdate' => $user->getBirthdate()->showBirthdate()],
        ]);

        return $user;
    }
}
