<?php

namespace App\Infra\Logger;

class NullLogger extends AbstractLogger
{
    /**
     * @param string $level
     * @param string $message
     * @param array $context
     * @return void
     */
    public function log(string $level, string $message, array $context = [])
    {
        //var_dump($level, $message, $context); exit;
        // TODO: Implement log() method.
    }
}