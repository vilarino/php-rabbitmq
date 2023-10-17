<?php

if (!function_exists('shutdown')) {
    function shutdown($channel, $connection)
    {
        $channel->close();
        $connection->close();
    }
}

if (!function_exists('env')) {
    function env(string $var)
    {
        if(isset($_ENV[$var]))
        {
            return $_ENV[$var];
        }
        return false;
    }
}
