<?php

namespace Framework\Google;

require_once __DIR__ . '/../vendor/autoload.php';

use Google_Client;

/**
 * ServiceAccountBase
 *
 * A base class for Service Account Authentications
 *
 * @author Raoul de Grunt
 * @package Framework\Google
 * @link https://github.com/googleapis/google-api-php-client/tree/main?tab=readme-ov-file#authentication-with-service-accounts
 * @version 1.0.0
 */
abstract class ServiceAccountBase
{
    /** @var Google_Client @client */
    protected $client;

    function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setAuthConfig(__DIR__ . '/../Credentials/credentials.json');
    }
}