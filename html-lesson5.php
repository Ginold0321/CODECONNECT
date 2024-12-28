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
    <title>Lesson 5: Lists in HTML</title>
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
            <!-- Lesson Title -->
            <h1>Lesson 5: Lists in HTML</h1>

            <!-- Lesson Introduction -->
            <div class="introduction">
                <p>Lists help organize content into easy-to-read formats. HTML supports two main types of lists: unordered lists for bullet points and ordered lists for numbered steps. You can also create nested lists and customize list styles.</p>
            </div>

            <!-- Unordered Lists -->
            <h2>Unordered Lists</h2>
            <p>Unordered lists display items with bullets. Use the <code>&lt;ul&gt;</code> tag with <code>&lt;li&gt;</code> for list items.</p>
            <div class="code-container">
                <pre>
&lt;ul&gt;
    &lt;li&gt;Apple&lt;/li&gt;
    &lt;li&gt;Banana&lt;/li&gt;
    &lt;li&gt;Cherry&lt;/li&gt;
&lt;/ul&gt;
                </pre>
            </div>
            <p>This code displays:</p>
            <ul>
                <li>Apple</li>
                <li>Banana</li>
                <li>Cherry</li>
            </ul>

            <!-- Ordered Lists -->
            <h2>Ordered Lists</h2>
            <p>Ordered lists display items with numbers. Use the <code>&lt;ol&gt;</code> tag with <code>&lt;li&gt;</code> for list items.</p>
            <div class="code-container">
                <pre>
&lt;ol&gt;
    &lt;li&gt;Step One&lt;/li&gt;
    &lt;li&gt;Step Two&lt;/li&gt;
    &lt;li&gt;Step Three&lt;/li&gt;
&lt;/ol&gt;
                </pre>
            </div>
            <p>This code displays:</p>
            <ol>
                <li>Step One</li>
                <li>Step Two</li>
                <li>Step Three</li>
            </ol>

            <!-- Nested Lists -->
            <h2>Nested Lists</h2>
            <p>Lists can be nested inside each other. This is useful for creating subcategories.</p>
            <div class="code-container">
                <pre>
&lt;ul&gt;
    &lt;li&gt;Fruits
        &lt;ul&gt;
            &lt;li&gt;Apple&lt;/li&gt;
            &lt;li&gt;Banana&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/li&gt;
    &lt;li&gt;Vegetables&lt;/li&gt;
&lt;/ul&gt;
                </pre>
            </div>
            <p>This code displays:</p>
            <ul>
                <li>Fruits
                    <ul>
                        <li>Apple</li>
                        <li>Banana</li>
                    </ul>
                </li>
                <li>Vegetables</li>
            </ul>

            <!-- List Attributes -->
            <h2>Customizing List Styles</h2>
            <p>Lists can be customized using the <code>type</code> attribute for ordered lists and CSS for unordered lists.</p>
            <ul>
                <li><strong>Ordered List Types</strong>:
                    <ul>
                        <li><code>type="1"</code>: Numbers (default).</li>
                        <li><code>type="A"</code>: Uppercase letters.</li>
                        <li><code>type="a"</code>: Lowercase letters.</li>
                        <li><code>type="I"</code>: Roman numerals.</li>
                    </ul>
                </li>
                <li><strong>Unordered List Styles</strong>: Use CSS to change bullets (e.g., <code>list-style-type: square;</code>).</li>
            </ul>
            <div class="code-container">
                <pre>
&lt;ol type="A"&gt;
    &lt;li&gt;Item One&lt;/li&gt;
    &lt;li&gt;Item Two&lt;/li&gt;
&lt;/ol&gt;

&lt;ul style="list-style-type: square;"&gt;
    &lt;li&gt;Item One&lt;/li&gt;
    &lt;li&gt;Item Two&lt;/li&gt;
&lt;/ul&gt;
                </pre>
            </div>

            <!-- Multiple-Choice Questions -->
            <div class="card">
                <h2>Multiple-Choice Questions</h2>

                <!-- Question 1 -->
                <h3>1. Which tag is used to create an unordered list?</h3>
                <input type="radio" name="q1" value="&lt;ol&gt;"> &lt;ol&gt;<br>
                <input type="radio" name="q1" value="&lt;li&gt;"> &lt;li&gt;<br>
                <input type="radio" name="q1" value="&lt;ul&gt;" id="q1-correct"> &lt;ul&gt;<br>
                <p id="q1-feedback"></p>

                <!-- Question 2 -->
                <h3>2. How do you create a Roman numeral ordered list?</h3>
                <input type="radio" name="q2" value="type='A'"> type="A"<br>
                <input type="radio" name="q2" value="type='I'" id="q2-correct"> type="I"<br>
                <input type="radio" name="q2" value="type='1'"> type="1"<br>
                <p id="q2-feedback"></p>

                <!-- Question 3 -->
                <h3>3. What does the &lt;li&gt; tag represent?</h3>
                <input type="radio" name="q3" value="List text"> A link<br>
                <input type="radio" name="q3" value="List item" id="q3-correct"> List item<br>
                <input type="radio" name="q3" value="Line break"> Line break<br>
                <p id="q3-feedback"></p>

                <button onclick="checkAnswers()" style="margin-top: 10px; background-color: #ffd700; color: #000; padding: 8px 12px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">Check Answers</button>
            </div>

            <!-- Navigation Links -->
            <p style="margin-top: 20px;">
                <a href="html-lesson4.php" style="color: #ffd700; text-decoration: none;">&lt; Back: Lesson 4</a> | 
                <a href="pge.php" style="color: #ffd700; text-decoration: none;">Home &gt;</a>
            </p>
        </div>
    </div>

    <!-- JavaScript for Validation -->
    <script>
            document.addEventListener("DOMContentLoaded", function () {
                const userPic = document.querySelector(".user-pic");
                const subMenu = document.getElementById("subMenu");

                userPic.addEventListener("click", function () {
                    subMenu.classList.toggle("open-menu");
                    console.log("Submenu toggled"); // Check if this runs
                });
            });

        function checkAnswers() {
            const q1 = document.getElementById("q1-correct").checked;
            document.getElementById("q1-feedback").innerText = q1 ? "Correct! 🎉" : "Try again! Use &lt;ul&gt; for unordered lists.";

            const q2 = document.getElementById("q2-correct").checked;
            document.getElementById("q2-feedback").innerText = q2 ? "Correct! 🎉 'type=\"I\"' creates Roman numerals." : "Try again! Use 'type=\"I\"' for Roman numerals.";

            const q3 = document.getElementById("q3-correct").checked;
            document.getElementById("q3-feedback").innerText = q3 ? "Correct! 🎉 The &lt;li&gt; tag represents a list item." : "Try again! The correct answer is 'List item'.";
        }
    </script>
</body>
</html>
