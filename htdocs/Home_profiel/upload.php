<?php
  session_start();

  require_once('../../back-end/connection.php');
  $username = $_SESSION['name'];

  // Get the profile picture file and target directory
  $profile_pic_file = $_FILES["profiel_pic"]["tmp_name"];
  $target_dir = "uploads/";

  // Read the contents of the file
  $profile_pic_contents = file_get_contents($profile_pic_file);

  // Escape special characters in the contents
  $profile_pic_contents = mysqli_real_escape_string($con, $profile_pic_contents);

  // Update the user's profile picture in the database
  $query = "UPDATE users SET profiel_pic='$profile_pic_contents' WHERE name='$username'";
  $result = mysqli_query($con, $query);

  if ($result) {
    header("location: profiel.php");
  } else {
    echo "Error updating profile picture in database.";
}

?>
