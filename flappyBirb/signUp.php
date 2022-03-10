<!DOCTYPE html>
<html lang="en">
<head>
    <title>Flappy Birb</title>
    <link rel="stylesheet" href="/flappyBirb/style.css" > 
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

<form action="/flappyBirb/signUp.php" method="POST" style="text-align:center" name="signUp">
  <label for="email"><img src="/Images/email.png" width="50" height="20"></label><br>
  <input type="text" id="email" name="email" style="font-size:xxpt;height:20px"><br><br>
  <label for="username"><img src="/Images/username.png" width="90" height="20"></label><br>
  <input type="text" id="usernameNew" name="usernameNew" style="font-size:xxpt;height:20px" ><br><br>
  <label for="password"><img src="/Images/password.png" width="90" height="20"></label><br>
  <input type="password" id="password" name="password" style="font-size:xxpt;height:20px" ><br><br>
  <label for="password2"><img src="/Images/verifypassword.png" width="150" height="25"></label><br>
  <input type="password" id="password2" name="password2" style="font-size:xxpt;height:20px" ><br><input type="checkbox" onclick="myFunction()"><img src="/Images/showpassword.png" width="100" height="20"><br><br>
  <input type="submit" name="btnSignUp" id="SignUp" value="Sign Up"><br><br>
  <a href="/flappyBirb/signUp.php" style="text-align:center">Sign Up</a> | <a href="/flappyBirb/index.php" style="text-align:center">Log In</a>
  <hr>
  <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btnSignUp'])) {
   
     //form validation
     $pass = $_POST['password'];
     $password2 = $_POST['password2'];
     $emailAddress = $_POST['email'];
     $usernameNew = $_POST['usernameNew'];
   
   
   
   
   
     //email validation
     if(strpos($emailAddress, '@') !== false && strpos($emailAddress, '.') !== false) {
         echo "Valid email address<br>";
     } else {
         echo "NOT a valid email address<br>";
     }
   
         //password length check
         if (strlen($pass) >=8 ) {
             echo "password long enough<br>";
             //check if password and verify password match
    
             if($pass == $password2) {
             echo "passwords matched<br>";
   
             //save account to Database
             // insert email
             require_once $_SERVER['DOCUMENT_ROOT'].'/flappyBirb/db/connect.php';
            
             $hash = uniqid('', true);
             $status = 0;
            
             //https://medium.com/codex/how-to-save-and-verify-password-using-php-and-mysql-64687086cc8d
             $options = [
                 'cost' => 5
             ];
             $hashed_password=password_hash($password2, PASSWORD_BCRYPT, $options);
        
        
             $sql = "INSERT INTO emailVerify (email, username, hash, status, password)
             VALUES ('$emailAddress', '$usernameNew', '$hash', '$status', '$hashed_password')";
            
             if (mysqli_query($conn, $sql)) {
             echo "New record created successfully ";
             } else {
             echo "Error: " . $sql . "<br>" . mysqli_error($conn);
             }
        
         $to_email = '349836@guhsd.net';
         $subject = 'Testing PHP Mail';
        
         $headers  = 'MIME-Version: 1.0' . "\r\n";
         $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
         $headers .= 'From: fadi@yohanna.com';
         $message = '<html><body>';
         $message .= '<h1 style="color:#f40;">Hi!</h1>';
         $message .= '<p style="color:#f40;">Here is your HASH# <a href="https://port-3000-flappy-bird-349836947169.preview.codeanywhere.com/flappyBirb/verify.php?hash='.$hash.'&email='.$emailAddress.'">'.$hash.'</a></p>';
         $message .= '</body></html>';
        
         mail($to_email,$subject,$message,$headers);
     
   
   
   
    mysqli_close($conn);
      echo $emailAddress;
   
             } else {
             echo "passwords did NOT match<br>";
             }
    
    
    
    
            
         } else {
             echo "password must be at least 8 characters long";
         }
   
   
   
   
   
   
    } else {
      // Assume btnSubmit
    }
  }

?>
</form> 






<br>
<script src="/flappyBirb/script.js"></script>

</body>
</html>