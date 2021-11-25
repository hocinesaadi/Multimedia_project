<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    include('../config.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    $result=$conn->query("SELECT * FROM `users`");
    $row=$result->fetch_assoc();
    while ($row=$result->fetch_assoc()) {
        if ($username == $row['username'] and $password == $row['password']){
                $name=$row['name'];
                $mat=$row['matricule'];
                $pic_id=$row['pic_id'];
                $cover_id=$row['cover_id'];

            $_SESSION['login']=array();
            array_push($_SESSION['login'],$name,$username,$mat,$pic_id,$cover_id);

            return header("location:../pages/profile.php");
        }
        else{
            return header("location:../pages/login.php?error=username or password incorrect");
        }
    }
}

    ?>