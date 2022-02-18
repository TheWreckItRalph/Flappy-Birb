<?php 
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/flappyBirb/db/connect.php';
    $sql = "SELECT * FROM profiles WHERE uid='".$_SESSION['user']['uid']."'";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Profile Page</title>
    <link rel="stylesheet" href="/flappyBirb/user/profile.css"> 
 
</head>
<body>

<h2 style="text-align: center">PlayerUserName's Profile</h2>

<div class="card">
<img src="" alt="Profile Picture">
</div>

<br><br>
<hr>

<h2 style="text-align: center">Status / PlayerUserName's Bio / Date Joined</h2>

<label for="status">Status:</label>
<select id="status" name="status">
  <option value="online">Online</option>
  <option value="offline">Offline</option>
</select>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   

PlayerUserName's Bio:
<textarea name="message" rows="10" cols="30">
</textarea>
<input type="submit">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   

<label for="dateJoined">Date Joined:</label>
<input type="text" id="dateJoined" name="dateJoined" value=""><br>

<br><br>
<hr>

<h2 style="text-align: center">PlayerUserName's Game Data</h2>
<h2 style="text-align: center">Total Click Count / Highest Score Obtained / Total Coins Collected</h2> 



<hr>

<h2 style="text-align: center">Player's Social Media</h2>

</html>
</body>