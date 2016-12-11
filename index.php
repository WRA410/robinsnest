<?php // Example 26-4: index.php
  require_once 'header.php';

  echo "<br><div class='main'><h2>Welcome to $appname!</h2><br>";

  if ($loggedin) echo "$user, you are logged in.";
  else           echo "Please sign up and/or log in to join in.";
?>

    </div><br><br>
  </body>
</html>
