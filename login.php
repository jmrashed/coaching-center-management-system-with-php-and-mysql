<?php
include 'connection.php'; //connect the connection page
if(empty($_SESSION)) // if the session not yet started 
   session_start();


if(isset($_SESSION['username'])) { // if already login
   header("location: home.php"); // send to home page
   exit; 
}

?>
<html>
<head></head>
<body>
<form action = "login_proccess.php" method = "post">
    <select name="loginType">
        <option value="admin">admin</option>
    </select>
Username: <input type="text" name="email" /><br />
Password: <input type="password" name="password" /><br />
<input type = "submit" name="submit" value="login" />
</form>
</body>
</html>