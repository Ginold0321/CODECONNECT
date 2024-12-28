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
    <title>Lesson 4: Creating Links</title>
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
            <h1>Lesson 4: Creating Links</h1>

            <!-- Introduction -->
            <div class="introduction">
                <p>Links allow users to navigate to other pages, websites, or resources. The <code>&lt;a&gt;</code> tag is used to create hyperlinks. Links can also include images, buttons, or email addresses.</p>
            </div>

            <!-- Syntax of a Link -->
            <h2>Syntax of a Link</h2>
            <div class="code-container">
                <pre>
&lt;a href="url"&gt;link text&lt;/a&gt;
                </pre>
            </div>
            <ul>
                <li><strong>href</strong>: Specifies the link destination (URL).</li>
                <li><strong>link text</strong>: The visible, clickable part of the link.</li>
            </ul>

            <!-- Link Styles -->
            <h2>Link Styles by Default</h2>
            <ul>
                <li><strong>Unvisited Links</strong>: Blue and underlined.</li>
                <li><strong>Visited Links</strong>: Purple and underlined.</li>
                <li><strong>Active Links</strong>: Red and underlined.</li>
            </ul>

            <!-- Target Attribute -->
            <h2>The target Attribute</h2>
            <p>The <code>target</code> attribute defines where the linked document will open:</p>
            <ul>
                <li><code>_self</code> (default): Opens the link in the same window/tab.</li>
                <li><code>_blank</code>: Opens the link in a new window/tab.</li>
                <li><code>_parent</code>: Opens the link in the parent frame.</li>
                <li><code>_top</code>: Opens the link in the full body of the window.</li>
            </ul>
            <div class="code-container">
                <pre>
&lt;a href="https://www.example.com" target="_blank"&gt;Visit Example&lt;/a&gt;
                </pre>
            </div>

            <!-- Absolute vs Relative URLs -->
            <h2>Absolute vs. Relative URLs</h2>
            <ul>
                <li><strong>Absolute URL</strong>: Full address (e.g., <code>https://example.com</code>).</li>
                <li><strong>Relative URL</strong>: Path relative to the current file (e.g., <code>about.html</code>).</li>
            </ul>

            <!-- Images as Links -->
            <h2>Using Images as Links</h2>
            <p>You can place an <code>&lt;img&gt;</code> tag inside an <code>&lt;a&gt;</code> tag to make the image clickable.</p>
            <div class="code-container">
                <pre>
&lt;a href="default.asp"&gt;
    &lt;img src="smiley.gif" alt="HTML Tutorial" style="width:42px;height:42px;"&gt;
&lt;/a&gt;
                </pre>
            </div>

            <!-- Email Links -->
            <h2>Email Links</h2>
            <p>Use <code>mailto:</code> to create email links.</p>
            <div class="code-container">
                <pre>
&lt;a href="mailto:someone@example.com"&gt;Send email&lt;/a&gt;
                </pre>
            </div>

            <!-- Button as a Link -->
            <h2>Button as a Link</h2>
            <p>Use JavaScript with the <code>onclick</code> event to make a button act as a link.</p>
            <div class="code-container">
                <pre>
&lt;button onclick="document.location='default.asp'"&gt;HTML Tutorial&lt;/button&gt;
                </pre>
            </div>

            <!-- Multiple-Choice Questions -->
            <div class="card">
                <h2>Multiple-Choice Questions</h2>

                <!-- Question 1 -->
                <h3>1. What attribute specifies the link destination?</h3>
                <input type="radio" name="q1" value="src"> src<br>
                <input type="radio" name="q1" value="href" id="q1-correct"> href<br>
                <input type="radio" name="q1" value="alt"> alt<br>
                <p id="q1-feedback"></p>

                <!-- Question 2 -->
                <h3>2. How do you open a link in a new tab?</h3>
                <input type="radio" name="q2" value="_self"> target="_self"<br>
                <input type="radio" name="q2" value="_blank" id="q2-correct"> target="_blank"<br>
                <input type="radio" name="q2" value="_top"> target="_top"<br>
                <p id="q2-feedback"></p>

                <!-- Question 3 -->
                <h3>3. Which of these is a relative URL?</h3>
                <input type="radio" name="q3" value="https://example.com"> https://example.com<br>
                <input type="radio" name="q3" value="contact.html" id="q3-correct"> contact.html<br>
                <input type="radio" name="q3" value="mailto:someone@example.com"> mailto:someone@example.com<br>
                <p id="q3-feedback"></p>

                <button onclick="checkAnswers()" style="margin-top: 10px; background-color: #ffd700; color: #000; padding: 8px 12px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">Check Answers</button>
            </div>

            <!-- Navigation Links -->
            <p style="margin-top: 20px;">
                <a href="html-lesson3.php" style="color: #ffd700; text-decoration: none;">&lt; Back: Lesson 3</a> | 
                <a href="html-lesson5.php" style="color: #ffd700; text-decoration: none;">Next: Lesson 5 &gt;</a>
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
            document.getElementById("q1-feedback").innerText = q1 ? "Correct! 🎉" : "Try again! The correct answer is 'href'.";

            const q2 = document.getElementById("q2-correct").checked;
            document.getElementById("q2-feedback").innerText = q2 ? "Correct! 🎉 The target='_blank' opens a link in a new tab." : "Try again! The correct answer is 'target=\"_blank\"'.";

            const q3 = document.getElementById("q3-correct").checked;
            document.getElementById("q3-feedback").innerText = q3 ? "Correct! 🎉 'contact.html' is a relative URL." : "Try again! The correct answer is 'contact.html'.";
        }
    </script>
</body>
</html>
