<?php
    include "connection.php";
    include "session.php";
    session_destroy();
    header('Location: adminlogin.php');
    exit();
?>