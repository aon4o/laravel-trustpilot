<?php

declare(strict_types=1);

use function Pest\Laravel\artisan;

it('returns TrustPilot score', function () {
    artisan('trustpilot:score')
        ->expectsOutputToContain('TrustPilot score ->')
        ->assertSuccessful();
});

it('returns TrustPilot score for domain', function () {
    artisan('trustpilot:score google.com')
        ->expectsOutputToContain('TrustPilot score ->')
        ->assertSuccessful();
});

it('returns TrustPilot error', function () {
    artisan('trustpilot:score asd')
        ->expectsOutputToContain("TrustPilot score couldn't be retrieved!")
        ->expectsOutputToContain('TrustPilot error! Check if the domain for which you want to get data is registered in TrustPilot.')
        ->assertFailed();
});
