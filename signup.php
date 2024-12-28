<?php
session_start();
include("databaseCon.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fullname = $_POST['FullName'];
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $location = $_POST['Location'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $password = $_POST['Password'];
    $cpass = $_POST['ConfirmPassword'];

    // Check if all fields are filled
    if (!empty($fullname) && !empty($username) && !empty($email) && !empty($location) && !empty($PhoneNumber) && !empty($password) && !empty($cpass)) {

        // Validate phone number format
        if (preg_match('/^09\d{9}$/', $PhoneNumber)) {

            // Check if passwords match
            if ($password === $cpass) {
                
                // Check if the username or email already exists in the database
                $query = "SELECT * FROM users WHERE Username = ? OR Email = ?";
                $stmt = mysqli_prepare($con, $query);
                mysqli_stmt_bind_param($stmt, 'ss', $username, $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                
                // If there are existing records, notify the user and prevent insert
                if (mysqli_num_rows($result) > 0) {
                    echo "<script type='text/javascript'>alert('Username or Email already exists. Please choose another one.');</script>";
                } else {
                    // Proceed with inserting the new user if username and email are unique
                    $query = "INSERT INTO users (FullName, Username, Email, Location, PhoneNumber, Password) 
                              VALUES ('$fullname', '$username', '$email', '$location', '$PhoneNumber', '$password')";

                    if (mysqli_query($con, $query)) {
                        // Send the welcome email using PHPMailer
                        $mail = new PHPMailer(true);

                        try {
                            $mail->isSMTP();
                            $mail->Host       = 'smtp.gmail.com';
                            $mail->SMTPAuth   = true;
                            $mail->Username   = 'codeconnectph@gmail.com';
                            $mail->Password   = 'kpkv mjvh mmgk pakm';
                            $mail->SMTPSecure = 'tls';
                            $mail->Port       = 587;

                            $mail->setFrom('codeconnectph@gmail.com', 'Code Connect PH');
                            $mail->addAddress($email, $fullname);

                            $mail->isHTML(true);
                            $mail->Subject = 'Welcome to Code Connect!';
                            $mail->Body = "
                            <p>Dear $fullname,</p>
                            <p>Thank you for creating an account with Code Connect. Your account has been successfully created.</p>
                            <p><strong>Username:</strong> $username</p>
                            <p><strong>Password:</strong> $password</p>
                            <p>We are excited to have you on board! Whether you're here to learn, teach, or connect, Code Connect is here to support you every step of the way.</p>
                            <p>If you have any questions or need assistance, feel free to reach out to our support team at <a href='mailto:codeconnectph@gmail.com'>codeconnectph@gmail.com</a>.</p>
                            <p>Welcome to the Code Connect community!</p>
                            <p>Best regards,</p>
                            <p>The Code Connect Team</p>
                            ";

                            // Send email
                            $mail->send();

                            // Redirect to login page with success message
                            echo "<script type='text/javascript'>
                                    alert('Account successfully created. A confirmation email has been sent.');
                                    window.location.href = 'login.php';
                                  </script>";
                            exit();
                        } catch (Exception $e) {
                            echo "<script type='text/javascript'>alert('Account created, but email sending failed. Error: {$mail->ErrorInfo}');</script>";
                        }
                    } else {
                        echo "<script type='text/javascript'>alert('Error while saving user.');</script>";
                    }
                }
            } else {
                echo "<script type='text/javascript'>alert('Passwords do not match.');</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('Invalid phone number. It must start with 09 and be 11 digits.');</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Please fill in all fields.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <title>Code Connect</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="images/logo.png" alt="CONNECT">
        </div>

        <form method="POST"> 
            <div class="logins">Sign Up</div>
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" name="FullName">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="Username">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="Email">
            </div>
            <div class="form-group">
                <label for="Location">Address (City, Province):</label>
                <input type="text" name="Location">
            </div>
            <div class="form-group">
                <label for="PhoneNumber">Phone Number</label>
                <input type="text" name="PhoneNumber">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="Password">
            </div>
            <div class="form-group">
                <label for="confim_password">Confirm Password</label>
                <input type="password" name="ConfirmPassword">
            </div>
            
            <div class="g-recaptcha" data-sitekey="6LdnQ5sqAAAAAEF2GpiqrPH-RnczmEO1PXu0c3i7"></div> 
            <button type="submit">Sign up</button>

            <button type="button" onclick="window.location.href='login.php';">Back to Login</button>


    </div>
    </form>

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