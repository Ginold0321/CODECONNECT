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
    <title>Lesson Page</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="lesson-template.css">


</head>
<body>

    <nav>
        <img src="images/logo.png" class="logo">

        <div class="search">
            <input type="text" placeholder="Search...">
            <i class="bx bx-search icon"></i>
        </div>
        <img src="images/user.png" class="user-pic" onclick="toggleMenu()">

        <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
                <div class="user-info">
                    <img src="images/user.png">
                    <h2>Shiela Velasquez</h2>
                </div>
                <hr>

                <a href="#" class="sub-menu-link">
                    <img src="images/dashboard.png">
                    <p>Dashboard</p>
                    <span></span>
                </a>
                <a href="#" class="sub-menu-link">
                    <img src="images/messages.png">
                    <p>Messages</p>
                    <span></span>
                </a>
                <a href="#" class="sub-menu-link">
                    <img src="images/home.png">
                    <p>Home</p>
                    <span></span>
                </a>
                <a href="#" class="sub-menu-link">
                    <img src="images/about.png">
                    <p>About Us</p>
                    <span></span>
                </a>
                <a href="#" class="sub-menu-link">
                    <img src="images/contact.png">
                    <p>Contact Us</p>
                    <span></span>
                </a>
                <a href="#" class="sub-menu-link">
                    <img src="images/privacy.png">
                    <p>Privacy Policy</p>
                    <span></span>
                </a>
                <a href="#" class="sub-menu-link">
                    <img src="images/setting.png">
                    <p>Settings</p>
                    <span></span>
                </a>
                <hr>
                <a href="#" class="sub-menu-link">
                    <img src="images/logout.png">
                    <p>Logout</p>
                    <span></span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Overview</h2>
            <ul class="pl-lesson-list">
                <li class="pl-lesson-item active"><a href="js-ov.html" class="pl-lesson-link">Introduction</a></li>
                <li class="pl-lesson-item"><a href="js-lesson1.html" class="pl-lesson-link">Lesson 1</a></li>
                <li class="pl-lesson-item"><a href="js-lesson2.html" class="pl-lesson-link">Lesson 2</a></li>
                <li class="pl-lesson-item"><a href="js-lesson3.html" class="pl-lesson-link">Lesson 3</a></li>
                <li class="pl-lesson-item"><a href="js-lesson4.html" class="pl-lesson-link">Lesson 4</a></li>
                <li class="pl-lesson-item"><a href="js-lesson5.html" class="pl-lesson-link">Lesson 5</a></li>
                <li class="pl-lesson-item"><a href="js-lesson6.html" class="pl-lesson-link">Lesson 6</a></li>
                <li class="pl-lesson-item"><a href="js-lesson7.html" class="pl-lesson-link">Lesson 7</a></li>
                <li class="pl-lesson-item"><a href="js-lesson8.html" class="pl-lesson-link">Lesson 8</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h1>JAVASCRIPT LANGUAGE</h1>
            <p>JavaScript is a coding language that makes websites interactive and fun to use. It adds features like buttons that respond when clicked, animations, and pop-up messages. Unlike other programming languages, JavaScript runs directly in a web browser, which makes it easy to start learning and see results quickly.</p>
            <p>Websites use JavaScript to do things like update content without reloading the page, check forms for errors, or display animations. Learning JavaScript is an important step for anyone who wants to build websites or web applications.</p>

            <div class="cta-card">
                <h3>Learn JavaScript</h3>
                <p>JavaScript works together with HTML and CSS to create websites that look good and work smoothly. It is also used to build games, apps, and more. Even beginners can start coding with JavaScript and create something exciting right away.</p>
                <div class="buttons">
                    <a href="#js-lesson1.php" class="button">Start Java Chapter 1</a>
                    <a href="tutor-profile.php" class="button">Schedule with an IT Student Tutor!</a>
                </div>
            </div>

            <a href="#" class="button">See Video Tutorials</a>
            <a href="#" class="button">Exercises</a>

            <div class="section-line"></div>

            <!-- What is JavaScript -->
            <h2>What is JavaScript?</h2>
            <p>
                JavaScript is a programming language that makes web pages interactive. It adds behavior to websites, like buttons that respond when clicked or content that changes without refreshing the page.
            </p>

            <!-- What Can JavaScript Do -->
            <h2>What Can JavaScript Do?</h2>
            
            <h3>Add Interactive Elements Like Buttons and Forms</h3>
            <p>
                JavaScript lets you add buttons, forms, and other features that respond to user actions. For example, when someone clicks a button, JavaScript can show a message or change something on the page.
            </p>

            <h3>Display Messages or Alerts to Users</h3>
            <p>
                JavaScript can display alerts, messages, or notifications to the user. For instance, when someone forgets to fill in a form, JavaScript can show a warning asking them to complete it.
            </p>

            <h3>Update Webpage Content Automatically</h3>
            <p>
                JavaScript can update parts of a webpage without needing to reload the entire page. This makes websites faster and more responsive. For example, it can update news headlines or load new comments.
            </p>

            <h3>Build Games and Animations</h3>
            <p>
                JavaScript is also used to create games and animations. Developers can make objects move, change colors, or respond to user actions, making websites and apps more engaging and fun.
            </p>

            <!-- Why Learn JavaScript -->
            <h2>Why Learn JavaScript?</h2>
            <p>
                JavaScript is essential for creating websites that are interactive and dynamic. It’s also used for building games, mobile apps, and web applications.
            </p>

            <!-- JavaScript Code Example -->
            <h2>Example of JavaScript Code:</h2>
            <div class="code-container">
                <pre>
                &lt;script&gt;
                    function showMessage() {
                        document.getElementById("demo").innerText = "Hello, JavaScript!";
                    }
                &lt;/script&gt;
                        </pre>
                        <button onclick="showMessage()" style="padding: 10px; background-color: #ffd700; border: none; border-radius: 5px; font-weight: bold;">Try it!</button>
                        <p id="demo" style="margin-top: 10px; color: #ffd700; font-weight: bold;"></p>
                    </div>

                    <!-- Navigation Links -->
                    <p style="margin-top: 20px;">
                        <a href="page.php" style="color: #ffd700; text-decoration: none;">&lt; Back: Home</a> | 
                        <a href="js-lesson1.php" style="color: #ffd700; text-decoration: none;">Next: Lesson 1 &gt;</a>
                    </p>
                </div>
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
