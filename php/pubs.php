<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    include ('../config.php');

    //cover-pic
    $cover_taille = $_FILES['pr-cover']['size'];
    $cover_type = $_FILES['pr-cover']['type'];
    $cover_nom = $_FILES['pr-cover']['name'];
    $cover_blob = file_get_contents ($_FILES['pr-cover']['tmp_name']);
    $cover = addslashes($cover_blob);

    $pr_cover =addslashes (file_get_contents($_FILES['pr-cover']['tmp_name']));
    $user_mat = $_SESSION['login'][2]; // user matricule

    $result=$conn->query("INSERT INTO `images` (`img_id`,`img_nom`, `img_taille`, `img_type`, `img_blob`,`user_mat`)
     VALUES (null ,'$cover_nom', '$cover_taille','$cover_type','$cover','$user_mat')");
    $userPicCover_id=$conn->insert_id;

    return header("location:../pages/pubs.php");
}else{

    echo "error";


}

?>
