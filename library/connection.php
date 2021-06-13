<?php

$db_config = require '../config/database.php';
$connection = new mysqli($db_config['db_host'],$db_config['db_username'],$db_config['db_password'],$db_config['db_name']);
return [
    'connection' => $connection
];