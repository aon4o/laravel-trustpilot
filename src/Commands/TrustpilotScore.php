<?php

declare(strict_types=1);

namespace Aon2003\LaravelTrustpilot\Commands;

use Aon2003\LaravelTrustpilot\LaravelTrustpilot;
use ErrorException;
use Illuminate\Console\Command;

/**
 * Command that scrapes and prints TrustPilot score.
 */
class TrustpilotScore extends Command
{
    public $signature = 'trustpilot:score
                        {domain? : The domain for which to get the TrustScore.}';

    public $description = 'Gets the TrustScore of a given domain and outputs it to the console.';

    /**
     * @return int
     */
    public function handle(): int
    {
        $domain = $this->argument('domain');

        try {
            $score = LaravelTrustpilot::getScore($domain);

            $this->info("TrustPilot score -> $score");

            return self::SUCCESS;
        } catch (ErrorException $exception) {
            $this->error("TrustPilot score couldn't be retrieved!");

            $this->error('Error: ' . $exception->getMessage());

            return self::FAILURE;
        }
    }
}
