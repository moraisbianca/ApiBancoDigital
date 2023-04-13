<?php

use App\Controller;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url)
{
    default:
        echo("oi");
        //http_response_code(403);
    break;
}
