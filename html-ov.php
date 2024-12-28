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
    <title>HTML Language</title>
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
    <div class="sidebar">
        <h2>Overview</h2>
        <ul class="pl-lesson-list">
            <li class="pl-lesson-item "><a href="html-ov.php" class="pl-lesson-link">Introduction</a></li>
            <li class="pl-lesson-item"><a href="html-lesson1.php" class="pl-lesson-link">Lesson 1</a></li>
            <li class="pl-lesson-item"><a href="html-lesson2.php" class="pl-lesson-link">Lesson 2</a></li>
            <li class="pl-lesson-item"><a href="html-lesson3.php" class="pl-lesson-link">Lesson 3</a></li>
            <li class="pl-lesson-item"><a href="html-lesson4.php" class="pl-lesson-link">Lesson 4</a></li>
            <li class="pl-lesson-item"><a href="html-lesson5.php" class="pl-lesson-link">Lesson 5</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Overview Introduction -->
        <h1>HTML LANGUAGE</h1>
        <p>HTML stands for <strong>HyperText Markup Language</strong>. It is the basic building block of any website. HTML is used to create and organize the structure of a webpage, like adding headings, paragraphs, images, and links. Think of HTML as the skeleton of a website.</p>
        <p>Every webpage you see on the internet uses HTML. It tells the browser what content to display and where to place it. Learning HTML is the first step in building websites because it teaches you how to add and arrange the parts of a webpage.</p>

        <div class="cta-card">
            <h3>Learn HTML</h3>
            <p>HTML is simple to learn and easy to understand. By learning it, you can create your first webpage quickly. It’s perfect for beginners who want to get started with coding.</p>
            <div class="buttons">
                <a href="html-lesson1.php" class="button">Start HTML Chapter 1</a>
                <a href="tutor-profile.php" class="button">Schedule with an IT Student Tutor!</a>
            </div>
        </div>

        <a href="#" class="button">See Video Tutorials</a>
        <a href="#" class="button">Exercises</a>

        <!-- Section Line -->
        <div class="section-line"></div>

        <!-- Introduction to HTML -->
        <h2>Introduction to HTML</h2>

        <h3>What is HTML?</h3>
        <p>HTML stands for <strong>HyperText Markup Language</strong>. It is the standard language for creating websites and web pages. HTML uses "tags" to tell the browser what each part of the webpage should look like.</p>

        <h3>What Can HTML Do?</h3>

        <h4>Create Headings, Paragraphs, and Lists</h4>
        <p>HTML lets you add headings for titles, paragraphs for text, and lists for organizing information. For example, headings are used to name sections of a webpage, and lists can display items like steps or bullet points.</p>

        <h4>Add Images, Links, and Videos</h4>
        <p>HTML allows you to include images, clickable links, and videos on your page. This makes your webpage visually engaging and easy for users to navigate. For example, you can add a picture, link to another website, or embed a video from YouTube.</p>

        <h4>Build the Basic Layout of a Website</h4>
        <p>HTML provides the structure or layout of your website. You can organize content into sections like headers, sidebars, and footers. This helps keep the webpage neat and user-friendly.</p>

        <!-- Why Learn HTML -->
        <h2>Why Learn HTML?</h2>
        <p>HTML is the starting point for anyone who wants to create a website. It’s easy to learn and gives you a solid foundation for web development.</p>

        <!-- Example of HTML Code -->
        <h2>Example of HTML Code:</h2>
        <div class="code-container">
            <pre>
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
&lt;title&gt;My First Page&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;h1&gt;Welcome to My Website!&lt;/h1&gt;
&lt;p&gt;This is my first webpage using HTML.&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;
            </pre>
        </div>

        <!-- Navigation Links -->
        <p style="margin-top: 20px;">
            <a href="page.php" style="color: #ffd700; text-decoration: none;">&lt; Back: Home</a> | 
            <a href="html-lesson1.php" style="color: #ffd700; text-decoration: none;">Next: Lesson 1 &gt;</a>
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