<?php

require __DIR__ . '/functions.php';

if (!defined('STDIN')) {
    define('STDIN', fopen('php://stdin', 'r'));
}

runProgram();
