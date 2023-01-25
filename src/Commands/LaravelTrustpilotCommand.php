<?php

declare(strict_types=1);

namespace Aon2003\LaravelTrustpilot\Commands;

use Illuminate\Console\Command;

class LaravelTrustpilotCommand extends Command
{
    public $signature = 'laravel-trustpilot';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
