<?php
require_once('dbhelp.php');

if( isset($_POST['id'])){
    $id = $_POST['id'];
    $sql= 'delete from dbo_sinhvien where id_sv='.$id;
    execute($sql);
    echo "Xóa thành công";
}