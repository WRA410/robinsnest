<?php // Example 26-4: index.php
  require_once 'header.php';

  echo "<div class='main'><h2>Welcome to $appname!</h2>";

  if ($loggedin) echo "$user, you are logged in. ";
  else           echo "Please <a href='signup.php'>sign up</a> or <a href='login.php'>log in</a> to join in the fun!";

  if ($loggedin) {
$result = queryMysql("SELECT * FROM profiles WHERE user='$user'");
      if ("$animal='cat'"){
          echo "You are a cat.";
      }
      if ("$animal='dog'"){
          echo "You are a dog.";
      }
      if ("$animal='fish'"){
          echo "You are a fish.";
      }
      else{
          echo "You are not a cat or a dog.";
  }
  }
    
?>

    </div><br>
  </body>
</html>
