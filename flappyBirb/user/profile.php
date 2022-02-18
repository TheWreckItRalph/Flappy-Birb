<!DOCTYPE html>
<html lang="en">
<head>
    <title>Flappy Birb</title>
    <link rel="stylesheet" href="/flappyBirb/style.css"> 
    <link href="https://fonts.googleapis.com/css?family=Squada+One&display=swap" rel="stylesheet">
</head>
<body>
<p style="text-align:center;"><img src="/Images/title.png" width="300"></p>
<marquee direction="right">  
<img src="/Animated Flappy Birds/dtophat.gif" width="100" height="100">
<img src="/Animated Flappy Birds/angry2.gif" width="100" height="100">
<img src="/Animated Flappy Birds/angry.gif" width="100" height="100">
<img src="/Animated Flappy Birds/macaw.gif" width="100" height="100">
<img src="/Animated Flappy Birds/cockatiel.gif" width="100" height="100">
<img src="/Animated Flappy Birds/default.gif" width="100" height="100">
</marquee>

<form action="/profilePage.php" method="POST" style="text-align:center" name="login">
  <label for="username"><img src="/Images/username.png" width="90" height="20"></label><br>
  <input type="text" id="username" name="username" style="font-size:xxpt;height:20px" onKeyup="checkform()"><br><br>
  <label for="password"><img src="/Images/password.png" width="90" height="20"></label><br>
  <input type="password" id="password" name="password" style="font-size:xxpt;height:20px" onKeyup="checkform()"><br> <input type="checkbox" onclick="myFunction()"><img src="/Images/showpassword.png" width="100" height="20"><br><br>
  <input type="submit" name="BTN-submit" id="Login" value="Login" disabled="disabled"><br><br>
  <a href="/flappyBirb/signUp.php" style="text-align:center">Sign Up</a> | <a href="/flappyBirb/index.php" style="text-align:center">Log In</a> | <a href="/flappyBirb/user/profile.php" style="text-align:center">Profile</a> 
</form> 

<br>
<script src="script.js"></script>

</body>
</html>