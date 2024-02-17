<?php

namespace Database\Seeders;

use App\Models\CheckupCourse;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 受診コースマスターの登録
        DB::table('checkup_course_master')->insertOrIgnore(array_map(function (CheckupCourse $course) {
            return ['course' => $course->value, 'label' => $course->label()];
        }, CheckupCourse::cases()));
    }
}
