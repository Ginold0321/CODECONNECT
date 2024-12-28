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
    <title>Lesson 1: Basic Structure of an HTML Page</title>
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
            <h1>Lesson 1: Basic Structure of an HTML Page</h1>

            <!-- Lesson Introduction -->
            <div class="introduction">
                <p>HTML stands for <strong>HyperText Markup Language</strong> and is used to create web pages. Every HTML document follows a basic structure that allows browsers to display the content correctly. This structure includes essential elements like <code>&lt;html&gt;</code>, <code>&lt;head&gt;</code>, and <code>&lt;body&gt;</code>.</p>
            </div>

            <!-- HTML Page Structure -->
            <h2>The Structure of an HTML Page</h2>
            <p>An HTML document starts with a few key elements:</p>

            <ul>
                <li><code>&lt;!DOCTYPE html&gt;</code> – Tells the browser that this is an HTML5 document.</li>
                <li><code>&lt;html&gt;</code> – The root element that contains everything on the page.</li>
                <li><code>&lt;head&gt;</code> – Contains metadata like the page title.</li>
                <li><code>&lt;body&gt;</code> – Contains the visible content of the page.</li>
            </ul>

            <!-- Example of Basic HTML Page -->
            <h2>Example: Basic HTML Page</h2>
            <div class="code-container">
                <pre>
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
  &lt;title&gt;My First Page&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
  &lt;h1&gt;Welcome to My Web Page&lt;/h1&gt;
  &lt;p&gt;This is my first HTML page.&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;
                </pre>
            </div>

            <div class="section-line"></div>


            <!-- Interactive Code Editor -->
            <h2>Try it out!</h2>
            <p>Try editing the code below and see how it changes the output.</p>
            <div style="display: flex; gap: 20px;">
                <!-- Code Editor -->
                <textarea id="html-editor" rows="10" style="width: 50%; font-family: 'Courier New', Courier, monospace; padding: 10px; border: 1px solid #2a6bbf; border-radius: 5px; background-color: #4e80c2a6; color: #fff2f2;">
<!DOCTYPE html>
<html>
<head>
  <title>Title</title>
</head>
<body>
  <h1>Header 1</h1>
  <p>Paragraph</p>
</body>
</html>
                </textarea>
                <!-- Output Display -->
                <iframe id="html-output" style="width: 50%; height: 300px; border: 1px solid #2a6bbf; background-color: #fff2f2;"></iframe>
            </div>
            <button onclick="runCode()" style="margin-top: 10px; background-color: #ffd700; color: #000; padding: 8px 12px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">Run Code</button>

            <!-- Navigation Links -->
            <p style="margin-top: 20px;">
                <a href="html-ov.php" style="color: #ffd700; text-decoration: none;">&lt; Back: Overview</a> | 
                <a href="html-lesson2.php" style="color: #ffd700; text-decoration: none;">Next: Lesson 2 &gt;</a>
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
        
        function runCode() {
            const code = document.getElementById("html-editor").value;
            const outputFrame = document.getElementById("html-output");
            const output = outputFrame.contentDocument || outputFrame.contentWindow.document;
            output.open();
            output.write(code);
            output.close();
        }
    </script>
</body>
</html>
