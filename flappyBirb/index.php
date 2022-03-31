<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Flappy Birb</title>
    <link rel="icon" type="image/x-icon" href="">
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

<form action="/flappyBirb/index.php" method="POST" style="text-align:center" name="login">
  <label for="email"><img src="/Images/email.png" width="50" height="20"></label><br>
  <input type="text" id="email" name="email" style="font-size:xxpt;height:20px"><br><br>
  <label for="password"><img src="/Images/password.png" width="90" height="20"></label><br>
  <input type="password" id="password" name="password" style="font-size:xxpt;height:20px"><br> <input type="checkbox" onclick="myFunction()"><img src="/Images/showpassword.png" width="100" height="20"><br><br>
  <input type="submit" name="btnLogin" id="Login" value="Login"><br><br>
  <a href="/flappyBirb/signUp.php" style="text-align:center">Sign Up</a> | <a href="/flappyBirb/index.php" style="text-align:center">Log In</a> 
  <hr>
  <?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/flappyBirb/db/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btnLogin'])) {
        $email = $_POST['email'];
        $passwordUserTyped = $_POST['password'];

        $sql = "SELECT * FROM emailVerify WHERE email='".$email."'";
        $result = mysqli_query($conn, $sql);
   
        if (mysqli_num_rows($result) > 0) { 
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            $passwordHash = $row['password'];

            if (password_verify($passwordUserTyped, $passwordHash)) {
                $passwordMatch = 'yes';
                 $status = $row['status'];

                 if ($status == 1 && $passwordMatch == 'yes') {
                     $_SESSION['user']['access'] = 1;
                     $_SESSION['user']['uid'] = $row['uid'];
                     header("Location: /flappyBirb/user/profilePage.php");
                     
                 }

            } else {
                $passwordMatch = 'no';
            }
           
            // echo "print this";
            }
            } else {
              echo "No Record Found For That Email Address";
            }
           
            mysqli_close($conn);
    }
}
?>
<br>
<?php
  echo "Email Entered is: $email<br>";
  echo "Password Entered is: $passwordUserTyped<br>";
  echo "Hashed Password is: $passwordHash<br>";
  echo "Password Match: $passwordMatch<br>";
  echo "Account Status: $status<br>";
?>
</form> 



<br>
<script src="/test3/game.js"></script>

</body>
</html>