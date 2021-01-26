<?php
date_default_timezone_set('Asia/Manila');
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in - My Notes</title>
    <link rel="icon" href="../img/icon.png">
    <link rel="stylesheet" type="text/css" href="../css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous">
  </script>

  <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" 
    crossorigin="anonymous">
  </script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  
  <script>   
        function loaded(){
            $(".se-pre-con").fadeOut("slow");
        }

    </script>
</head>
<body onload="loaded()">
  <div class="se-pre-con"></div>
  
       <img class="wave" src="https://lh3.googleusercontent.com/pw/ACtC-3c_JxUlKl01SIqfGisMFnLYVGrDwVl3PcGbAcKrFQ7TOVadTwesBaF9QVBi609EV9M7eCCfmcnHjbw_MXDZn8b_rmVrR6jazOm2wpXaRcWB5PaFan9zKqdYNq878GybjlLaaYLISdZ-0HW-R_VhqSaR=w574-h697-no">
       <div class="container ">
          <div class="img">
           <img src="https://lh3.googleusercontent.com/pw/ACtC-3ft5TL-Gepf2mIz7uE5bthM0O4FrdQr8NcJNkknHze8bIH8BMycGsNBLqbeFxy6N5yNm5Msfgpx0DnQRKgdVqEZ7SHmhabJw6anUEym9s8GALAquKVhimA7VCf275Wism1MYEKzG0CNFmaF4P812Xed=w838-h697-no">
         </div>
          <div class="login-content">
              <form id="loginform" class="form-horizontal" role="form">
                 <img src="https://lh3.googleusercontent.com/pw/ACtC-3c-mRMtkuBdOlKb2uOoAWJbdI5HV73ehiLDDrffH1OzaOf68FqRrvZFjmBEe04MXdXVY0Tdfy-VQ2XvGOi81TbOSqsUpmqtAaOJVaJTcXiRG-PYp3RGea7mb2AbikO2PQ2Vn1RDzLW6z9-33FpIzQ9q=s697-no">
                   <h2 class="title">Welcome</h2>           
                 <p class=" txt_error "> </p>
                   <div class="loading"></div>                                                            
                  <div class="input-div one">
                     <div class="i">
                          <i class="fas fa-user"></i>
                     </div>
                     <div class="div">
                          <h5>Username</h5>
                          <input type="text" class="input" name="username" id="txt_username">
                     </div>
                  </div>
                  <div class="input-div pass">
                     <div class="i"> 
                          <i class="fas fa-lock"></i>
                     </div>
                     <div class="div">
                          <h5>Password</h5>
                          <input type="password" class="input" name="password" id="txt_password">
                     </div>
                  </div>
                  <a href="#">Forgot Password?</a>
                  <!-- <input type="submit" class="btn" value="Login" name="Login"> -->
                  <button type="button" class="btn btn-primary" id="btn_login">Login</button>
                  <p class="txt_signup"> New User? <a class="txt_signup" href="signup.php">Sign up here.</a> </p>
                  
              </form>
          </div>
      </div>

    <script type="text/javascript" src="../js/main.js"></script>

</body>
</html>
