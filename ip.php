<?php
$line = date('Y-m-d H:i:s') . " - $_SERVER[REMOTE_ADDR]\t" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
file_put_contents('ip.log', $line . PHP_EOL, FILE_APPEND);
?> 