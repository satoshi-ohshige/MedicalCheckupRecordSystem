<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SampleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ユーザーの登録
        DB::table('user')->insertOrIgnore([
            ['user_id' => '01HPTV3H6660V8ES126ZEZD14X', 'name' => '島田直樹', 'birthdate' => '1996-04-30'],
            ['user_id' => '01HPTV3J18JTATJXCDFXGGWMTB', 'name' => '山口貴志', 'birthdate' => '1986-08-09'],
            ['user_id' => '01HPTV3JVKWBAA776MWZ28D5X8', 'name' => '北野大輔', 'birthdate' => '1978-07-21'],
            ['user_id' => '01HPTV3KM2YJRBPM7CV0TM4PX5', 'name' => '横山麻衣子', 'birthdate' => '1992-01-30'],
            ['user_id' => '01HPTV3MCR7GS2HPH6J634BVDQ', 'name' => '岡美樹', 'birthdate' => '1984-11-02'],
        ]);

        // 受診記録の登録
        DB::table('medical_record')->insertOrIgnore([
            ['medical_record_id' => '01HPTV48TYA0VWKA6SWNYGB64A', 'user_id' => '01HPTV3J18JTATJXCDFXGGWMTB', 'course' => 'basic', 'place' => '東京都新宿区', 'checkup_date' => '2018-01-31'],
            ['medical_record_id' => '01HPTV49K3Y80FQZTRPJZJSYN5', 'user_id' => '01HPTV3KM2YJRBPM7CV0TM4PX5', 'course' => 'basic', 'place' => '神奈川県横須賀市', 'checkup_date' => '2018-08-02'],
            ['medical_record_id' => '01HPTV4AEX8D7A5FTABWMKFDSH', 'user_id' => '01HPTV3J18JTATJXCDFXGGWMTB', 'course' => 'basic', 'place' => '東京都新宿区', 'checkup_date' => '2018-12-10'],
            ['medical_record_id' => '01HPTV4B71H2A87B37TAJQ8220', 'user_id' => '01HPTV3KM2YJRBPM7CV0TM4PX5', 'course' => 'basic', 'place' => '神奈川県横須賀市', 'checkup_date' => '2019-07-11'],
            ['medical_record_id' => '01HPTV4C10VFS43BB0G0AE72S4', 'user_id' => '01HPTV3H6660V8ES126ZEZD14X', 'course' => 'basic', 'place' => '東京都港区', 'checkup_date' => '2019-09-21'],
            ['medical_record_id' => '01HPTV4CTNS6BPTS7TXE3DE9VN', 'user_id' => '01HPTV3J18JTATJXCDFXGGWMTB', 'course' => 'basic', 'place' => '東京都新宿区', 'checkup_date' => '2019-11-13'],
            ['medical_record_id' => '01HPTV4DKZWD7BDE51143QK5SA', 'user_id' => '01HPTV3KM2YJRBPM7CV0TM4PX5', 'course' => 'basic', 'place' => '神奈川県横須賀市', 'checkup_date' => '2020-08-17'],
            ['medical_record_id' => '01HPTV4ED31TZZEKG24H9SRHBN', 'user_id' => '01HPTV3H6660V8ES126ZEZD14X', 'course' => 'basic', 'place' => '東京都練馬区', 'checkup_date' => '2020-08-27'],
            ['medical_record_id' => '01HPTV4F5HECG127FHRRNYGMA5', 'user_id' => '01HPTV3J18JTATJXCDFXGGWMTB', 'course' => 'basic', 'place' => '東京都新宿区', 'checkup_date' => '2021-02-25'],
            ['medical_record_id' => '01HPTV4FYDE1Y1YPVM8FGTCSY4', 'user_id' => '01HPTV3KM2YJRBPM7CV0TM4PX5', 'course' => 'basic', 'place' => '神奈川県横須賀市', 'checkup_date' => '2021-09-08'],
            ['medical_record_id' => '01HPTV4GQXXF3HQSBGP6JJQWB3', 'user_id' => '01HPTV3H6660V8ES126ZEZD14X', 'course' => 'basic', 'place' => '東京都新宿区', 'checkup_date' => '2021-10-25'],
            ['medical_record_id' => '01HPTV4HG9SC7VEAXKY20PJ4QK', 'user_id' => '01HPTV3J18JTATJXCDFXGGWMTB', 'course' => 'complete', 'place' => '東京都渋谷区', 'checkup_date' => '2021-12-11'],
            ['medical_record_id' => '01HPTV4J7F3T4M3812F5E8PXPS', 'user_id' => '01HPTV3JVKWBAA776MWZ28D5X8', 'course' => 'complete', 'place' => '埼玉県さいたま市', 'checkup_date' => '2022-01-30'],
            ['medical_record_id' => '01HPTV4K01AV046X1FGNMSME4G', 'user_id' => '01HPTV3KM2YJRBPM7CV0TM4PX5', 'course' => 'basic', 'place' => '神奈川県横須賀市', 'checkup_date' => '2022-09-01'],
            ['medical_record_id' => '01HPTV4KSAFCGFPPBHTRR4QFPF', 'user_id' => '01HPTV3H6660V8ES126ZEZD14X', 'course' => 'basic', 'place' => '東京都練馬区', 'checkup_date' => '2022-09-22'],
            ['medical_record_id' => '01HPTV4MGS28GFHN2RGJP909C3', 'user_id' => '01HPTV3J18JTATJXCDFXGGWMTB', 'course' => 'complete', 'place' => '東京都渋谷区', 'checkup_date' => '2022-12-01'],
            ['medical_record_id' => '01HPTV4N8PVFFX2KWE6ENCKXZN', 'user_id' => '01HPTV3JVKWBAA776MWZ28D5X8', 'course' => 'complete', 'place' => '埼玉県さいたま市', 'checkup_date' => '2023-01-20'],
            ['medical_record_id' => '01HPTV4P05MZJPS85CV45FKMBY', 'user_id' => '01HPTV3KM2YJRBPM7CV0TM4PX5', 'course' => 'complete', 'place' => '神奈川県横須賀市', 'checkup_date' => '2023-08-22'],
            ['medical_record_id' => '01HPTV4PQN921MXKWA5VWZT8EV', 'user_id' => '01HPTV3H6660V8ES126ZEZD14X', 'course' => 'basic', 'place' => '東京都練馬区', 'checkup_date' => '2023-10-13'],
            ['medical_record_id' => '01HPTV4QEBKS5EWPZZAVD8Y2T4', 'user_id' => '01HPTV3J18JTATJXCDFXGGWMTB', 'course' => 'complete', 'place' => '東京都新宿区', 'checkup_date' => '2024-01-02'],
            ['medical_record_id' => '01HPTV4R7GXAASGERFNVSEHGTK', 'user_id' => '01HPTV3JVKWBAA776MWZ28D5X8', 'course' => 'complete', 'place' => '埼玉県さいたま市', 'checkup_date' => '2024-01-28'],
        ]);
    }
}
