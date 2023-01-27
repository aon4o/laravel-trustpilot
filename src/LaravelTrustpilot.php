<?php

declare(strict_types=1);

namespace Aon2003\LaravelTrustpilot;

use ErrorException;
use Goutte\Client;
use stdClass;

/**
 * Main class containing the library functionality.
 */
class LaravelTrustpilot
{
    /**
     * @param string|null $domain
     * @param string|null $language
     * @return stdClass
     */
    public static function scrapeData(?string $domain = null, ?string $language = null): stdClass
    {
        $domain = self::getDomain($domain);

        $language = self::getLanguage($language);

        $url = "https://www.trustpilot.com/review/$domain?languages=$language";

        $page_data = (new Client())->request('GET', $url)->filter('#__NEXT_DATA__')->text();

        $decoded_data = json_decode(html_entity_decode($page_data));

        return $decoded_data->props->pageProps;
    }

    /**
     * Returns the TrustPilot score for the given domain.
     *
     * @param string|null $domain
     * @return float
     * @throws ErrorException
     */
    public static function getScore(?string $domain = null): float
    {
        $page_data = self::scrapeData($domain);

        return $page_data->businessUnit->trustScore;
    }

    /**
     * Returns an object with the TrustPilot reviews for the given domain in the given language.
     *
     * @param string|null $domain
     * @param string|null $language
     * @return array
     * @throws ErrorException
     */
    public static function getReviews(?string $domain = null, ?string $language = null): array
    {
        $page_data = self::scrapeData($domain, $language);

        return $page_data->reviews;
    }

    /**
     * Checks of there is a provided 'domain' variable.
     * If there is not, gets the default 'domain' from the config file.
     *
     * @param string|null $domain
     * @return string
     */
    private static function getDomain(?string $domain = null): string
    {
        if (is_null($domain)) {
            $domain = config('trustpilot.domain');
        }

        return $domain;
    }

    /**
     * Checks of there is a provided 'language' variable.
     * If there is not, gets the default 'language' from the config file.
     *
     * @param string|null $language
     * @return string
     */
    private static function getLanguage(?string $language = null): string
    {
        if (is_null($language)) {
            $language = config('trustpilot.language');
        }

        return $language;
    }
}
