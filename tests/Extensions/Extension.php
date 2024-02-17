<?php
declare(strict_types=1);

namespace Tests\Extensions;

use PHPUnit\Runner\Extension\Extension as BaseExtension;
use PHPUnit\Runner\Extension\Facade;
use PHPUnit\Runner\Extension\ParameterCollection;
use PHPUnit\TextUI\Configuration\Configuration;

class Extension implements BaseExtension
{
    public function bootstrap(Configuration $configuration, Facade $facade, ParameterCollection $parameters): void
    {
        $facade->registerSubscriber(new FirstMigrationSubscriber());
    }
}
