<?php 
    session_start();
    $_SESSION = []; //delete session
    session_unset(); //double checking delete session
    session_destroy(); //triple checking delete session
    setcookie('id','', time() -3600);
    setcookie('key','', time() -3600);
    header("Location: login.php");
    exit;




?>