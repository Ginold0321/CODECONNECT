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
    <title>Lesson 5: Using If Statements</title>
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
            <!-- Lesson Introduction -->
                <h1>Lesson 5: Using If Statements</h1>
                <p>If statements allow your program to make decisions by running specific code when a condition is true. They help control the flow of your program based on logical checks. You can also use <code>else</code> and <code>else if</code> to handle multiple conditions.</p>

            <!-- Basic If Statement -->
            <div class="introduction">
                <h2>Basic If Statement</h2>
                <p>An <code>if</code> statement checks if a condition is true. If it is, the code inside the curly braces <code>{ }</code> runs.</p>
                <div class="code-container">
                    <pre>
let age = 18;

if (age >= 18) {
    console.log("You are allowed to vote.");
}
                    </pre>
                </div>
                <p>In this example, the program checks if the value of <code>age</code> is 18 or more. Since the condition is true, the message "You are allowed to vote" is displayed.</p>
            </div>

            <!-- Using Else -->
            <div class="introduction">
                <h2>Using Else</h2>
                <p>The <code>else</code> keyword lets you run code when the condition in the <code>if</code> statement is false.</p>
                <div class="code-container">
                    <pre>
let age = 16;

if (age >= 18) {
    console.log("You are allowed to vote.");
} else {
    console.log("You are too young to vote.");
}
                    </pre>
                </div>
                <p>Here, if the condition <code>age >= 18</code> is false, the program executes the code inside <code>else</code>. For this example, the message "You are too young to vote" will be displayed.</p>
            </div>

            <!-- Multiple Conditions: Else If -->
            <div class="introduction">
                <h2>Multiple Conditions: Else If</h2>
                <p>The <code>else if</code> statement lets you check additional conditions if the first condition is false.</p>
                <div class="code-container">
                    <pre>
let score = 85;

if (score >= 90) {
    console.log("Grade: A");
} else if (score >= 80) {
    console.log("Grade: B");
} else {
    console.log("Grade: C");
}
                    </pre>
                </div>
                <p>In this program, the score is compared against multiple conditions. If <code>score >= 90</code> is false, the program checks <code>score >= 80</code>. If both conditions are false, the program executes the final <code>else</code> block.</p>
            </div>

            <!-- Interactive Exercise -->
            <div class="card">
                <h2>Interactive Exercise</h2>

                <!-- Question 1 -->
                <h3>1. Fill in the blank to check if the score is greater than or equal to 50:</h3>
                <div class="code-container">
                    <code>
                        let score = 60;<br>
                        if (score <input type="text" id="q1" placeholder="_____" style="width: 70px;"> 50) {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;console.log("You passed!");<br>
                        }
                    </code>
                </div>
                <button onclick="checkQ1()">Submit</button>
                <p id="q1-feedback"></p>

                <!-- Question 2 -->
                <h3>2. Complete the code to show an "adult" or "child" message:</h3>
                <div class="code-container">
                    <code>
                        let age = 15;<br>
                        if (age >= 18) {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;console.log("You are an adult.");<br>
                        } <input type="text" id="q2" placeholder="_____" style="width: 70px;"> {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;console.log("You are a child.");<br>
                        }
                    </code>
                </div>
                <button onclick="checkQ2()">Submit</button>
                <p id="q2-feedback"></p>

                <!-- Question 3 -->
                <h3>3. What will this code display if <code>marks = 80</code>?</h3>
                <div class="code-container">
                    <code>
                        let marks = 80;<br>
                        if (marks >= 90) {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;console.log("Grade: A");<br>
                        } else if (marks >= 80) {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;console.log("Grade: <input type="text" id="q3" placeholder="_____" style="width: 70px;">");<br>
                        } else {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;console.log("Grade: C");<br>
                        }
                    </code>
                </div>
                <button onclick="checkQ3()">Submit</button>
                <p id="q3-feedback"></p>
            </div>

            <!-- Navigation Links -->
            <p style="margin-top: 20px;">
                <a href="js-lesson4.php" style="color: #ffd700; text-decoration: none;">&lt; Back: Lesson 4</a> | 
                <a href="page.php" style="color: #ffd700; text-decoration: none;">Home &gt;</a>
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
            document.getElementById("q1-feedback").innerText = answer === ">=" ? "Correct! 🎉" : "Try again! Use '>=' to compare.";
        }

        function checkQ2() {
            const answer = document.getElementById("q2").value.trim();
            document.getElementById("q2-feedback").innerText = answer === "else" ? "Correct! 🎉" : "Try again! Use 'else' to handle the alternative case.";
        }

        function checkQ3() {
            const answer = document.getElementById("q3").value.trim();
            document.getElementById("q3-feedback").innerText = answer === "B" ? "Correct! 🎉 Grade: B is displayed." : "Try again! The correct grade is 'B'.";
        }
    </script>
</body>
</html>
