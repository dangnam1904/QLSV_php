<?php

global $db;
$host = "localhost";
$user = "root";
$pass = "dangnam";
$database = "qldt";
$db = @new mysqli($host, $user, $pass, $database);

if ($db->connect_errno){
	die("Không thể kết nối CSDL <br> ". $db->connect_error);
}
$db->query("SET NAMES utf8");

?>