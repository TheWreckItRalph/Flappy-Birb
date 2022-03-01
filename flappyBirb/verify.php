<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/flappyBirb/db/connect.php';

$hash = $_GET['hash'];
$email = $_GET['email'];
$sql = "SELECT * FROM emailVerify";
$result = mysqli_query($conn, $sql);
$hashFound = "no";
$emailFound = "no";
$status = 0;
 
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
  
   if ($row["hash"] == $hash) { // START: hash found
      $hashFound = "yes";
 
   if ($row["email"] == $email) {// START: email found
      $emailFound = "yes";
 
      $status = 1; // update USER status in emailVerify table
 
      $sql = "UPDATE emailVerify
      SET status = $status
      WHERE uid = ".$row["uid"].";";

    
      if (mysqli_query($conn, $sql)) {
        echo "New record created successfully ";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      $sql1 =  "INSERT INTO profiles (uid)
      VALUES (".$row["uid"].")";

    if (mysqli_query($conn, $sql1)) {
        echo "New record created successfully ";
    } else {
        echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }


    } // END: email found
  
    } // END: hash found
 }
 } else {
echo "0 results";
}
 echo "Hash Found: $hashFound <br>";
echo "Email Found: $emailFound <br>";
echo "Status: $status <br>";
 
mysqli_close($conn);
echo "<hr>";
echo "Hash - $hash<br>";
echo "Email - $email<br>";
?>
