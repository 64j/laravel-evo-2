<?php

$environment = stripos($_SERVER['REQUEST_URI'], '/manager') !== false ? 'manager' : 'app';

require_once $environment . '/public/index.php';
