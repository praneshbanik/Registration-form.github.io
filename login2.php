<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <link rel="stylesheet" href="css/style.css"> -->
   <style><?php include 'css/login.css'?></style>
   <?php include 'links/links.php'?>
   <title>login form</title>
</head>
<body>
<?php
ob_start();
include 'dbconn.php';

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $password = $_POST['password'];
   
   $query = "SELECT name, email, c_password FROM `test23` WHERE email='$email' ";
   $result = mysqli_query($conn,$query);
   $row = mysqli_fetch_array($result);

   $db_email = $row['email'];
   $db_password = $row['c_password'];  
   $_SESSION['name'] = $row['name'];


   $db_pass = password_verify($password, $db_password);


   if($email == $db_email && $db_pass){

      ?>
      <script>location.href = "home.php"</script>
      <?php

   }
   else{
      ?>
            <script>
               alert("Incorrect Password!");
            </script>
      <?php

}


}
ob_end_flush();
?>
<div class="backgroundz">
   <ul class="background">
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
</ul>
      <div class="container">
         <div class="left-container">
            
            <div class="l-heading">
               <h2>Log-In Now!</h2>
               <p>Login to our website</p>
            </div>
            <div class="l-image">
               <img class="animate__infinite	infinite animate__animated animate__pulse" src="images/mob.svg" alt="">

            </div>
            <div class="misc">
               <p>Don't have an account?</p>
               <a href="reg2.php"><button class="misc-btn bt">Sign up</button></a>
               <p>Forgot password?</p>
               <a href=""><button class="misc-btn bt">Click here</button></a>
            </div>
         </div>
         <div class="right-container">
            <div class="r-heading">
               <h2>Welcome</h2>
               <p>Enter your registered details</p>
               <div>
                  <!-- <hr>OR<hr> -->
               </div>
            </div>
            <div class="others">
               <a href=""><button class="sc-btn sc-bt"><img src="images/f-3.png" alt=""></button></a>
               <a href=""><button class="sc-btn sc-bt"><img src="images/g-3.png" alt=""></button></a>
               <a href=""><button class="sc-btn sc-bt"><img src="images/l-3.png" alt=""></button></a>
            </div>
            <div class="form">
               <form action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" method="POST">
                  <p>or use your email address</p>
                  <!-- <label for=""></label> -->
                  <input type="email" id="email" value="" placeholder="Email address" name="email">
                  <input type="password" id="c-password" value="" placeholder="Enter password" name="password">
                  <button class="submit-btn bt" type="submit" name="submit">Login Now</button>
               </form>
            </div>
            
         </div>
      </div>
   </div>
</body>
</html>
</body>
</html>