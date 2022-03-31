<link rel="stylesheet" href="/flappyBirb/user/profile.css"> 
<?php 
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/flappyBirb/db/connect.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['btnUpdateProfile'])) {  
            
            // Collect form input values
            $emailAddress = $_POST['email'];
            $usernameNew = $_POST['usernameNew'];
            $profilePicture = $_POST['profilePicture'];
            $linkText = $_POST['linkText'];
            $linkURL = $_POST['linkURL'];

            $sql = "UPDATE profiles SET  
            email='".$emailAddress."',  
            username='".$usernameNew."',
            profilePicture='".$profilePicture."',
            linkText='".$linkText."',
            linkURL='".$linkURL."'
            WHERE uid=".$_SESSION['user']['uid'];
            $result = mysqli_query($conn, $sql);

      
            // echo "Email: $emailAddress<br>";
            // echo "Username: $usernameNew<br>";
            // echo "Profile Picture: $profilePicture<br>";
            // echo "Total Coins: $totalCoins<br>";
            // echo "Total Clicks: $totalClicks<br>";
            // echo "Date Verified: $dateVerified<br>";
            // echo "Online: $online<br>";
            // echo "Link Social: $linkSocial<br>";

            // Update DB with form values  
            header("Location: /flappyBirb/user/profilePage.php");
        } 
      } else {
        $sql = "SELECT * FROM profiles WHERE uid='".$_SESSION['user']['uid']."'";
        $result = mysqli_query($conn, $sql);

        foreach ($result as $row) {
            $emailAddress = $row['email'];
            $usernameNew = $row['username'];
            $profilePicture = $row['profilePicture'];
            $linkText = $row['linkText'];
            $linkURL = $row['linkURL'];
        }
    }
?>

<a href="/flappyBirb/user/profilePage.php">View Profile</a>

<form action="/flappyBirb/user/profileEdit.php" style="margin: auto; width: 220px;" method="POST">
    <p>What is Your Email?</p>
    <input type="text" name="email" value="<?php echo $emailAddress;?>"><br>
    <p>What is Your Username?</p>
    <input type="text" name="usernameNew" value="<?php echo $usernameNew;?>"><br>
    <p>Link Text</p>
    <input type="text" name="linkText" value="<?php echo $linkText;?>"><br>
    <p>Link URL</p>
    <input type="text" name="linkURL" value="<?php echo $linkURL;?>"><br>
    <p>Profile Picture</p>
    <input type="text" name="profilePicture" value="<?php echo $profileImage;?>"><br><br>
<input type="submit" name="btnUpdateProfile"value="Update Profile"></td>
</form>  
