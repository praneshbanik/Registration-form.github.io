<?php

session_start();

session_destroy();

?>
   <script>
      alert("Logged out successfully!");
   </script>
<?php

header('location:login2.php');

?>