<?php

declare(strict_types=1);

namespace Apps\Console\Application;

use Shared\Console\AbstractCommand;

final class InstallApplicationCommand extends AbstractCommand
{
    protected $signature = 'app:install';

    public function handle(): int
    {
        return self::SUCCESS;
    }
}
