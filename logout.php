<?php
    include'_dbconnect.php';
    session_destroy();
    header('location:index.php');
?>