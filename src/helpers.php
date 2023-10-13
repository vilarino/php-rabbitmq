<?php

if (!function_exists('shutdown')) {
    function shutdown($channel, $connection)
    {
        $channel->close();
        $connection->close();
    }
}
