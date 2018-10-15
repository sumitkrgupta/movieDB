<?php

$db['host'] = 'localhost';
$db['user'] = 'root';
$db['pass'] = 'dks@1995';
$db['name'] = 'cms';

foreach($db as $key => $value) {
	define(strtoupper($key), $value);
}

$connect = mysqli_connect(HOST, USER, PASS, NAME);

if(!$connect) {
	echo "Connection failed!";
}

?>