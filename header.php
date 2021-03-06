<?php // Example 26-2: header.php
  session_start();

  echo "<!DOCTYPE html>\n<html>\n<head>\n";

  echo "<link href='https://fonts.googleapis.com/css?family=Cookie|Lato:300,400,700,700i,900,900i' rel='stylesheet'>";

  require_once 'functions.php';

  $userstr = ' (Guest)';

  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = " $user";
  }
  else $loggedin = FALSE;

  echo "<title>$appname$userstr</title><link rel='stylesheet' href='styles.css' type='text/css'>"                     .
       "</head><body><div id='content'>"             .
       "<div class='appname'><h1>Welcome to $appname, $userstr!</h1></div></div>"            .
       "<script src='javascript.js'></script>";

  if ($loggedin)
  {
    echo "<div class='menu-container'>
         <a href='index.php'><img src='logo.png' class='navbar' id='logo'></a>
         <ul class='menu'>
         <li><a href='index.php?view=$user'><img src='home.png' class='navbar' title='Home' alt='Home'></a></li>
         <li><a href='members.php'><img src='directory.png'  class='navbar' title='Directory' alt='Directory'></a></li>
         <li><a href='messages.php'><img src='profile.png'  class='navbar' title='Your Pawfile' alt='Your Pawfile'></a></li>
         <li><a href='logout.php'><img src='logout.png' class='navbar' title='Logout' alt='Logout'></a></li>
         </ul>
         </div>
         <br>";
  }
  else
  {
    echo ("<div class='menu-container'>
          <a href='index.php'><img src='logo.png' class='navbar' id='logo'></a>
          <ul class='menu'>
          <li><a href='index.php'><img src='home.png' class='navbar' title='Home' alt='Home'></a></li>
          </div>
          <span class='info'>&#8658; Please <a href='signup.php'>sign up</a> or <a href='login.php'>log in</a> to view this page.</span>
          <br><br>");
  }

?>
