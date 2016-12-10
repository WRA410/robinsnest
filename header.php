<?php // Example 26-2: header.php
  session_start();

  echo "<!DOCTYPE html>\n<html><head>";

  echo "<link href='https://fonts.googleapis.com/css?family=Cookie|Lato:300,400,700i,900,900i' rel='stylesheet'>";

  require_once 'functions.php';

  $userstr = ' (Guest)';

  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = " $user";
  }
  else $loggedin = FALSE;
  if ($loggedin)
  {
    echo "<div class='menu-container'>" .
         "<img src='logo.png' class='navbar' id='logo'>" .
         "<ul class='menu'>" .
         "<li><a href='members.php?view=$user'><img src='home.png' class='navbar' title='Home' alt='Home'></a></li>" .
         "<li><a href='members.php'><img src='bone.png'  class='navbar' title='Directory' alt='Directory'></a></li>"       .
         "<li><a href='messages.php'><img src='profile.png'  class='navbar' title='Your Profile' alt='Your Profile'></a></li>"       .
         "<li><a href='logout.php'><img src='logout.png' class='navbar' title='Logout' alt='Logout'></a></li></ul>
         </div>
         <br>";
  }
  else
  {
    echo ("<div class='menu-container'>
          <ul class='menu'>" .
          "<li><a href='index.php'>Home</a></li>"                .
          "<li><a href='signup.php'>Sign up</a></li>"            .
          "<li><a href='login.php'>Log in</a></li></ul><br></div>"     .
          "<span class='info'>&#8658; You must be logged in to " .
          "view this page.</span><br><br>");
  }

  echo "<title>$appname$userstr</title><link rel='stylesheet' " .
       "href='styles.css' type='text/css'>"                     .
       "</head><body><div id='content'><center><canvas id='logo' width='624' "    .
       "height='115'>$appname</canvas></center>"             .
       "<div class='appname'>Welcome to $appname, $userstr!</div></div>"            .
       "<script src='javascript.js'></script>";

?>
