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
    <title>Lesson 2: Using Variables</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="lesson-template.css">
</head>

<style>



</style>
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
                <li class="pl-lesson-item"><a href="js-ov.php" class="pl-lesson-link">Introduction</a></li>
                <li class="pl-lesson-item "><a href="js-lesson1.php" class="pl-lesson-link">Lesson 1</a></li>
                <li class="pl-lesson-item"><a href="js-lesson2.php" class="pl-lesson-link">Lesson 2</a></li>
                <li class="pl-lesson-item"><a href="js-lesson3.php" class="pl-lesson-link">Lesson 3</a></li>
                <li class="pl-lesson-item"><a href="js-lesson4.php" class="pl-lesson-link">Lesson 4</a></li>
                <li class="pl-lesson-item"><a href="js-lesson5.php" class="pl-lesson-link">Lesson 5</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h1>Lesson 2: Using Variables</h1>

            <div class="introduction">
                <h2>Creating and Using Variables</h2>
                <p>Variables in JavaScript are used to store information like text or numbers. Use <code>let</code>, <code>const</code>, or <code>var</code> to declare variables.</p>
                <div class="code-container">
                    <pre>
let name = "John"; // Stores a name
let age = 25; // Stores a number

console.log("Name: " + name); // Displays "Name: John"
console.log("Age: " + age);   // Displays "Age: 25"
                    </pre>
                </div>
                <p>Here, <code>name</code> stores a string ("John"), and <code>age</code> stores a number.</p>
            </div>

            <div class="introduction">
                <h2>Changing Variable Values</h2>
                <p>Variable values can be updated after they are created.</p>
                <div class="code-container">
                    <pre>
let city = "New York";
console.log(city); // Displays "New York"

city = "London";
console.log(city); // Displays "London"
                    </pre>
                </div>
                <p>In this example, the value of <code>city</code> changes from "New York" to "London".</p>
            </div>




            <div class="section-line"></div>




            <!-- Interactive Exercise -->
<div class="card">
    <h2>Interactive Exercise</h2>

    <!-- Question 1 -->
    <h3>1. Create a variable named <strong>fruit</strong> that stores "Apple":</h3>
    <div class="code-container">
        <code>
            let <input type="text" id="q1" placeholder="_____" style="width: 50px; font-size: 14px;"> = "Apple";
        </code>
    </div>
    <button onclick="checkQ1()">Submit</button>
    <p id="q1-feedback"></p>

    <!-- Question 2 -->
    <h3>2. What will this code display?</h3>
    <div class="code-container">
        <code>
            let color = "blue";<br>
            console.log(<input type="text" id="q2" placeholder="_____" style="width: 70px; font-size: 14px;">);
        </code>
    </div>
    <button onclick="checkQ2()">Submit</button>
    <p id="q2-feedback"></p>

    <!-- Question 3 -->
    <h3>3. Update the variable <strong>score</strong> to store 100:</h3>
    <div class="code-container">
        <code>
            let score = 50;<br>
            score = <input type="text" id="q3" placeholder="_____" style="width: 50px; font-size: 14px;">;<br>
            console.log(score);
        </code>
    </div>
    <button onclick="checkQ3()">Submit</button>
    <p id="q3-feedback"></p>
</div>

            <!-- Navigation Links -->
            <p style="margin-top: 20px;">
                <a href="js-lesson1.php" style="color: #ffd700; text-decoration: none;">&lt; Back: Lesson 1</a> | 
                <a href="js-lesson3.php" style="color: #ffd700; text-decoration: none;">Next: Lesson 3 &gt;</a>
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
            
        function checkQ1() {
            const answer = document.getElementById("q1").value.trim();
            document.getElementById("q1-feedback").innerText = answer === "fruit" ? "Correct! 🎉" : "Try again! Hint: The variable name is 'fruit'.";
        }
        function checkQ2() {
            const answer = document.getElementById("q2").value.trim();
            document.getElementById("q2-feedback").innerText = answer === "color" ? "Correct! 🎉 The output is 'blue'." : "Incorrect. Use the variable name.";
        }
        function checkQ3() {
            const answer = document.getElementById("q3").value.trim();
            document.getElementById("q3-feedback").innerText = answer === "100" ? "Correct! 🎉" : "Try again! The correct value is 100.";
        }
    </script>
</body>
</html>
