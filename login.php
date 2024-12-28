<?php
session_start();
include("databaseCon.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    if (!empty($username) && !empty($password)) {
        // Special check for admin username and password
        if ($username == 'admin' && $password == 'admin') {
            // Redirect admin to the admin page
            $_SESSION['Username'] = 'admin';
            header("Location: admin-page.php");
            exit();
        }

        // Check normal user credentials from the database
        $query = "SELECT * FROM users WHERE Username='$username' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                // Verify the password
                if ($user_data['Password'] == $password) {
                    $_SESSION['Username'] = $user_data['Username'];
                    $_SESSION['FullName'] = $user_data['FullName'];
                    $_SESSION['Location'] = $user_data['Location'];
                    $_SESSION['Email'] = $user_data['Email'];
                    $_SESSION['PhoneNumber'] = $user_data['PhoneNumber'];

                    // Redirect to the user's main page
                    header("Location: page.php");
                    exit();
                } else {
                    echo "<script>alert('Invalid password');</script>";
                }
            } else {
                echo "<script>alert('User not found');</script>";
            }
        } else {
            echo "<script>alert('Database query failed');</script>";
            echo "MySQL Error: " . mysqli_error($con);
        }
    } else {
        echo "<script>alert('Please fill in all fields');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Connect</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="images/logo.png" alt="CONNECT">
        </div>

        <form method="POST">
            <div class="logins">Login</div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="Username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="Password" required>
                <i class="fa fa-eye" aria-hidden="true"></i>
            </div>

            <button type="submit">Login</button>
        </form>

        <hr>
        <div class="social-buttons">
            <button>
                <i class="fa fa-google" aria-hidden="true"></i>Google
            </button>
            <button>
                <i class="fa fa-facebook" aria-hidden="true"></i>Facebook
            </button>
        </div>

        <button type="button" onclick="window.location.href='signup.php';">Sign Up</button>
    </div>

    <script>
        const passwordInput = document.getElementById('password');
        const showPasswordIcon = document.querySelector('.fa-eye');

        showPasswordIcon.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });


    </script>
</body>

</html>