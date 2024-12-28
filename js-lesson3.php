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
    <title>Lesson 3: Basic Data Types</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="lesson-template.css">
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
            <h1>Lesson 3: Basic Data Types</h1>
       
                <p>JavaScript uses different types of data to store and work with information. The most common types are strings, numbers, booleans, and undefined. Understanding these types helps write clean, organized, and functional code.</p>

            

            <!-- Strings -->
            <div class="introduction">
                <h2>1. Strings</h2>
                <p>Strings are text and are written inside quotes.</p>
                <div class="code-container">
                    <pre>
let greeting = "Hello, World!";
console.log(greeting); // Displays "Hello, World!"
                    </pre>
                </div>
            </div>

            <!-- Numbers -->
            <div class="introduction">
                <h2>2. Numbers</h2>
                <p>Numbers include whole numbers and decimals.</p>
                <div class="code-container">
                    <pre>
let score = 100;
let price = 19.99;

console.log("Score: " + score);   // Displays "Score: 100"
console.log("Price: $" + price);  // Displays "Price: $19.99"
                    </pre>
                </div>
            </div>

            <!-- Booleans -->
            <div class="introduction">
                <h2>3. Booleans</h2>
                <p>Booleans are <code>true</code> or <code>false</code> values.</p>
                <div class="code-container">
                    <pre>
let isStudent = true;
let hasGraduated = false;

console.log(isStudent);      // Displays true
console.log(hasGraduated);   // Displays false
                    </pre>
                </div>
            </div>

            <!-- Undefined -->
            <div class="introduction">
                <h2>4. Undefined</h2>
                <p>A variable with no value is <code>undefined</code>.</p>
                <div class="code-container">
                    <pre>
let name;
console.log(name); // Displays undefined
                    </pre>
                </div>
            </div>

            <!-- Interactive Exercise -->
<div class="card">
    <h2>Interactive Exercise</h2>

    <!-- Question 1 -->
    <h3>1. Create a variable with the number 10:</h3>
    <div class="code-container">
        <code>
            let number = <input type="text" id="q1" placeholder="_____" style="width: 50px; font-size: 14px;">;
        </code>
    </div>
    <button onclick="checkQ1()">Submit</button>
    <p id="q1-feedback"></p>

    <!-- Question 2 -->
    <h3>2. What will this code display?</h3>
    <div class="code-container">
        <code>
            let isRainy = true;<br>
            console.log(<input type="text" id="q2" placeholder="_____" style="width: 70px; font-size: 14px;">);
        </code>
    </div>
    <button onclick="checkQ2()">Submit</button>
    <p id="q2-feedback"></p>

    <!-- Question 3 -->
    <h3>3. Fix the code to store a string ("Alex") in the variable <code>name</code>:</h3>
    <div class="code-container">
        <code>
            let name = <input type="text" id="q3" placeholder="_____" style="width: 70px; font-size: 14px;">;
        </code>
    </div>
    <button onclick="checkQ3()">Submit</button>
    <p id="q3-feedback"></p>
</div>


            <!-- Navigation Links -->
            <p style="margin-top: 20px;">
                <a href="js-lesson2.php" style="color: #ffd700; text-decoration: none;">&lt; Back: Lesson 2</a> | 
                <a href="js-lesson4.php" style="color: #ffd700; text-decoration: none;">Next: Lesson 4 &gt;</a>
            </p>
        </div>
    </div>

    <!-- JavaScript Validation -->
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
            document.getElementById("q1-feedback").innerText = answer === "10" ? "Correct! 🎉" : "Try again! The correct value is 10.";
        }
        function checkQ2() {
            const answer = document.getElementById("q2").value.trim();
            document.getElementById("q2-feedback").innerText = answer === "isRainy" ? "Correct! 🎉 The output is 'true'." : "Incorrect. Use the variable name.";
        }
        function checkQ3() {
            const answer = document.getElementById("q3").value.trim();
            document.getElementById("q3-feedback").innerText = (answer === '"Alex"' || answer === "'Alex'") ? "Correct! 🎉" : "Try again! Use quotes for a string.";
        }
    </script>
</body>
</html>
