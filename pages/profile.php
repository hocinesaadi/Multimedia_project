<?php

session_start();
if(empty($_SESSION['login'])){

    return header("location:../pages/login.php");

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
    margin: -5px 0 0 43px;
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
    
    </style>
</head>
<body>
    <div class="container">
        <?php
        include ('../config.php');
        $cov_id = $_SESSION['login'][4]; //pic-cover id
        $pr_id = $_SESSION['login'][3]; //pic-pr id
        $result=$conn->query("SELECT * FROM `pr-cover` WHERE `img_id`=$cov_id");
        $row=$result->fetch_assoc();


        //Rendre l'image



        echo " <div class=\"coverPic\">";
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
            <form id="addPic" action="../php/pubs.php" method="post" enctype="multipart/form-data">
                <div class="pr-pic">
                    <span>Click the image to add New Pic  </span>
                    <div style="position: relative;">
                    <button>
                        <img id="userPic" src="../imgs/cover.png" alt="" style="width:100%;">
                    </button>
                    <input class="pic-p c" type="file" name="pr-cover" id="newPic">
                </div>
            </form>
        </div>
        <div class="loading">
                <img id="loading" src="../imgs/loading.gif" alt="loading...">
            </div>
            <div id="img_info" >
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Size(ko)</th>
                            <th>Image Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="img_name">Select image</td>
                            <td id="img_size"></td>
                            <td id="img_type"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button id="send_button">
                <span>Post</span>
                <img src="../imgs/arrow-right.png" alt="arrow-right" srcset="">
            </button>
        <div class="po">
            <a class="one" href="pubs.php">Show All Posts pic</a>

            <a class="two" href="logout.php">Log out</a>
        </div>
    </div>
    <script>
       newPic.onchange = ()=>{
            loading.style.display = "block"
            var imgName = newPic.files[0].name,
                imgSize = newPic.files[0].size,
                imgType = newPic.files[0].type

            img_name.innerHTML = imgName
            img_size.innerHTML = imgSize
            img_type.innerHTML = imgType
            setTimeout(() => {
                loading.style.display = "none"
            }, 1000);
            setInterval(() => {
                img_info.style.display = "block"
            send_button.style.display = "flex"
            }, 1000);
           

        }
        send_button.onclick = ()=>{
            addPic.submit()
        }
    </script>
</body>
</html>