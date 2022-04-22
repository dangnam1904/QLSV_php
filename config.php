<?php
$host = "localhost";
$user = "root";
$pass = "dangnam";
$database = "qldt";

$page_title = 'Hệ thống Quản lý sinh viên';
$page_keywords = 'Hê thống, đào tạo, quản lý, quản lý sinh viên';
$page_description = 'Hệ thống Quản lý đào tạo - Trường Đại Học Vinh';


require_once("./libs/db.php");
require_once("./libs/common.php"); 

define('ROOT_DIR', "");
 
define ("IMAGES_DIR", ROOT_DIR."images" );
define ("LIBS_DIR", ROOT_DIR."libs");
