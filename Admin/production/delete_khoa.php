<?php
require_once('dbhelp.php');

if( isset($_GET['id'])){
    $id = $_GET['id'];
   
    $sql= "delete from dbo_khoa where id_khoa='.$id.'";
    execute($sql);
    
    header("Location: khoavien.php");
}