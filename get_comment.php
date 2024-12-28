<?php
include("databaseCon.php");

$query = "SELECT username, comment, timestamp FROM comments ORDER BY timestamp DESC";
$result = mysqli_query($con, $query);

$comments = [];
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $comments[] = $row;
    }
}

echo json_encode($comments);
?>
