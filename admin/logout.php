<?php
    include "connection.php";
    include "sessions.php";
    session_destroy();
    header('Location: adminlogin.php');
    exit();
?>