<?php

$_SERVER['REQUEST_URI'] = dirname($_SERVER['SCRIPT_NAME']);
$_SERVER['SCRIPT_FILENAME'] = str_replace(DIRECTORY_SEPARATOR, '/', realpath('../index.php'));
$_SERVER['PHP_SELF'] =
$_SERVER['SCRIPT_NAME'] = str_replace('/' . basename(__DIR__) . '/', '/', $_SERVER['SCRIPT_NAME']);

require_once '../public/index.php';
