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
    <title>Lesson 1: Adding CSS to an HTML Page</title>
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
            <h1>Lesson 1: Adding CSS to an HTML Page</h1>
            <p>CSS (Cascading Style Sheets) is used to style HTML pages. You can add CSS in three ways: <strong>inline</strong>, <strong>internal</strong>, and <strong>external</strong>.</p>

            <!-- Inline CSS -->
            <h2>Inline CSS</h2>
            <p>Inline CSS is added directly to an HTML element using the <code>style</code> attribute.</p>
            <div class="code-container">
                <pre>
&lt;p style="color: blue; font-size: 18px;"&gt;This is blue text.&lt;/p&gt;
                </pre>
            </div>
            <p>This method is quick but is not recommended for larger projects because it is harder to manage.</p>

            <!-- Internal CSS -->
            <h2>Internal CSS</h2>
            <p>Internal CSS is written inside the <code>&lt;style&gt;</code> tag in the <code>&lt;head&gt;</code> section of the HTML document.</p>
            <div class="code-container">
                <pre>
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
    &lt;style&gt;
        p {
            color: green;
            font-size: 20px;
        }
    &lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;p&gt;This is green text.&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;
                </pre>
            </div>

            <!-- External CSS -->
            <h2>External CSS</h2>
            <p>External CSS is written in a separate file (e.g., <code>style.css</code>) and linked to the HTML file using the <code>&lt;link&gt;</code> tag.</p>
            <div class="code-container">
                <pre>
/* File: style.css */
p {
    color: red;
    font-size: 22px;
}
                </pre>
            </div>
            <p>Link the external CSS file to your HTML page:</p>
            <div class="code-container">
                <pre>
&lt;link rel="stylesheet" href="style.css"&gt;
                </pre>
            </div>
            <p>This approach is the best for larger projects as it keeps styles separate and easy to manage.</p>

            <div class="section-line"></div>


            <!-- Interactive Code Editor -->
            <h2>CSS Code Editor</h2>
            <p>Write and test your CSS styles below. You can use inline, internal, or external CSS!</p>
            <div style="display: flex; gap: 20px;">
                <textarea id="css-editor" rows="12" style="width: 50%; font-family: 'Courier New', Courier, monospace; padding: 10px; border: 1px solid #2a6bbf; border-radius: 5px; background-color: #4e80c2a6; color: #fff2f2;">
<!DOCTYPE html>
<html>
<head>
    <style>
        p {
            color: blue;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <p>This is styled text!</p>
</body>
</html>
                </textarea>

                <!-- Output Display -->
                <iframe id="css-output" style="width: 50%; height: 300px; border: 1px solid #2a6bbf; background-color: #fff;"></iframe>
            </div>
            <button onclick="runCSSCode()" style="margin-top: 10px; background-color: #ffd700; color: #000; padding: 8px 12px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">Run Code</button>

            <!-- Navigation Links -->
            <p style="margin-top: 20px;">
                <a href="css-ov.php" style="color: #ffd700; text-decoration: none;">&lt; Back: Overview</a> | 
                <a href="css-lesson2.php" style="color: #ffd700; text-decoration: none;">Next: Lesson 2 &gt;</a>
            </p>
        </div>
    </div>

    <!-- JavaScript for Code Editor -->
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
    </script>
</body>
</html>
