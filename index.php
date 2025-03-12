<?php

$ip = $_SERVER['SERVER_ADDR'];
$port = $_SERVER['SERVER_PORT'];
$url = "http://$ip:$port/public/index.php";

header("Location: $url");

exit;

?>