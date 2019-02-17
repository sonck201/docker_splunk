<?php

session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

require_once 'vendor/autoload.php';

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

$stream = true;

$log = new Logger('SplunkTest');
$log->pushHandler(new StreamHandler($stream === true ? 'php://stdout' : 'log/app.log'));

//date_default_timezone_set('Asia/Tokyo');
//ini_set('date.timezone', 'Asia/Tokyo');
//ini_set('max_file_uploads', env('PHP_MAX_FILE_UPLOADS'));

$arr = [
    'env' => $_ENV,
    'date.timezone' => date_default_timezone_get(),
    'max_file_uploads' => ini_get('max_file_uploads'),
];

$log->debug('Debug', $arr);

dd($_ENV);
