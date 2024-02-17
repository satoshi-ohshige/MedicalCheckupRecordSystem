<?php

namespace App\Console\Commands;

use App\Exceptions\UserNotFoundException;
use App\Models\CheckupCourse;
use App\Models\FiscalYear;
use App\Models\MedicalRecord;
use App\Usecases\ShowUserDetailUsecase;
use Illuminate\Console\Command;
use Symfony\Component\Uid\Ulid;

class ShowUserDetailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:show-user-detail {userId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ユーザー詳細を表示';

    /**
     * Execute the console command.
     */
    public function handle(ShowUserDetailUsecase $usecase): int
    {
        $userId = $this->argument("userId");
        if (!Ulid::isValid($userId)) {
            $this->warn("ユーザーが存在しません: {$userId}");
            return self::FAILURE;
        }

        try {
            $output = $usecase(Ulid::fromString($userId));
        } catch (UserNotFoundException) {
            $this->warn("ユーザーが存在しません: {$userId}");
            return self::FAILURE;
        }

        $user = $output->user;
        $this->info('ユーザー詳細');
        $this->line('ユーザーID: ' . $user->getUserId());
        $this->line('名前: ' . $user->getName());
        $this->line('生年月日: ' . $user->getBirthdate()->showBirthdate());
        $this->line('年度年齢: ' . $user->getBirthdate()->calculateFiscalAge() . '歳');
        $this->line('今年度の受診コース: ' . CheckupCourse::getDefaultCourse($user->getBirthdate()->calculateFiscalAge())->label());

        $this->newLine();

        $medicalRecords = $output->medicalRecords;
        $this->info('受診記録一覧');
        $this->table([
            '受診年度', '受診日', '受診コース', '受診場所',
        ], collect($medicalRecords)->map(fn (MedicalRecord $medicalRecord) => [
            FiscalYear::factory($medicalRecord->getCheckupDate())->year() . '年度',
            $medicalRecord->getCheckupDate()->format('Y-m-d'),
            $medicalRecord->getCourse()->label(),
            $medicalRecord->getPlace(),
        ]));

        return self::SUCCESS;
    }
}
