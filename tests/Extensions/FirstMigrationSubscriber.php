<?php
declare(strict_types=1);

namespace Tests\Extensions;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Artisan;
use PHPUnit\Event\TestRunner\ExecutionStarted;
use PHPUnit\Event\TestRunner\ExecutionStartedSubscriber;

class FirstMigrationSubscriber implements ExecutionStartedSubscriber
{
    public function notify(ExecutionStarted $event): void
    {
        $app = require __DIR__ . '/../../bootstrap/app.php';

        $app->loadEnvironmentFrom('.env');
        $app->make(Kernel::class)->bootstrap();

        Artisan::call('migrate:fresh --seed');
    }
}
