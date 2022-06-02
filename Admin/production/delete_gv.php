<?php
require_once('dbhelp.php');

if( isset($_POST['id'])){
    $id = $_POST['id'];
    $sql= 'delete from dbo_giangvien where id_GV='.$id;
    execute($sql);
    echo "Xóa thành công";
}