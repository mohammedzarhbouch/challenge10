<?php
// Retrieve score from local storage
$score = $_POST['score'];

// Retrieve user_id and quiz_id (assuming you have them stored somewhere)
$user_id = $_POST['id'];
$quiz_id = $_POST['quiz_id'];

// Prepare SQL statement
$sql = "INSERT INTO infoscore (score, user_id, quiz_id) VALUES ($score, $user_id, $quiz_id)";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
  echo "Score inserted successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>