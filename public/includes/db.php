<?php

$db = new mysqli('localhost', 'root', '', 'servicepro');

$db->set_charset('utf8mb4');

if ($db->connect_error) {

    die('Connection Failed: '.$db->connect_error);
}

?>