<?php
session_start();

if(!isset($_SESSION['name'])){
   ?>
   <script>location.href = "login2.php"</script>
   <?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <style><?php include 'css/reg.css'?></style>
   <?php include 'links/links.php'?>
   <title>Document</title>
   
</head>
<body>
   <h1>hello <?php echo $_SESSION['name']; ?></h1>
   <div>
      <a href="logout.php"><button class="misc-btn bt">Log out</button></a>
   </div>
</body>
</html>