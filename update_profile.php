<?php
session_start();
include("databaseCon.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_SESSION['Username'];
    $location = $_POST['Location'];
    $phoneNumber = $_POST['PhoneNumber'];

    if (!empty($username) && !empty($location) && !empty($phoneNumber)) {
        $update_query = "UPDATE users SET Location='$location', PhoneNumber='$phoneNumber' WHERE Username='$username'";

        if (mysqli_query($con, $update_query)) {
            $_SESSION['Location'] = $location;
            $_SESSION['PhoneNumber'] = $phoneNumber;
            header("Location: profile.php");
            exit();
        } else {
            echo "<script>alert('Failed to update profile.');</script>";
        }
    }
}
?>
