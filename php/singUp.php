<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
     include ('../config.php');
     $nom=$_POST['nom'];
     $mat=$_POST['mat'];
     $username=$_POST['username'];
     $password=$_POST['password'];
     //profile-pic
     $pr_taille = $_FILES['pr-pic']['size'];
     $pr_type = $_FILES['pr-pic']['type'];
     $pr_nom = $_FILES['pr-pic']['name'];
     $pr_blob = file_get_contents ($_FILES['pr-pic']['tmp_name']);
     $ret_pro = false;
     $taille_max = 1000000;
     $ret_pro = is_uploaded_file($_FILES['pr-pic']['tmp_name']);
     $pr = addslashes($pr_blob);
     

     if(!$ret_pro){
        return header("location:../pages/signup.php?error=can't upload profile picture, Try again!");
     }
    if ($pr_taille > $taille_max) {
      return header("location:../pages/signup.php?error=please make sure that the size of profile pic <= 1Mo");
    }
                //cover-pic
          $cover_taille = $_FILES['pr-cover']['size'];
          $cover_type = $_FILES['pr-cover']['type'];
          $cover_nom = $_FILES['pr-cover']['name'];
          $cover_blob = file_get_contents ($_FILES['pr-cover']['tmp_name']);
          $cover = addslashes($cover_blob);
          $ret_cover = is_uploaded_file($_FILES['pr-cover']['tmp_name']);
          if(!$ret_cover){
            return header("location:../pages/signup.php?error=can't upload cover pic");
          }
          
            // $pr_pic =addslashes (file_get_contents($_FILES['pr-pic']['tmp_name']));
            // $pr_cover =addslashes (file_get_contents($_FILES['pr-cover']['tmp_name']));
    
    
            //$bannername=md5($encname).'.'.$bannerexptype;
            //  $bannerpath="../images/".$bannername;
            //  move_uploaded_file($_FILES["image"]["tmp_name"],$bannerpath);
            $result=$conn->query("INSERT INTO `pr-cover` (`img_id`,`img_nom`, `img_taille`, `img_type`, `img_blob`)
            VALUES (null ,'$cover_nom', '$cover_taille','$cover_type','$cover')");
            $userPicCover_id=$conn->insert_id;
            $result=$conn->query("INSERT INTO `pr-pic` (`img_id`,`img_nom`, `img_taille`, `img_type`, `img_blob`)
            VALUES (null ,'$pr_nom', '$pr_taille','$pr_type','$pr')");
            $userPicPr_id=$conn->insert_id;
    
    
            $result=$conn->query("INSERT INTO `users` (`name`,`username`, `matricule`, `password`, `profile_pic`,`cover_pic`)
            VALUES ('$nom' ,'$username', '$mat','$password','$userPicPr_id','$userPicCover_id')");
            $userId= $conn->insert_id;
            $_SESSION['login']=array();
            array_push($_SESSION['login'],$nom,$username,$mat,$userPicPr_id,$userPicCover_id);
    
            return header("location:../pages/profile.php");   
          }
else{
     echo "error";
}
       
?>
