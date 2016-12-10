<?php // Example 26-5: signup.php
  require_once 'header.php';

  echo <<<_END
  <script>
    function checkUser(user)
    {
      if (user.value == '')
      {
        O('info').innerHTML = ''
        return
      }

      params  = "user=" + user.value
      request = new ajaxRequest()
      request.open("POST", "checkuser.php", true)
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
      request.setRequestHeader("Content-length", params.length)
      request.setRequestHeader("Connection", "close")

      request.onreadystatechange = function()
      {
        if (this.readyState == 4)
          if (this.status == 200)
            if (this.responseText != null)
              O('info').innerHTML = this.responseText
      }
      request.send(params)
    }

    function ajaxRequest()
    {
      try { var request = new XMLHttpRequest() }
      catch(e1) {
        try { request = new ActiveXObject("Msxml2.XMLHTTP") }
        catch(e2) {
          try { request = new ActiveXObject("Microsoft.XMLHTTP") }
          catch(e3) {
            request = false
      } } }
      return request
    }
  </script>
  <div class='main'><h3>Please enter your details to sign up</h3>
_END;


    if ($user == "" || $pass == "")
      $error = "Not all fields were entered<br><br>";
    else
    {
      $result = queryMysql("SELECT * FROM members WHERE user='$user'");

      if ($result->num_rows)
        $error = "That username already exists<br><br>";
      else
     
    }

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Username: <input type="text" name="Username" value="<?php echo $user;?>">
<span class="error">* <?php echo $nameErr;?></span>
 Password: <input type="text" name="password" value="<?php echo $pass;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
Animal Type:
  <input type="radio" name="animal" <?php if (isset($animal) && $animal=="cat") echo "checked";?> value="cat">cat
  <input type="radio" name="animal" <?php if (isset($animal) && $animal=="dog") echo "checked";?> value="dog">dog
 <input type="radio" name="animal" <?php if (isset($animal) && $animal=="bird") echo "checked";?> value="bird">cat
  <input type="radio" name="animal" <?php if (isset($animal) && $animal=="fish") echo "checked";?> value="fish">dog

  <br><br>  
 {
        queryMysql("INSERT INTO members VALUES('$user', '$pass', '$animal')");
        die("<h4>Account created</h4>Please Log in.<br><br>");
      }

    <span class='fieldname'>&nbsp;</span>
    <input type='submit' value='Sign up'>
    </form></div><br>
  </body>
</html>
