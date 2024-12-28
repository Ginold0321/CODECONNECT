<?php
session_start();
include("databaseCon.php");

if (isset($_SESSION['Username'])) {
    $username = $_SESSION['Username'];
} else {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $receiver = $_POST['receiver'];
    $message = mysqli_real_escape_string($con, $_POST['message']);

    // Insert the message into the messages table
    $query = "INSERT INTO messages (sender_username, receiver_username, message) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 'sss', $username, $receiver, $message);

    if (mysqli_stmt_execute($stmt)) {
        // Redirect back to the message page with the tutor's ID after sending the message
        header("Location: message.php?tutor_id=" . $_GET['tutor_id']);
        exit();
    } else {
        echo "Error sending message: " . mysqli_error($con);
    }
}
?>
