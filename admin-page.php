<?php 
session_start();
include("databaseCon.php");

// Include Composer's autoloader (if you're using Composer)
require 'vendor/autoload.php';  // Adjust the path to where Composer's autoloader is located

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_SESSION['Username'])) {
    if ($_SESSION['Username'] !== 'admin') {
        header("Location: restricted.php");
        exit();
    }

    $username = $_SESSION['Username'];

    $query = "SELECT * FROM tutor_applications WHERE status = 'pending'";
    $applicantResult = mysqli_query($con, $query);

    if (!$applicantResult) {
        die("Query failed: " . mysqli_error($con));
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['action'], $_POST['applicant_id'])) {
        $applicant_id = $_POST['applicant_id'];
        $action = $_POST['action'];

        if ($action == "accept" || $action == "decline") {
            // Update the applicant status
            $updateQuery = "UPDATE tutor_applications SET status = ? WHERE id = ?";
            if ($stmt = mysqli_prepare($con, $updateQuery)) {
                mysqli_stmt_bind_param($stmt, "si", $action, $applicant_id);
                if (mysqli_stmt_execute($stmt)) {
                    // Get the applicant's email
                    $query = "SELECT email, first_name, last_name FROM tutor_applications WHERE id = '$applicant_id'";
                    $result = mysqli_query($con, $query);
                    $applicant = mysqli_fetch_assoc($result);

                    if ($applicant && filter_var($applicant['email'], FILTER_VALIDATE_EMAIL)) {
                        // Prepare email content
                        $subject = '';
                        $body = '';
                        if ($action == 'accept') {
                            $subject = "Congratulations! Your tutor application has been accepted";
                            $body = "Dear " . $applicant['first_name'] . " " . $applicant['last_name'] . ",<br><br> Congratulations! Your application has been accepted. We will contact you shortly.<br><br>Best regards,<br>Team";
                        } else {
                            $subject = "Sorry! Your tutor application was declined";
                            $body = "Dear " . $applicant['first_name'] . " " . $applicant['last_name'] . ",<br><br> We're sorry, but your application was declined. We appreciate your interest, and we encourage you to apply again in the future.<br><br>Best regards,<br>Team";
                        }

                        // Send email using PHPMailer
                        $mail = new PHPMailer(true);
                        try {
                            // Server settings
                            $mail->isSMTP();
                            $mail->Host       = 'smtp.gmail.com';
                            $mail->SMTPAuth   = true;
                            $mail->Username   = 'codeconnectph@gmail.com';
                            $mail->Password   = 'kpkv mjvh mmgk pakm';
                            $mail->SMTPSecure = 'tls';
                            $mail->Port       = 587;

                            $mail->setFrom('codeconnectph@gmail.com', 'Code Connect PH');
                            $mail->addAddress($applicant['email'], $applicant['first_name'] . " " . $applicant['last_name']);

                            // Content
                            $mail->isHTML(true);
                            $mail->Subject = $subject;
                            $mail->Body    = $body;

                            // Send email
                            $mail->send();
                            echo "<script>alert('Applicant status updated and email sent successfully!'); window.location.href='admin-page.php';</script>";
                        } catch (Exception $e) {
                            echo "<script>alert('Error sending email: " . $mail->ErrorInfo . "'); window.location.href='admin-page.php';</script>";
                        }
                    } else {
                        echo "<script>alert('Invalid email address for this applicant.'); window.location.href='admin-page.php';</script>";
                    }
                } else {
                    echo "<script>alert('Error updating applicant status: " . mysqli_error($con) . "'); window.location.href='admin-page.php';</script>";
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "<script>alert('Error preparing the query.'); window.location.href='admin-page.php';</script>";
            }
        } else {
            echo "<script>alert('Invalid action.'); window.location.href='admin-page.php';</script>";
        }
    }
} else {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tutor Applications</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="admin-page.css">
</head>
<body>
    <nav>
        <img src="images/logo.png" alt="CONNECT">
        <div class="account">
            <div class="profile">
                <img src="images/admin.jpg" alt="ADMIN">
            </div>
            <div class="menu">
                <h3>ADMIN</h3>
                <ul>
                    <li><a href="login.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="page-title">TUTOR APPLICANTS</h1>

        <?php if (mysqli_num_rows($applicantResult) > 0): ?>
            <div class="application-cards">
                <?php while ($row = mysqli_fetch_assoc($applicantResult)): ?>
                    <div class="card">
                        <div class="content">
                            <h3><?php echo $row['first_name'] . " " . $row['last_name']; ?></h3>
                            <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                            <p><strong>Phone:</strong> <?php echo $row['phone_number']; ?></p>
                            <p><strong>Education Level:</strong> <?php echo $row['education_level']; ?></p>
                            <p><strong>Teaching Experience:</strong> <?php echo $row['teaching_experience']; ?></p>
                            
                            <form method="POST" action="">
                                <input type="hidden" name="applicant_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="action" value="accept" class="button accept-btn">Accept</button>
                                <button type="submit" name="action" value="decline" class="button decline-btn">Decline</button>
                            </form>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p>No tutor applicants at the moment.</p>
        <?php endif; ?>
    </div>

    <script src="page.js"></script>
</body>
</html>
