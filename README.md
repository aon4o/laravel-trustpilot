# TrustPilot scraper for Laravel applications.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/aon2003/laravel-trustpilot.svg?style=flat-square)](https://packagist.org/packages/aon2003/laravel-trustpilot)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/aon2003/laravel-trustpilot/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/aon2003/laravel-trustpilot/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/aon2003/laravel-trustpilot/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/aon2003/laravel-trustpilot/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/aon2003/laravel-trustpilot.svg?style=flat-square)](https://packagist.org/packages/aon2003/laravel-trustpilot)

This is a simple Laravel package for scraping TrustPilot scores and reviews.

## Support us

[![Buy Me A Coffee](https://cdn.buymeacoffee.com/buttons/default-pink.png)](https://www.buymeacoffee.com/aon4o)

## Installation

You can install the package via composer:

```bash
composer require aon2003/laravel-trustpilot
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="trustpilot-config"
```

This is the contents of the published config file:

```php
return [
    /*
     |--------------------------------------------------------------------------
     | Default Domain
     |--------------------------------------------------------------------------
     |
     | This is the domain for which the reviews will be scraped by default.
     | Supports subdomains.
     */
    'domain' => 'www.example.com',

    /*
     |--------------------------------------------------------------------------
     | Default Language
     |--------------------------------------------------------------------------
     |
     | This is the language in which the reviews will be scraped by default.
     |
     | Supported values: "all", ISO 639-1 language codes (ex.: "en", "ru")
     |
     */
    'language' => 'all',
];
```

## Usage

```php
$score = LaravelTrustpilot::getScore($domain); // float
$reviews = LaravelTrustpilot::getReviews($domain, $language); // array<stdClass>
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [aon4o](https://github.com/aon2003)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
