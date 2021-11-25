<?php

session_start();
if(empty($_SESSION['login'])){

    return header("location:pages/login.php");

}
?>