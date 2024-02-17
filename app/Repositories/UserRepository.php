<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Birthdate;
use App\Models\User;
use App\ViewModels\UsersItemViewModel;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Uid\Ulid;

class UserRepository implements UserRepositoryInterface
{
    public function findById(Ulid $userId): ?User
    {
        $user = DB::table('user')
            ->select([
                'user_id',
                'name',
                'birthdate',
            ])
            ->where('user_id', $userId)
            ->first();

        if ($user === null) {
            return null;
        }

        return new User($userId, $user->name, Birthdate::factory($user->birthdate));
    }

    /**
     * @return UsersItemViewModel[]
     */
    public function findAll(): array
    {
        $users = DB::table('user')
            ->select([
                'user_id',
                'name',
                'birthdate',
            ])
            ->orderByDesc('user_id')
            ->get();

        if ($users->isEmpty()) {
            return [];
        }

        $medicalRecordCounts = DB::table('medical_record')
            ->selectRaw('user_id, COUNT(medical_record_id) as count')
            ->whereIn('user_id', $users->pluck('user_id'))
            ->groupBy('user_id')
            ->get();

        $medicalRecordMap = $medicalRecordCounts->keyBy('user_id');

        return $users->map(
            fn ($user) => new UsersItemViewModel(User::recreateFromDb($user), $medicalRecordMap[$user->user_id]?->count ?? 0)
        )->all();
    }

    public function insert(User $user): void
    {
        DB::table('user')->insert([
            ['user_id' => $user->getUserId(), 'name' => $user->getName(), 'birthdate' => $user->getBirthdate()->showBirthdate()]
        ]);
    }
}
