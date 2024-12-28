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
    <title>Lesson 2: CSS Selectors</title>
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
            <h1>Lesson 2: CSS Selectors</h1>
            <p>CSS selectors are used to target specific HTML elements and apply styles to them. Different types of selectors allow you to control which elements get styled.</p>

            <!-- Element Selector -->
            <h2>1. Element Selector</h2>
            <p>The element selector targets all elements of a specific type (e.g., <code>p</code>, <code>h1</code>).</p>
            <div class="code-container">
                <pre>
p {
    color: blue;
}
                </pre>
            </div>
            <p>Example:</p>
            <div class="code-container">
                <pre>
&lt;p&gt;This text will be blue.&lt;/p&gt;
                </pre>
            </div>

            <!-- Class Selector -->
            <h2>2. Class Selector</h2>
            <p>The class selector targets elements with a specific class. Use a period (<code>.</code>) before the class name.</p>
            <div class="code-container">
                <pre>
.highlight {
    color: orange;
}
                </pre>
            </div>
            <p>Example:</p>
            <div class="code-container">
                <pre>
&lt;p class="highlight"&gt;This text will be orange.&lt;/p&gt;
                </pre>
            </div>

            <!-- ID Selector -->
            <h2>3. ID Selector</h2>
            <p>The ID selector targets an element with a specific ID. Use a hash (<code>#</code>) before the ID name.</p>
            <div class="code-container">
                <pre>
#unique {
    color: red;
}
                </pre>
            </div>
            <p>Example:</p>
            <div class="code-container">
                <pre>
&lt;p id="unique"&gt;This text will be red.&lt;/p&gt;
                </pre>
            </div>

            <div class="section-line"></div>


            <!-- Interactive Code Editor -->
            <h2>Try It Yourself</h2>
            <p>Use the code editor below to practice your selectors. Change colors, fonts, or sizes using the element, class, and ID selectors.</p>
            <div style="display: flex; gap: 20px;">
                <textarea id="css-editor" rows="12" style="width: 50%; font-family: 'Courier New', Courier, monospace; padding: 10px; border: 1px solid #2a6bbf; border-radius: 5px; background-color: #4e80c2a6; color: #fff2f2;">
<!DOCTYPE html>
<html>
<head>
    <style>
        p {
            color: blue;
        }

        .highlight {
            color: orange;
            font-weight: bold;
        }

        #unique {
            color: red;
        }
    </style>
</head>
<body>
    <p>This is a normal paragraph.</p>
    <p class="highlight">This is a class-styled paragraph.</p>
    <p id="unique">This is an ID-styled paragraph.</p>
</body>
</html>
                </textarea>

                <!-- Output Display -->
                <iframe id="css-output" style="width: 50%; height: 300px; border: 1px solid #2a6bbf; background-color: #fff;"></iframe>
            </div>
            <button onclick="runCSSCode()" style="margin-top: 10px; background-color: #ffd700; color: #000; padding: 8px 12px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">Run Code</button>


            <div class="section-line"></div>

            <!-- Multiple-Choice Questions -->
            <div class="card">
                <h2>Multiple-Choice Questions</h2>

                <!-- Question 1 -->
                <h3>1. What symbol is used for a class selector?</h3>
                <input type="radio" name="q1" value="."> .<br>
                <input type="radio" name="q1" value="#" id="q1-correct"> #<br>
                <input type="radio" name="q1" value="&lt;"> &lt;<br>
                <p id="q1-feedback"></p>

                <!-- Question 2 -->
                <h3>2. How do you target an element with the ID "main"?</h3>
                <input type="radio" name="q2" value=".main"> .main<br>
                <input type="radio" name="q2" value="#main" id="q2-correct"> #main<br>
                <input type="radio" name="q2" value="main"> main<br>
                <p id="q2-feedback"></p>

                <!-- Question 3 -->
                <h3>3. Which selector targets all &lt;h1&gt; elements?</h3>
                <input type="radio" name="q3" value=".h1"> .h1<br>
                <input type="radio" name="q3" value="h1" id="q3-correct"> h1<br>
                <input type="radio" name="q3" value="#h1"> #h1<br>
                <p id="q3-feedback"></p>

                <button onclick="checkAnswers()" style="margin-top: 10px; background-color: #ffd700; color: #000; padding: 8px 12px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">Check Answers</button>
            </div>

            <!-- Navigation Links -->
            <p style="margin-top: 20px;">
                <a href="css-lesson1.php" style="color: #ffd700; text-decoration: none;">&lt; Back: Lesson 1</a> | 
                <a href="css-lesson3.php" style="color: #ffd700; text-decoration: none;">Next: Lesson 3 &gt;</a>
            </p>
        </div>
    </div>

    <!-- JavaScript for Code Editor and Validation -->
    <script>

document.addEventListener("DOMContentLoaded", function () {
                const userPic = document.querySelector(".user-pic");
                const subMenu = document.getElementById("subMenu");

                userPic.addEventListener("click", function () {
                    subMenu.classList.toggle("open-menu");
                    console.log("Submenu toggled"); // Check if this runs
                });
            });

        function runCSSCode() {
            const code = document.getElementById("css-editor").value;
            const outputFrame = document.getElementById("css-output");
            const output = outputFrame.contentDocument || outputFrame.contentWindow.document;
            output.open();
            output.write(code);
            output.close();
        }

        function checkAnswers() {
            const q1 = document.getElementById("q1-correct").checked;
            document.getElementById("q1-feedback").innerText = q1 ? "Correct! 🎉 Use '#' for ID selectors." : "Try again! The correct answer is '#'.";

            const q2 = document.getElementById("q2-correct").checked;
            document.getElementById("q2-feedback").innerText = q2 ? "Correct! 🎉 Use '#main' for IDs." : "Try again! Use '#main'.";

            const q3 = document.getElementById("q3-correct").checked;
            document.getElementById("q3-feedback").innerText = q3 ? "Correct! 🎉 Use 'h1' to target all headings." : "Try again! The correct answer is 'h1'.";
        }
    </script>
</body>
</html>
