<?php
    session_start();
    session_destroy();
    header('Location: ../visao/formAutenticar.php');
    exit();
?>