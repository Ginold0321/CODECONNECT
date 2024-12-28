<?php 
session_start();
include("databaseCon.php");

if (isset($_SESSION['Username'])) {
    $username = $_SESSION['Username'];
    
    $query = "SELECT profile_image FROM users WHERE username = '$username'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $profilePath = $row['profile_image'];
        $_SESSION['profileImage'] = $profilePath; 
    } else {
        $profilePath = "images/default_profile.jpg";
    }
} else {
    
    header("Location: login.php"); 
    exit();
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['Fullname'] ?? '';
    $phone = $_POST['PhoneNumber'] ?? '';
    $email = $_POST['Email'] ?? '';
    $message = $_POST['Message'] ?? '';

    if (!empty($fullname) && !empty($phone) && !empty($email) && !empty($message)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'codeconnectph@gmail.com';
                $mail->Password = 'kpkv mjvh mmgk pakm';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('codeconnectph@gmail.com', 'Code Connect PH');
                $mail->addAddress('codeconnectph@gmail.com', 'Code Connect Admin');

                $mail->isHTML(true);
                $mail->Subject = "New Message from $fullname";
                $mail->Body = "<p><strong>Full Name:</strong> $fullname</p>
                               <p><strong>Phone Number:</strong> $phone</p>
                               <p><strong>Email:</strong> $email</p>
                               <p><strong>Message:</strong></p>
                               <p>$message</p>";


                $mail->send();
                echo "<script type='text/javascript'>
                    alert('Message sent successfully. We will get back to you soon!');
                    window.location.href = 'contact.php';
                </script>";
            } catch (Exception $e) {
                error_log("Mailer Error: {$mail->ErrorInfo}");
                echo "<script type='text/javascript'>
                    alert('Message could not be sent. Please try again later.');
                     window.location.href = 'contact.php';
                </script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('Invalid email address.');</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Please fill in all the fields.');</script>";
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Code Connect</title>
  <link rel="icon" type="image/x-icon" href="images/logo.png">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="pages.css">
</head>

<body>
<nav>
        <img src="images/logo.png" alt="CONNECT">



        <div class="account">
            <div class="profile">
                    <?php if (isset($_SESSION['profileImage'])): ?>
                    <img src="<?php echo $_SESSION['profileImage']; ?>" alt="Profile Picture" class="rounded-circle" width="100">
                <?php else: ?>
                    <img src="images/default_profile.jpg" alt="Default" class="rounded-circle" width="100">
                <?php endif; ?>
            </div>

            <div class="menu">
            <?php if (isset($_SESSION['FullName'])): ?>
                <h3><?php echo htmlspecialchars($_SESSION['FullName']); ?></h3>
            <?php else: ?>
                <h3>Guest User</h3>
            <?php endif; ?>

            <p>Student</p>

                <ul>
                    <li>
                        <i class="fa-regular fa-user"></i>
                        <a href="page.php">Home</a>
                    </li>
                    <li>
                        <i class="fa-regular fa-user"></i>
                        <a href="profile.php">Profile</a>
                    </li>
                    <li>
                        <i class="fa-regular fa-envelope"></i>
                        <a href="chat.php">Messages</a>
                    </li>
                    <li>
                        <i class="fa-regular fa-envelope"></i>
                        <a href="contact.php">Contact Us</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-circle-question"></i>
                        <a href="schoolmap.php">School Map</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-circle-question"></i>
                        <a href="apply-tutor.php">Become a Tutor Now</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <a href="login.php">Logout</a>
                    </li>


                </ul>
            </div>
        </div>
        <script src="page.js"></script>


    </nav>
  <div class="containers">
    <div class="contents">
      <div class="left-side">
        <div class="address details">
          <i class='bx bxs-map'></i>
          <div class="topic">Address</div>
          <div class="text-one">Talisay High School</div>
          <div class="text-two">Zone 6 Laurel, Brgy. 6, Talisay, 4220 Batangas</div>
        </div>
        <div class="phone details">
          <i class='bx bxs-phone'></i>
          <div class="topic">Phone</div>
          <div class="text-one">+63 992-466-1012</div>
          <div class="text-two">+63 968-714-6301</div>
        </div>
        <div class="email details">
          <i class='bx bxs-envelope'></i>
          <div class="topic">Email</div>
          <div class="text-one">codeconnectph@gmail.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>
        <form method="POST">
    <div class="input-box">
        <input type="text" name="Fullname" placeholder="Full Name" required>
    </div>
    <div class="input-box">
        <input type="text" name="PhoneNumber" placeholder="Phone number" pattern="09\d{9}" required>
    </div>
    <div class="input-box">
        <input type="email" name="Email" placeholder="Email" required>
    </div>
    <div class="input-box message-box">
        <textarea name="Message" required placeholder="Message"></textarea>
    </div>
    <button type="submit">Send Now</button>
</form>

      </div>
    </div>
  </div>
</body>

</html>