<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <link rel="stylesheet" href="css/style.css"> -->
   <style><?php include 'css/reg.css'?></style>
   <?php include 'links/links.php'?>
   
   <title>Reg form</title>
</head>
<body>
   <?php

include 'dbconn.php';
if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['name']);
   $emailid = mysqli_real_escape_string($conn, $_POST['email']);
   $phoneno = mysqli_real_escape_string($conn, $_POST['phone']);
   $cpass = mysqli_real_escape_string($conn, $_POST['c_pass']);
   $rpass = mysqli_real_escape_string($conn, $_POST['r_pass']);

   $cpassword = password_hash($cpass, PASSWORD_BCRYPT);
   $rpassword = password_hash($rpass, PASSWORD_BCRYPT);

   $emailquery = " SELECT * FROM `test23` WHERE email='$emailid' ";
   $query = mysqli_query($conn,$emailquery);
   $emailcount = mysqli_num_rows($query);

   if($emailcount>0){
      ?>
            <script>
               alert("email already exists!");
            </script>
      <?php
   }
   else{
      if($cpass === $rpass){

         $insertquery = "INSERT INTO `test23`(`name`, `email`, `phone`, `c_password`, `r_password`) VALUES ('$username','$emailid','$phoneno','$cpassword','$rpassword')";

         $iquery = mysqli_query($conn,$insertquery);

         if($iquery){
            ?>
            <script>
               alert("Inserted Succesfully");
            </script>
            <?php
         }
         else{
            ?>
            <script>
               alert("Try again!");
            </script>
            <?php
         }
         
      }
      else{
         ?>
            <script>
               alert("password is not matching");
            </script>
         <?php
      }
   }

}
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
               <h2>Sign-Up Now!</h2>
               <p>Welcome to our website</p>
            </div>
            <div class="l-image">
               <img class="animate__infinite	infinite animate__animated animate__pulse" src="images/mob.svg" alt="">

            </div>
            <div class="misc">
               <p>Have an account?</p>
               <a href="login2.php"><button class="misc-btn bt">Log In</button></a>
               <p>Forgot password?</p>
               <a href=""><button class="misc-btn bt">Click here</button></a>
            </div>
         </div>
         <div class="right-container">
            <div class="r-heading">
               <h2>create account</h2>
               <p>Get started with your free account</p>
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
                  <input type="text" id="name" value="" placeholder="Full name" name="name">
                  <input type="email" id="email" value="" placeholder="Email address" name="email">
                  <input type="number" id="phone" value="" placeholder="Phone number" name="phone">
                  <input type="password" id="c-password" value="" placeholder="Create password" name="c_pass">
                  <input type="password" id="r-password" value="" placeholder="Confirm password" name="r_pass">
                  <button class="submit-btn bt" type="submit" name="submit">Create Account</button>
               </form>
            </div>
            
         </div>
      </div>
   </div>
</body>
</html>


