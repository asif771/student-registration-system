<?php
$hn='localhost';
$un='root';
$pw='';
$db='srs';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);


?>