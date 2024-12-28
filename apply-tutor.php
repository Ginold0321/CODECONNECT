<?php
session_start();
include("databaseCon.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize user inputs
    $email = mysqli_real_escape_string($con, $_POST['Email']);
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if the email already exists
    if (mysqli_num_rows($result) > 0) {
        echo "<script>
                alert('This email address is already registered. Please use a different one.');
                window.location.href = 'apply-tutor.php'; // Redirect back to the form
              </script>";
    } else {
        // Collect other form data
        $firstName = mysqli_real_escape_string($con, $_POST['FirstName']);
        $lastName = mysqli_real_escape_string($con, $_POST['LastName']);
        $phoneNumber = mysqli_real_escape_string($con, $_POST['PhoneNumber']);
        $education = mysqli_real_escape_string($con, $_POST['Education']);
        $background = mysqli_real_escape_string($con, $_POST['Background']);
        $itExperience = mysqli_real_escape_string($con, $_POST['ITxp']);
        $language = mysqli_real_escape_string($con, $_POST['Language']);
        
        // Handle Profile Image Upload
        $profileImagePath = '';
        if (isset($_FILES['ProfileImage']) && $_FILES['ProfileImage']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/profile_images/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);  // Create directory if it doesn't exist
            }

            $profileImageName = basename($_FILES['ProfileImage']['name']);
            $profileImagePath = $uploadDir . uniqid() . "_" . $profileImageName;
            $imageType = mime_content_type($_FILES['ProfileImage']['tmp_name']);
            $allowedImageTypes = ['image/jpeg', 'image/png', 'image/jpg'];

            // Only accept JPEG, PNG, or JPG images
            if (in_array($imageType, $allowedImageTypes)) {
                move_uploaded_file($_FILES['ProfileImage']['tmp_name'], $profileImagePath);
            } else {
                echo "<script>
                        alert('Invalid profile image. Only JPG, PNG, JPEG images are allowed.');
                        window.location.href = 'apply-tutor.php';
                      </script>";
                exit;
            }
        }

        // Handle Resume Upload
        $resumePath = '';
        $uploadDir = 'uploads/resumes/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);  // Create directory if it doesn't exist
        }

        if (isset($_FILES['Resume']) && $_FILES['Resume']['error'] === UPLOAD_ERR_OK) {
            $resumeName = basename($_FILES['Resume']['name']);
            $resumePath = $uploadDir . uniqid() . "_" . $resumeName;

            $allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
            $fileType = mime_content_type($_FILES['Resume']['tmp_name']);

            // Only allow certain file types for the resume
            if (in_array($fileType, $allowedTypes)) {
                move_uploaded_file($_FILES['Resume']['tmp_name'], $resumePath);
            } else {
                echo "<script>
                        alert('Invalid resume file type. Only PDF, DOC, and DOCX are allowed.');
                        window.location.href = 'apply-tutor.php';
                      </script>";
                exit;
            }
        }

        // Prepare the SQL query to insert data into the database
        $query = "INSERT INTO tutor_applications 
                  (first_name, last_name, phone_number, email, education_level, teaching_experience, it_experience, resume_path, profile_image, languages)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare the SQL statement
        $stmt = mysqli_prepare($con, $query);

        // Check if the preparation is successful
        if ($stmt === false) {
            die('MySQL prepare error: ' . mysqli_error($con));
        }

        // Bind the parameters
        mysqli_stmt_bind_param($stmt, 'ssssssssss', $firstName, $lastName, $phoneNumber, $email, $education, $background, $itExperience, $resumePath, $profileImagePath, $language);

        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                    alert('Application submitted successfully! Please wait for our email.');
                    window.location.href = 'apply-tutor.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error: " . mysqli_error($con) . "');
                    window.location.href = 'apply-tutor.php';
                  </script>";
        }
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
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="apply-tutor.css">
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

    <div class="appl">
        <form method="POST" enctype="multipart/form-data">
            <div class="input-box">
                <label for="FirstName">First Name</label>
                <input type="text" id="FirstName" name="FirstName" placeholder="Enter your first name" required>
            </div>
            <div class="input-box">
                <label for="LastName">Last Name</label>
                <input type="text" id="LastName" name="LastName" placeholder="Enter your last name" required>
            </div>
            <div class="input-box">
                <label for="PhoneNumber">Phone Number</label>
                <input type="text" id="PhoneNumber" name="PhoneNumber" placeholder="09XXXXXXXXX" pattern="09\d{9}" required>
            </div>
            <div class="input-box">
                <label for="Email">Email</label>
                <input type="email" id="Email" name="Email" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
                <label for="Education">Highest Educational Attainment</label>
                <select id="Education" name="Education" required>
                    <option value="" disabled selected>Select your highest level</option>
                    <option value="High School Diploma">High School Diploma</option>
                    <option value="Associate Degree">Associate Degree</option>
                    <option value="Bachelor's Degree">Bachelor's Degree</option>
                    <option value="Master's Degree">Master's Degree</option>
                    <option value="Doctorate">Doctorate</option>
                </select>
            </div>
            <div class="input-box">
                <label for="Background">Teaching Experience</label>
                <textarea id="Background" name="Background" placeholder="Describe your teaching experience, subjects, and skills" required></textarea>
            </div>
            <div class="input-box">
                <label for="ITxp">Experience in Information Technology Field:</label>
                <textarea id="ITxp" name="ITxp" placeholder="Describe your Knowledge in Information Technology Field" required></textarea>
            </div>
            <div class="input-box">
                <label for="ProfileImage">Upload Profile Image</label>
                <input type="file" id="ProfileImage" name="ProfileImage" accept="image/jpeg, image/png, image/jpg" required>
            </div>
            <div class="input-box">
                <label for="Language">Select Programming Language</label>
                <select id="Language" name="Language" required>
                    <option value="" disabled selected>Select language</option>
                    <option value="Python">Python</option>
                    <option value="JavaScript">JavaScript</option>
                    <option value="Java">Java</option>
                    <option value="C++">C++</option>
                    <option value="Ruby">Ruby</option>
                    <option value="PHP">PHP</option>
                    <option value="Go">Go</option>
                    <!-- Add more languages based on the categories you've mentioned -->
                </select>
            </div>
            <div class="input-box">
                <label for="Resume">Upload Your Resume (PDF, DOC, DOCX)</label>
                <input type="file" id="Resume" name="Resume" accept=".pdf, .doc, .docx" required>
            </div>
            <button type="submit">Submit Application</button>
        </form>
    </div>

</body>

</html>
