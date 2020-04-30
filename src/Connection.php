<?php

namespace Krasfree\AtolClient;

/**
 * Class Connection
 * @package AtolClient
 */
class Connection
{
    public $apiUrl = 'http://127.0.0.1:16732';

    public $attempts = 5;

    public $attemptsCheckStatus = 5;

    public $debug = true;

    public function isDebug(): bool
    {
        return $this->debug;
    }
}