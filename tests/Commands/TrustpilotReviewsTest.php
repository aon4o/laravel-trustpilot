<?php

declare(strict_types=1);

use function Pest\Laravel\artisan;

it('returns TrustPilot reviews', function () {
    artisan('trustpilot:reviews')->assertSuccessful();
});

it('returns TrustPilot reviews for domain', function () {
    artisan('trustpilot:reviews google.com')->assertSuccessful();
});

it('returns TrustPilot reviews for domain and language', function () {
    artisan('trustpilot:reviews google.com bg')->assertSuccessful();
});

it('returns TrustPilot domain error', function () {
    artisan('trustpilot:reviews not_a_domain')
        ->expectsOutputToContain("TrustPilot reviews couldn't be retrieved!")
        ->expectsOutputToContain('TrustPilot error! Check if the domain for which you want to get data is registered in TrustPilot.')
        ->assertFailed();
});
