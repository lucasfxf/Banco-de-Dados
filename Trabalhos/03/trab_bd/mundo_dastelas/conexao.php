<?php

if (!defined('DB_HOST')) {
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'mundo_dastelas');
}


if (!isset($GLOBALS['mysqli']) || !$GLOBALS['mysqli'] instanceof mysqli) {
    $GLOBALS['mysqli'] = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($GLOBALS['mysqli']->connect_errno) {
        die('Falha na conexão com o banco: ' . $GLOBALS['mysqli']->connect_error);
    }

    $GLOBALS['mysqli']->set_charset('utf8mb4');
}


$mysqli = $GLOBALS['mysqli'];
?>
