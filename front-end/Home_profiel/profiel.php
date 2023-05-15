
<?php
session_start();


  require_once('../../back-end/connection.php');
  $username = $_SESSION['name'];
  $query = "SELECT email, password, profiel_pic FROM users WHERE name='$username'";
  $result = mysqli_query($con, $query);

  if ($result) {
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $password = $row['password'];
    $profiel_pic = $row['profiel_pic'];
    
  } else {
    echo "Error fetching user information from database.";
  }
  
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
            
            <ul>
                <li><a href="#"><a href="index.html">Home</a></li>
                <li><a href="#"><a href="profiel.php">Profiel</a></li>
                <li><a href="#"><a href="loguit.php">Log uit</a></li>
            </ul>
        </div>
        <div class="content">
            <div>
            <form action="upload.php" method="post" enctype="multipart/form-data">
            <input class="uploadButton" type="file" name="profiel_pic">
            <input class="uploadButton"  type="submit" value="Upload">
            </form>

                <button class="box1">
                <?php
                  
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($profiel_pic) . '">';
                  
                ?>
            
                <div class="profiel-text">
                <?php


                echo "Gebruikersnaam: $username<br>";
                echo "E-Mail: $email<br>";
                echo "Wachtwoord: $password<br>";
              
            ?>
  <a href="rest-password.php" class="btn btn-warning">Reset Your Password</a>
</div>

            </div>
        </div>
    </div>
</body>
</html>