<?php

declare(strict_types=1);

namespace Aon2003\LaravelTrustpilot\Commands;

use Aon2003\LaravelTrustpilot\LaravelTrustpilot;
use ErrorException;
use Illuminate\Console\Command;

/**
 * Command that scrapes and prints TrustPilot reviews.
 */
class TrustpilotReviews extends Command
{
    public $signature = 'trustpilot:reviews
                        {domain? : The domain for which to get the TrustPilot reviews.}
                        {language? : The language in which to get the TrustPilot reviews.}';

    public $description = 'Gets the reviews of a given domain and outputs them to the console.';

    /**
     * @return int
     */
    public function handle(): int
    {
        $domain = $this->argument('domain');

        $language = $this->argument('language');

        try {
            $reviews = LaravelTrustpilot::getReviews($domain, $language);

            foreach ($reviews as $review) {
                $this->info($review->text);
            }

            return self::SUCCESS;
        } catch (ErrorException $exception) {
            $this->error("TrustPilot reviews couldn't be retrieved!");

            $this->error('Error: ' . $exception->getMessage());

            return self::FAILURE;
        }
    }
}
