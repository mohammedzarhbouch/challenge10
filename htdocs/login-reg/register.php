<?php
require_once "../../back-end/connection.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Prepare and bind the SQL statement to insert the user information
    $stmt = $con->prepare("INSERT INTO users (name, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $email);

    // Execute the SQL statement
    $stmt->execute();

    // Check if the SQL statement was executed successfully
    if ($stmt->affected_rows > 0) {
        header("Location: login.html");
    } else {
        echo "Error: Failed to create account. Please try again.";
    }

    // Close the statement
    $stmt->close();
}
?>

