<?php

session_start();
if(!empty($_SESSION['login'])){

    return header("location:../pages/profile.php");

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
           
            .avatar img{
              width:100px;
            }
            .flex-c{
              flex-direction: column;
              text-align: left;
          }
          form{
            width:100%;
          }
          input{
            height: 28px;
              border-radius: 5px;
              border: 1px solid #BDBDBD;
              padding: 5px 10px;
          }
          textarea{
            border-radius: 5px;
              border: 1px solid #BDBDBD;
              padding: 5px 10px;
          }
          .l-cont{
            margin: 10px 0;
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
                    <img src="../imgs/signin.png" alt="" srcset="">
                    <span>Sign in</span>
               
            </div>
            <div class="avatar">
                    <img src="../imgs/account.png" alt="Avatar" class="avatar">
                  </div>
            <?php
                if (isset($_GET['error'])){
                    echo " <span class='error'>".$_GET['error']."</span>";
                  
                }
                ?>
            <form id="loginForm" enctype="multipart/form-data" action="../php/login.php" method="post">
                <div class="">

                  <div class="l-cont flex-c d-flex">
                    <label for="nom"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="username" required>
                  </div>
                  <div class="l-cont flex-c d-flex">
                    <label for="mat"><b>password</b></label>
                    <input type="password" name="password" placeholder="Enter Password" required>
                  </div>
                </div>
              </form>
              <button id="submitButton" class="btn-s d-flex center">
                  <span>Log in</span>
                  <img src="../imgs/arrow-right.png" alt="" srcset="" style="width:35px;">
              </button>
              <span>Or</span>
              <a href="signup.php">Add Profile</a>
    </div>
    <script>
        submitButton.onclick = ()=>{
            loginForm.submit();
        }
    </script>
</body>
</html>