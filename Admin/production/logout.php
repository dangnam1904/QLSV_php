<?php
session_start();
?>

<?php

    if(isset($_SESSION['username'])){
        unset($_SESSION['username']);
        header("location: login.php");
    }
?>