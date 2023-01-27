<?php

declare(strict_types=1);

namespace Aon2003\LaravelTrustpilot;

use Aon2003\LaravelTrustpilot\Commands\TrustpilotReviews;
use Aon2003\LaravelTrustpilot\Commands\TrustpilotScore;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelTrustpilotServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-trustpilot')
            ->hasConfigFile()
            ->hasViews()
            ->hasCommand(TrustpilotScore::class)
            ->hasCommand(TrustpilotReviews::class);
    }
}
