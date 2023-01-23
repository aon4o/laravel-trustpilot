<?php

namespace Aon2003\LaravelTrustpilot;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Aon2003\LaravelTrustpilot\Commands\LaravelTrustpilotCommand;

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
            ->hasMigration('create_laravel-trustpilot_table')
            ->hasCommand(LaravelTrustpilotCommand::class);
    }
}
