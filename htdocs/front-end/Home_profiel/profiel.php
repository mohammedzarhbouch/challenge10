
<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erfenis</title>
    <link rel="stylesheet"href="profiel.css">
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <img src="" class="">
            <ul>
                <li><a href="#"><a href="index.html">Home</a></li>
                <li><a href="#"><a href="profiel.html">Profiel</a></li>
                <li><a href="#"><a href="../login/login.html">Log uit</a></li>
            </ul>
        </div>
        <div class="content">
            <div>
                <img src="Foto's/user (4).png" id="foto">
                <button class="box1">
                <div class="profiel-text">
  <?php
    require_once('../../back-end/connection.php');
    $username = $_SESSION['name'];
    $query = "SELECT email, password FROM users WHERE name='$username'";
    $result = mysqli_query($con, $query);

    if ($result) {
      $row = mysqli_fetch_assoc($result);
      $email = $row['email'];
      $password = $row['password'];
      echo "Gebruikersnaam: $username<br>";
      echo "E-Mail: $email<br>";
      echo "Wachtwoord: $password<br>";
    } else {
      echo "Error fetching user information from database.";
    }
  ?>
  <button>Wachtwoord veranderen</button>
</div>

            </div>
        </div>
    </div>
</body>
</html>