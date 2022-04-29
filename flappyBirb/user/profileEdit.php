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

<a href="/flappyBirb/user/profilePage.php"><button>View Profile</button></a>



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
    <input type="text" name="profilePicture" value="<?php echo $profilePicture;?>"><br><br>

    <input type="submit" name="btnUpdateProfile" value="Update Profile"> 
    <br><br>

    <details>
    <summary>Game Profile Pictures</summary>
    <br>
    <ul>
    <script src="/scripts/snippet-javascript-console.min.js?v=1"></script>
    </head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <div class="image123">
      <div class="imgContainer">
    <table cellpadding="2" cellspacing="2">
    <tr>
    <td>
    <img
          src="/Flappy Bird Profile Pictures/defaultpic.png"
          height="100"
          width="100"
          id="move"
        />
    </td>
    <td>
    <img
          src="/Flappy Bird Profile Pictures/dtophatpic.png"
          height="100"
          width="100"
          id="move"
        />
    </td>
    <td>
    <img
          src="/Flappy Bird Profile Pictures/cockatielpic.png"
          height="100"
          width="100"
          id="move"
        />
    </td>
    </tr>
    <br>
    <tr>
    <td>
    <img
          src="/Flappy Bird Profile Pictures/redpic.png"
          height="100"
          width="100"
          id="move"
        />
    </td>
    <td>
    <img
          src="/Flappy Bird Profile Pictures/rtophatpic.png"
          height="100"
          width="100"
          id="move"
        />
    </td>
    <td>
    <img
          src="/Flappy Bird Profile Pictures/angrypic.png"
          height="100"
          width="100"
          id="move"
        />
    </td>
    </tr>
    <br> 
    <tr>
    <td>
    <img
          src="/Flappy Bird Profile Pictures/orangepic.png"
          height="100"
          width="100"
          id="move"
        />
    </td>
    <td>
    <img
          src="/Flappy Bird Profile Pictures/otophatpic.png"
          height="100"
          width="100"
          id="move"
        />
    </td>
    <td>
    <img
          src="/Flappy Bird Profile Pictures/rainbowpic.png"
          height="100"
          width="100"
          id="move"
        />
    </td>
    </tr>
    <br>
    <tr>
    <td>
    <img
          src="/Flappy Bird Profile Pictures/greenpic.png"
          height="100"
          width="100"
          id="move"
        />
    </td>
    <td>
    <img
          src="/Flappy Bird Profile Pictures/gtophatpic.png"
          height="100"
          width="100"
          id="move"
        />
    </td>
    <td>
    <img
          src="/Flappy Bird Profile Pictures/angry2pic.png"
          height="100"
          width="100"
          id="move"
        />
    </td>
    </tr>
    <br>                               
    <tr>
    <td>
    <img
          src="/Flappy Bird Profile Pictures/bluepic.png"
          height="100"
          width="100"
          id="move"
        />
    </td>
    <td>
    <img
          src="/Flappy Bird Profile Pictures/btophat.png"
          height="100"
          width="100"
          id="move"
        />
    </td>
    <td>
    <img
          src="/Flappy Bird Profile Pictures/macawpic.png"
          height="100"
          width="100"
          id="move"
        />
    </td>
    </tr>
    </table>   
    </ul>
    </details>
    <br>
    <script type="text/javascript">
         $("img").on("click", function() {
      alert(this.src);

      var el = document.createElement("textarea");

      el.value = this.src;
      el.setAttribute("readonly", "");
      el.style = { position: "absolute", left: "-9999px" };
      document.body.appendChild(el);
      el.select();
      document.execCommand("copy");
      document.body.removeChild(el);
      copyStringToClipboard("abc123");
      document.execCommand("copy");
    });
        
    </script>

    
</form>  
