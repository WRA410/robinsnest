<?php // Example 26-9: members.php
  require_once 'header.php';

  if (!$loggedin) die();

  echo "<div class='main'>";

  if (isset($_GET['add']))
  {
    $add = sanitizeString($_GET['add']);

    $result = queryMysql("SELECT * FROM friends WHERE user='$add' AND friend='$user'");
    if (!$result->num_rows)
      queryMysql("INSERT INTO friends VALUES ('$add', '$user')");
  }
  elseif (isset($_GET['remove']))
  {
    $remove = sanitizeString($_GET['remove']);
    queryMysql("DELETE FROM friends WHERE user='$remove' AND friend='$user'");
  }

  $result = queryMysql("SELECT user FROM members ORDER BY user");
  $num    = $result->num_rows;

  echo "<h3>Other Petstagram Users</h3><ul>";

  for ($j = 0 ; $j < $num ; ++$j)
  {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if ($row['user'] == $user) continue;
    
      
/*        if (isset($_GET['view']))
  {
    $view = sanitizeString($_GET['view']);
    if ($view == $user) $name = "Your";
    else                $name = "$view's";
  
    showPreview($view);
  }
  
  Above is a bit where I wanted the directory to show the member's profile pics. I tried to create a function (showPreview) derived from the one that displays profiles. Didn't quite work.
  */
      
      
    echo "<li><a href='messages.php?view=" .
      $row['user'] . "'>" . $row['user'] . "</a>";
    $follow = "follow";

    $result1 = queryMysql("SELECT * FROM friends WHERE
      user='" . $row['user'] . "' AND friend='$user'");
    $t1      = $result1->num_rows;
    $result1 = queryMysql("SELECT * FROM friends WHERE
      user='$user' AND friend='" . $row['user'] . "'");
    $t2      = $result1->num_rows;

    if (($t1 + $t2) > 1) echo " &harr; is a mutual pal";
    elseif ($t1)         echo " &larr; you are tracking";
    elseif ($t2)       { echo " &rarr; has your scent!";
      $follow = "recip"; }
    
    if (!$t1) echo " [<a href='members.php?add="   .$row['user'] . "'>$follow</a>]";
    else      echo " [<a href='members.php?remove=".$row['user'] . "'>drop</a>]";
  }
?>

    </ul></div>
  </body>
</html>
