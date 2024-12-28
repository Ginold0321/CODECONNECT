<?php
session_start();
include("databaseCon.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and get POST data
    $user = isset($_POST['username']) ? mysqli_real_escape_string($con, $_POST['username']) : '';
    $comment = isset($_POST['comment']) ? mysqli_real_escape_string($con, $_POST['comment']) : '';

    // Validate inputs
    if (empty($user) || empty($comment)) {
        echo json_encode(['status' => 'error', 'message' => 'Both username and comment are required']);
        exit;
    }

    // Insert comment into the database using a parameterized query
    $sql = "INSERT INTO comments (username, comment) VALUES (?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $user, $comment);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success', 'message' => 'Comment submitted successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error: ' . mysqli_error($con)]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
