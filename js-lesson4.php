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
    <title>Lesson 4: Writing Functions</title>
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
            <h1>Lesson 4: Writing Functions</h1>

            <p>Functions allow you to group code into reusable blocks that perform specific tasks. This keeps code organized and reduces repetition. In this lesson, you will learn to create, call, and use functions with inputs (parameters).</p>

            <!-- Creating a Function -->
            <div class="introduction">
                <h2>Creating a Function</h2>
                <p>To create a function, use the <code>function</code> keyword followed by a name.</p>
                <div class="code-container">
                    <pre>
function sayHello() {
    console.log("Hello, JavaScript!");
}
                    </pre>
                </div>
            </div>

            <!-- Calling a Function -->
            <div class="introduction">
                <h2>Calling a Function</h2>
                <p>To run a function, you need to "call" it:</p>
                <div class="code-container">
                    <pre>
sayHello(); // Displays "Hello, JavaScript!"
                    </pre>
                </div>
            </div>

            <!-- Functions with Parameters -->
            <div class="introduction">
                <h2>Functions with Parameters</h2>
                <p>Functions can take inputs (parameters) and use them.</p>
                <div class="code-container">
                    <pre>
function greetUser(name) {
    console.log("Hello, " + name + "!");
}

greetUser("Alice"); // Displays "Hello, Alice!"
greetUser("Bob");   // Displays "Hello, Bob!"
                    </pre>
                </div>
            </div>

            <!-- Interactive Exercise -->
            <div class="card">
                <h2>Interactive Exercise</h2>

                <!-- Question 1 -->
                <h3>1. Fill in the blank to create a function named <strong>greet</strong>:</h3>
                <div class="code-container">
                    <code>
                        function <input type="text" id="q1" placeholder="_____" style="width: 70px;">() {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;console.log("Welcome!");<br>
                        }
                    </code>
                </div>
                <button onclick="checkQ1()">Submit</button>
                <p id="q1-feedback"></p>

                <!-- Question 2 -->
                <h3>2. What will this code display?</h3>
                <div class="code-container">
                    <code>
                        function showAge(age) {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;console.log("Age: " + <input type="text" id="q2" placeholder="_____" style="width: 70px;">);<br>
                        }<br>
                        showAge(20);
                    </code>
                </div>
                <button onclick="checkQ2()">Submit</button>
                <p id="q2-feedback"></p>

                <!-- Question 3 -->
                <h3>3. Call this function named <strong>printMessage</strong>:</h3>
                <div class="code-container">
                    <code>
                        function printMessage() {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;console.log("Hello!");<br>
                        }<br>
                        <input type="text" id="q3" placeholder="_____" style="width: 100px;">;
                    </code>
                </div>
                <button onclick="checkQ3()">Submit</button>
                <p id="q3-feedback"></p>
            </div>

            <!-- Navigation Links -->
            <p style="margin-top: 20px;">
                <a href="js-lesson3.php" style="color: #ffd700; text-decoration: none;">&lt; Back: Lesson 3</a> | 
                <a href="js-lesson5.php" style="color: #ffd700; text-decoration: none;">Next: Lesson 5 &gt;</a>
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
            document.getElementById("q1-feedback").innerText = answer === "greet" ? "Correct! 🎉" : "Try again! The function name is 'greet'.";
        }

        function checkQ2() {
            const answer = document.getElementById("q2").value.trim();
            document.getElementById("q2-feedback").innerText = answer === "age" ? "Correct! 🎉 The output is 'Age: 20'." : "Incorrect. Use the parameter 'age'.";
        }

        function checkQ3() {
            const answer = document.getElementById("q3").value.trim();
            document.getElementById("q3-feedback").innerText = answer === "printMessage()" ? "Correct! 🎉" : "Try again! Call the function using 'printMessage()'.";
        }
    </script>
</body>
</html>
