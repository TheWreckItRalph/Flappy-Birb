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
    <details>
        <summary>Game Profile Pictures</summary>
        <ul>
        <li><a href="https://ide.codeanywhere.com/Flappy-Bird-349836947169/mini-browser/home/cabox/workspace/Flappy%20Bird%20Profile%20Pictures/defaultpic.png" target="_blank">Default</a></li>
        <li><a href="https://ide.codeanywhere.com/Flappy-Bird-349836947169/mini-browser/home/cabox/workspace/Flappy%20Bird%20Profile%20Pictures/dtophatpic.png" target="_blank">Default Top Hat</a></li>
        <li><a href="https://ide.codeanywhere.com/Flappy-Bird-349836947169/mini-browser/home/cabox/workspace/Flappy%20Bird%20Profile%20Pictures/cockatielpic.png" target="_blank">Cockatiel</a></li>
        <li><a href="https://ide.codeanywhere.com/Flappy-Bird-349836947169/mini-browser/home/cabox/workspace/Flappy%20Bird%20Profile%20Pictures/redpic.png" target="_blank">Red</a></li>
        <li><a href="https://ide.codeanywhere.com/Flappy-Bird-349836947169/mini-browser/home/cabox/workspace/Flappy%20Bird%20Profile%20Pictures/rtophatpic.png" target="_blank">Red Top Hat</a></li>
        <li><a href="https://ide.codeanywhere.com/Flappy-Bird-349836947169/mini-browser/home/cabox/workspace/Flappy%20Bird%20Profile%20Pictures/angrypic.png" target="_blank">Red Angry Bird</a></li>
        <li><a href="https://ide.codeanywhere.com/Flappy-Bird-349836947169/mini-browser/home/cabox/workspace/Flappy%20Bird%20Profile%20Pictures/orangepic.png" target="_blank">Orange</a></li>
        <li><a href="https://ide.codeanywhere.com/Flappy-Bird-349836947169/mini-browser/home/cabox/workspace/Flappy%20Bird%20Profile%20Pictures/otophatpic.png" target="_blank">Orange Top Hat</a></li>
        <li><a href="https://ide.codeanywhere.com/Flappy-Bird-349836947169/mini-browser/home/cabox/workspace/Flappy%20Bird%20Profile%20Pictures/rainbowpic.png" target="_blank">Rainbow</a></li>
        <li><a href="https://ide.codeanywhere.com/Flappy-Bird-349836947169/mini-browser/home/cabox/workspace/Flappy%20Bird%20Profile%20Pictures/greenpic.png" target="_blank">Green</a></li>
        <li><a href="https://ide.codeanywhere.com/Flappy-Bird-349836947169/mini-browser/home/cabox/workspace/Flappy%20Bird%20Profile%20Pictures/gtophatpic.png" target="_blank">Green Top Hat</a></li>
        <li><a href="https://ide.codeanywhere.com/Flappy-Bird-349836947169/mini-browser/home/cabox/workspace/Flappy%20Bird%20Profile%20Pictures/angry2pic.png" target="_blank">Black Angry Bird</a></li>
        <li><a href="https://ide.codeanywhere.com/Flappy-Bird-349836947169/mini-browser/home/cabox/workspace/Flappy%20Bird%20Profile%20Pictures/bluepic.png" target="_blank">Blue</a></li>
        <li><a href="https://ide.codeanywhere.com/Flappy-Bird-349836947169/mini-browser/home/cabox/workspace/Flappy%20Bird%20Profile%20Pictures/btophat.png" target="_blank">Blue Top Hat</a></li>
        <li><a href="https://ide.codeanywhere.com/Flappy-Bird-349836947169/mini-browser/home/cabox/workspace/Flappy%20Bird%20Profile%20Pictures/macawpic.png" target="_blank">Macaw</a></li>
        <ul>
    </details>
    <br>
    
    <input type="submit" name="btnUpdateProfile"value="Update Profile"> 
</form>  