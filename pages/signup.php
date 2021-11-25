<?php

 session_start();
if(!empty($_SESSION['login'])){

        return header("location:/../hamid/pages/profile.php");

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body{
            height: 100%;
            margin:20px auto;
        }
        .avatar img {
            width: 100px;
        }

        .flex-c {
            flex-direction: column;
            text-align: left;
        }

        form {
            width: 100%;
        }

        input {
            height: 28px;
            border-radius: 5px;
            border: 1px solid #BDBDBD;
            padding: 5px 10px;
        }

        textarea {
            border-radius: 5px;
            border: 1px solid #BDBDBD;
            padding: 5px 10px;
        }

        .l-cont {
            margin: 10px 0;
        }

        .pr-pic {
            border: 1px solid #9E9E9E;
            padding: 5px;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            position: relative;
            background-color: #FFF;
            margin: 15px 0;
        }

        .pr-pic button {
            border: none;
            background: transparent;
        }

        .pic-p {

            position: absolute;

            opacity: 0;
            cursor: pointer;

        }

        .pic-p.p {
            top: 11px;
            left: 40%;
            right: 0;
            bottom: 0;
            width: 63px;
            height: 65px;
        }

        .pic-p.c {
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 94%;
            height: 92%;
        }
        .error{
            width: 100%;
            background: #F4511E;
            color: #FFF;
            border-radius: 3px;
            font-size: 18px;
            padding: 5px 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="d-flex center label">
            <img src="../imgs/signup.png" alt="" srcset="">
            <span>Add Profile</span>
        </div>
        <div class="avatar">
                    <img src="../imgs/account.png" alt="Avatar" class="avatar">
        
        </div>
        <?php
                if (isset($_GET['error'])){
                    echo " <span class='error'>".$_GET['error']."</span>";
                }
                ?>
        <form id="loginForm" enctype="multipart/form-data" action="../php/singUp.php" method="post">
            <div class="">
                
                <div class="l-cont flex-c d-flex">
                    <label for="nom"><b>Name</b></label>
                    <input type="text" id="nom" placeholder="Enter Name" name="nom" required>
                </div>
                <div class="l-cont flex-c d-flex">
                    <label for="mat"><b>Matricul</b></label>
                    <input type="text" id="mat" placeholder="Enter Matricule" name="mat" required>
                </div>
                <div class="l-cont flex-c d-flex">
                    <label for="Username"><b>Username</b></label>
                    <input type="text" id="Username" placeholder="Enter Username" name="username" required>
                </div>
                <div class="l-cont flex-c d-flex">
                    <label for="pass"><b>password</b></label>
                    <input type="password" id="pass" name="password" placeholder="Enter Password" required>
                </div>
                <div class="pr-pic">
                    <span>Click the avatar to add user pic </span>
                    <div style="position: relative;">
                        <button>
                            <img id="userPic" src="../imgs/pr-pic.png" alt="">
                        </button>
                        <input class="pic-p p" type="file" name="pr-pic" id="userPicF" required>
                    </div>
                </div>
                <div class="pr-pic">
                    <span>Click the image to add user cover pic </span>
                    <div style="position: relative;">
                        <button>
                            <img id="userPic" src="../imgs/cover.png" alt="" style="width:100%;">
                        </button>
                        <input class="pic-p c" type="file" name="pr-cover" id="" required>
                    </div>
                </div>
            </div>
            <button id="submitButton" class="btn-s d-flex center" name="submit">
            <span>Sign Up</span>
            <img src="../imgs/arrow-right.png" alt="" srcset="" style="width:35px;">
        </button>
        </form>
        
        <span>Or</span>
        <a href="login.php">Sign in</a>
    </div>
    <script>
        submitButton.onclick = () => {
            loginForm.submit();
        }
    </script>
</body>

</html>