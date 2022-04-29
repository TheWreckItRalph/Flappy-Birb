<?php 
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/flappyBirb/db/connect.php';
    $sql = "SELECT * FROM profiles WHERE uid = '".$_SESSION['user']['uid']."'";
    $result = mysqli_query($conn, $sql);

    foreach ($result as $row) {
        $emailAddress = $row['email'];
        $usernameNew = $row['username'];
        $profilePicture = $row['profilePicture'];
        $linkText = $row['linkText'];
        $linkURL = $row['linkURL'];
        $totalCoins = $row['totalCoins'];
        $totalClicks = $row['totalClicks'];
        $dateVerified = $row['dateVerified'];
        $highScore = $row['highScore'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile Page</title>
    <link rel="stylesheet" href="/flappyBirb/user/profile.css"> 
</head>
<body>

<a href="/flappyBirb/user/profileEdit.php"><button>Edit Profile</button></a> | <a href="/flappyBirb/game.php"><button>Play Game</button></a>

<a name="logout" id="logout" href="/flappyBirb/index.php"><button>Logout</button></a>


<h2 style="text-align: center"><?php echo $usernameNew;?>'s Profile Page</h2>
<hr>
<p style="text-align: center"><img src=<?php echo $profilePicture;?> class="rounded-circle" width="150"></p>

<p style="text-align: center">Email Address:</p2>
<?php echo $emailAddress;?>
<br>

<p style="text-align: center">Username:</p2>
<?php echo $usernameNew;?>
<br>

<p style="text-align: center">Date Verified:</p2>
<?php echo $dateVerified;?>
<br>

<p style="text-align: center">Coins Collected:</p2>
<?php echo $totalCoins;?>
<br>

<p style="text-align: center">Total Clicks:</p2>
<?php echo $totalClicks;?>
<br>

<p style="text-align: center">High Score:</p2>
<?php echo $highScore;?>
<br>

<p style="text-align: center">More Info:</p2>
<a href="<?php echo $linkURL;?>" target="_blank"><?php echo $linkText;?></a>