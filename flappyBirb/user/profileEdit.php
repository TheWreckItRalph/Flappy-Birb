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
            $totalCoins = $_POST['totalCoins'];
            $totalClicks = $_POST['totalClicks'];
            $dateVerified = $_POST['dateVerified'];
            $online = $_POST['online'];
            $linkSocial = $_POST['linkSocial'];

            $sql = "UPDATE profiles SET  
            email='".$emailAddress."',  
            username='".$usernameNew."',
            profilePicture='".$profilePicture."',
            totalCoins='".$totalCoins."',
            totalClicks='".$totalClicks."',
            dateVerified='".$dateVerified."',
            online='".$online."',
            linkSocial='".$linkSocial."'
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
            $totalCoins = $row['totalCoins'];
            $totalClicks = $row['totalClicks'];
            $dateVerified = $row['dateVerified'];
            $online = $row['online'];
            $linkSocial = $row['linkSocial'];
        }
    }
?>
<a href="/flappyBirb/user/profilePage.php">View Profile</a>


<form action="/flappyBirb/user/profileEdit.php" method="POST">
    <p>What is Your Email?</p>
    <input type="text" name="email" value="<?php echo $emailAddress;?>"><br>
    <p>What is Your Username?</p>
    <input type="text" name="usernameNew" value="<?php echo $usernameNew;?>"><br>
    <p>What is Your Profile Picture?</p>
    <input type="text" name="profilePicture" value="<?php echo $profilePicture;?>"><br>
    <p>What is Your Total Coins?</p>
    <input type="text" name="totalCoins" value="<?php echo $totalCoins;?>"><br>
    <p>What is Your Total Clicks?</p>
    <input type="text" name="totalClicks" value="<?php echo $totalClicks;?>"><br>
    <p>What is Your Date Verified?</p>
    <input type="text" name="dateVerified" value="<?php echo $dateVerified;?>"><br>
    <p>Are Your Online?</p>
    <input type="text" name="online" value="<?php echo $online;?>"><br>
    <p>Link Social</p>
    <input type="text" name="linkSocial" value="<?php echo $linkSocial;?>"><br>
    <br>
    <input type="submit" name="btnUpdateProfile"value="Update Profile">
</form>


<?php 
    // echo "<pre>";
    // var_dump($emailAddress);
    // echo "</pre>";
?>