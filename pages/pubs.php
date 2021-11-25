<?php

session_start();
if(empty($_SESSION['login'])){

    return header("location:/../pages/login.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body{
            height: 100%;
            margin: 20px auto;
        }
        .userInfo img{
    position: absolute;
    top: -64px;
    left: 9px;
    height: 100px;
    width: 100px;
    border-radius: 50%;
    border: 5px solid #f5f5f5;
    background: #f5f5f5;
}
.userName{
    width: 100%;
    text-align: left;
    margin: -5px 0 0 50px;
    font-size: 29px;
}
.po{
    width: 100%;
    display: flex;
    justify-content: space-between;
}
.po a{
    text-decoration: none;
    /* text-decoration-color: black; */
    font-size: 19px;
    color: #263238;
    padding: 5px 18px;
    border-radius: 22px;
    transition: all .5s ease-in
}
.po a:hover{
    box-shadow: 0px 0px 5px rgba(0,0,0,.5);
}
.po a.one{
    background: #0288D1;
    color: #FFF;
}
.po a.two{
    color: #FFF;
    background: #FF7043;
}
.img-info{
    display: flex;
    justify-content: space-around;
    font-size: 19px;
}
.img-info span.a{
    font-weight: bold; 
}
.pr-pic{
    
    margin: 15px 0;
    box-shadow: 0px 0px 5px #9E9E9E;
}

        
    </style>
</head>
<body>
    <div class="container">
         <?php
        include ('../config.php');
         $cov_id = $_SESSION['login'][4]; //pic-cover user
         $pr_id = $_SESSION['login'][3]; //pic-profile user
         $user_mat = $_SESSION['login'][2]; //user matricule

         $result=$conn->query("SELECT * FROM `pr-cover` WHERE `img_id`=$cov_id");
        $row=$result->fetch_assoc();

        echo "<div class='coverPic'>";
        echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['img_blob'] ) . '" style="width:100%;height: 217px;" />';
        echo "</div>";

        ?>


        <div class="userInfo" style="width:100%;margin-bottom:50px">
            <div class="content" style="position:relative">
                <?php
                $result=$conn->query("SELECT * FROM `pr-pic` WHERE `img_id`=$pr_id");
                $row=$result->fetch_assoc();
                echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['img_blob'] ) . '"  />';
                ?>

            </div>


        </div>
        <div class="userName">
            <?php
            echo '<span>'. $_SESSION['login'][0].'</span>';
            ?>
            </div>

          
            <?php

            $result=$conn->query("SELECT * FROM `images` WHERE `user_mat`=$user_mat");
            $row=$result->fetch_assoc();
            if(!$row){
                echo "<h3 style='margin:80px auto'>post some images and come back to see them !</h3>";
            }else{
                echo "<h3>All the photos that you have post</h3>";
                while ($row=$result->fetch_assoc()) {
                    echo "<div class='pr-pic' style='position: relative;'>";
                    echo "<div class='img-info'>";
                    echo "<span class='a'>Name:</span><span>".$row['img_nom']."</span>";
                    echo "<span class='a'>Size:</span></span>".$row['img_taille']."ko</span>";
                    echo "</div>";
                    echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['img_blob'] ) . '" style="width:100%;border-radius: 5px;" />';

                    echo"</div>";
                }
            }
               
            ?>
  <div class="po">
            <a class="one" href="profile.php">Go to your profile, <?php  echo '<span>'. $_SESSION['login'][0].'</span>';?></a>

            <a class="two" href="logout.php">Log out</a>
        </div>
    </div>
</body>
</html>