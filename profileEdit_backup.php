<link rel="stylesheet" href="/flappyBirb/user/profile.css"> 
<?php 
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/flappyBirb/db/connect.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['btnUpdateProfile'])) {  
            
            // Collect form input values
            $emailAddress = $_POST['email'];
            $usernameNew = $_POST['usernameNew'];
            $avatar = $_POST['profilePicture'];
            $linkText = $_POST['linkText'];
            $linkURL = $_POST['linkURL'];

            $sql = "UPDATE profiles SET  
            email='".$emailAddress."',  
            username='".$usernameNew."',
            profilePicture='".$avatar."',
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
            $linkText = $row['linkText'];
            $linkURL = $row['linkURL'];
        }
    }
?>

<a href="/flappyBirb/user/profilePage.php">View Profile</a>

<form action="/flappyBirb/user/profileEdit.php" method="POST">
    <p>What is Your Email?</p>
    <input type="text" name="email" value="<?php echo $emailAddress;?>"><br>
    <p>What is Your Username?</p>
    <input type="text" name="usernameNew" value="<?php echo $usernameNew;?>"><br>
    <p>Link Text</p>
    <input type="text" name="linkText" value="<?php echo $linkText;?>"><br>
    <p>Link URL</p>
    <input type="text" name="linkURL" value="<?php echo $linkURL;?>"><br>
    <p>Select Your Avatar</p>
    <table cellpadding="2" cellspacing="2">
    <tr>
    <td><img src="/Flappy Bird Profile Pictures/defaultpic.png" width="100" height="100" /></td>
    <td><input type="radio" name="avatar1"></td>
    <td><img src="/Flappy Bird Profile Pictures/dtophatpic.png" width="100" height="100" /></td>
    <td><input type="radio" name="avatar2"></td>
    <td><img src="/Flappy Bird Profile Pictures/cockatielpic.png" width="100" height="100" /></td>
    <td><input type="radio" name="avatar3"></td>
    </tr>
                            
    <tr>
    <td><img src="/Flappy Bird Profile Pictures/redpic.png" width="100" height="100" /></td>
    <td><input type="radio" name="avatar4"></td>
    <td><img src="/Flappy Bird Profile Pictures/rtophatpic.png" width="100" height="100" /></td>
    <td><input type="radio" name="avatar5"></td>
    <td><img src="/Flappy Bird Profile Pictures/angrypic.png" width="100" height="100" /></td>
    <td><input type="radio" name="avatar6"></td>
    </tr>

    <tr>
    <td><img src="/Flappy Bird Profile Pictures/orangepic.png" width="100" height="100" /></td>
    <td><input type="radio" name="avatar7"></td>
    <td><img src="/Flappy Bird Profile Pictures/ptophatpic.png" width="100" height="100" /></td>
    <td><input type="radio" name="avatar8"></td>
    <td><img src="/Flappy Bird Profile Pictures/rainbowpic.png" width="100" height="100" /></td>
    <td><input type="radio" name="avatar9"></td>
    </tr>
                                
    <tr>
    <td><img src="/Flappy Bird Profile Pictures/greenpic.png" width="100" height="100" /></td>
    <td><input type="radio" name="avatar10"></td>
    <td><img src="/Flappy Bird Profile Pictures/gtophatpic.gif" width="100" height="100" /></td>
    <td><input type="radio" name="avatar11"></td>
    <td><img src="/Flappy Bird Profile Pictures/angry2pic.png" width="100" height="100" /></td>
    <td><input type="radio" name="avatar12"></td>
    </tr>

    <tr>
    <td><img src="/Flappy Bird Profile Pictures/bluepic.png" width="100" height="100" /></td>
    <td><input type="radio" name="avatar13"></td>
    <td><img src="/Flappy Bird Profile Pictures/btophat.png" width="100" height="100" /></td>
    <td><input type="radio" name="avatar14"></td>
    <td><img src="/Flappy Bird Profile Pictures/macawpic.png" width="100" height="100" /></td>
    <td><input type="radio" name="avatar15"></td>
    </tr>                       
    </table>
                            
    <table cellspacing="0" cellpadding="8">
    <tr>
    <td><input type="submit" name="btnUpdateProfile"value="Update Profile"></td>
    </tr>
    </table>   
</form>  


<?php 
    // echo "<pre>";
    // var_dump($emailAddress);
    // echo "</pre>";
?>