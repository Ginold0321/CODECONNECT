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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS Language</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="lesson-template.css">

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



    <!-- Main Container -->
    <div class="container">
        <!-- Sidebar -->
        <<div class="sidebar">
            <h2>Overview</h2>
            <ul class="pl-lesson-list">
                <li class="pl-lesson-item"><a href="css-ov.php" class="pl-lesson-link">Introduction</a></li>
                <li class="pl-lesson-item"><a href="css-lesson1.php" class="pl-lesson-link">Lesson 1</a></li>
                <li class="pl-lesson-item "><a href="css-lesson2.php" class="pl-lesson-link">Lesson 2</a></li>
                <li class="pl-lesson-item"><a href="css-lesson3.php" class="pl-lesson-link">Lesson 3</a></li>
                <li class="pl-lesson-item"><a href="css-lesson4.php" class="pl-lesson-link">Lesson 4</a></li>
                <li class="pl-lesson-item"><a href="css-lesson5.php" class="pl-lesson-link">Lesson 5</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Page Title -->
            <h1>CSS LANGUAGE</h1>
            <p>CSS stands for <strong>Cascading Style Sheets</strong>. It is used to style and design HTML pages. With CSS, you can control the colors, fonts, layouts, and animations to make your webpage look polished and professional.</p>

            <p>Think of CSS as the "design" part of a website. It helps you make a webpage visually appealing, easy to read, and well-organized.</p>

            <!-- Call-to-Action -->
            <div class="cta-card">
                <h3>Learn CSS</h3>
                <p>CSS is simple to learn and fun to use. With it, you can turn a basic HTML page into a stunning and professional-looking website.</p>
                <div class="buttons">
                    <a href="css-lesson1.php" class="button">Start CSS Chapter 1</a>
                    <a href="tutor-profile.php" class="button">Schedule with an IT Student Tutor!</a>
                </div>
            </div>

            <a href="#" class="button">See Video Tutorials</a>
            <a href="#" class="button">Exercises</a>

            <!-- Section Line -->
            <div class="section-line"></div>

            <!-- Introduction to CSS -->
            <h2>Introduction to CSS</h2>

            <h3>What is CSS?</h3>
            <p>CSS stands for <strong>Cascading Style Sheets</strong>. It is used to control the look and feel of a webpage, including text styles, colors, layouts, and animations.</p>

            <!-- What Can CSS Do -->
            <h2>What Can CSS Do?</h2>

            <h3>Change Text Color, Size, and Style</h3>
            <p>CSS allows you to change the appearance of text. For example, you can make titles bold and colorful or adjust the size of paragraphs.</p>
            <div class="code-container">
                <pre>
p {
    font-size: 18px;
    color: blue;
    font-weight: bold;
}
                </pre>
            </div>

            <h3>Adjust the Layout of Content</h3>
            <p>CSS helps you control the position of elements on a page. You can align text, add spacing, and organize content into sections.</p>
            <div class="code-container">
                <pre>
div {
    margin: 20px;
    text-align: center;
}
                </pre>
            </div>

            <h3>Add Background Colors and Images</h3>
            <p>CSS lets you set background colors or add images to enhance the design of your webpage.</p>
            <div class="code-container">
                <pre>
body {
    background-color: lightblue;
}

h1 {
    background-image: url('header-background.jpg');
    color: white;
    padding: 20px;
}
                </pre>
            </div>

            <!-- Example Code -->
            <h2>Example of CSS Code</h2>
            <p>Here is an example of a simple CSS file:</p>
            <div class="code-container">
                <pre>
body {
    background-color: lightblue;
}

h1 {
    color: white;
    text-align: center;
}

p {
    font-size: 18px;
    color: black;
}
                </pre>
            </div>

            <!-- Why Learn CSS -->
            <h2>Why Learn CSS?</h2>
            <p>CSS helps you create visually stunning websites that look professional and modern. Without CSS, websites would appear plain and unstyled.</p>

            <!-- Navigation -->
            <p style="margin-top: 20px;">
                <a href="page.php" style="color: #ffd700; text-decoration: none;">&lt; Back: Home</a> | 
                <a href="css-lesson1.php" style="color: #ffd700; text-decoration: none;">Next: Lesson 1 &gt;</a>
            </p>
        </div>
    </div>

    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const userPic = document.querySelector(".user-pic");
            const subMenu = document.getElementById("subMenu");

            userPic.addEventListener("click", function () {
                subMenu.classList.toggle("open-menu");
                console.log("Submenu toggled"); // Check if this runs
            });
        });
    </script>
</body>
</html>
