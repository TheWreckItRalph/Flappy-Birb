<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/flappyBirb/db/connect.php';

    $sql = "SELECT * FROM `gameData`";
    $result = mysqli_query($conn, $sql);

    foreach ($result as $row) {
        $username = $row['username'];
        $totalCoins = $row['totalCoins'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Leaderboard Page</title>

<style>
table {
    font-family: "Papyrus", fantasy;
    border-collapse: collapse;
    width: 100%;
  }
  
td, th {
    border: 1px solid white;
    text-align: left;
    padding: 8px;
  }

body {
    background-color: #3090C7;
    font-family: "Papyrus", fantasy;
    font-size: 20;
    color: white;
  } 
</style>

</head>
<body>

<h2 style="text-align: center">★ ∼ Leaderboard ∼ ★</h2>

<h2>Leaderboard Scores</h2>

<table>
    <tr>
        <th>Username</th>
        <th>Coins</th>
    </tr>
    <tr>
        <th>1st: <?php echo $username?> </th>
        <th> <?php echo $totalCoins;?> </th>
    </tr>
    <tr>
        <th>2nd: <?php echo $username?> </th>
        <th> <?php echo $totalCoins;?> </th>
    </tr>
    <tr>
        <th>3rd:</th>
        <th></th>
    </tr>
    <tr>
        <th>4th:</th>
        <th></th>
    </tr>
    <tr>
        <th>5th:</th>
        <th></th>
    </tr>
    <tr>
        <th>6th:</th>
        <th></th>
    </tr>
    <tr>
        <th>7th:</th>
        <th></th>
    </tr>
    <tr>
        <th>8th:</th>
        <th></th>
    </tr>
    <tr>
        <th>9th:</th>
        <th></th>
    </tr>
    <tr>
        <th>10th:</th>
        <th></th>
    </tr>
</table>