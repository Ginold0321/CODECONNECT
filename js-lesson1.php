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
    <title>Lesson 1: Adding JavaScript to a Webpage</title>
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
            <h1>Lesson 1: How to Add JavaScript to a Webpage</h1>

            <!-- Using Inline JavaScript -->
            <div class="introduction">
                <h2>Using Inline JavaScript</h2>
                <p>JavaScript can be added directly into an HTML file using the <code>&lt;script&gt;</code> tag. The browser reads and runs the code when the webpage loads.</p>
                <div class="code-container">
                    <pre>
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
  &lt;title&gt;Inline JavaScript&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
  &lt;h1&gt;Welcome!&lt;/h1&gt;
  &lt;script&gt;
    alert("Hello! This is JavaScript.");
  &lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;
                    </pre>
                </div>
                <p>When you open this page, a popup will appear with the message "Hello! This is JavaScript."</p>
            </div>

            <!-- Using External JavaScript -->
            <div class="introduction">
                <h2>Using an External JavaScript File</h2>
                <p>For larger projects, JavaScript is written in a separate file and linked to the HTML using the <code>&lt;script&gt;</code> tag with the <code>src</code> attribute.</p>
                <p>Example: Create a file called <strong>script.js</strong>:</p>
                <div class="code-container">
                    <pre>
alert("This is JavaScript from an external file!");
                    </pre>
                </div>
                <p>Then, link it to your HTML file:</p>
                <div class="code-container">
                    <pre>
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
  &lt;title&gt;External JavaScript&lt;/title&gt;
  &lt;script src="script.js"&gt;&lt;/script&gt;
&lt;/head&gt;
&lt;body&gt;
  &lt;h1&gt;External JavaScript Example&lt;/h1&gt;
&lt;/body&gt;
&lt;/html&gt;
                    </pre>
                </div>
                <p>This keeps the code organized and easy to manage.</p>


                <div class="section-line"></div>


            
            <h1>JavaScript Code Editor</h1>
            <p>Write and test your JavaScript code in the editor below. Press "Run Code" to see the output.</p>

            <!-- Code Editor -->
            <div style="display: flex; gap: 20px;">
                <textarea id="js-editor" rows="10" style="width: 50%; font-family: 'Courier New', Courier, monospace; padding: 10px; border: 1px solid #2a6bbf; border-radius: 5px; background-color: #4e80c2a6; color: #fff2f2;">
// Write your JavaScript code here
console.log("Hello, JavaScript!");
                </textarea>
                
                <!-- Output Display -->
                <div id="js-output" style="width: 50%; height: 300px; background-color: #fff2f2; border: 1px solid #2a6bbf; padding: 10px; overflow: auto; font-family: 'Courier New', Courier, monospace;"></div>
            </div>
            
            <button onclick="runJSCode()" style="margin-top: 10px; background-color: #ffd700; color: #000; padding: 8px 12px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">Run Code</button>


                    <!-- Navigation Links -->
                    <p style="margin-top: 20px;">
                        <a href="js-ov.php" style="color: #ffd700; text-decoration: none;">&lt; Back: Introduction</a> | 
                        <a href="js-lesson2.php" style="color: #ffd700; text-decoration: none;">Next: Lesson 2 &gt;</a>
                    </p>
                </div>
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

    function runJSCode() {
        const code = document.getElementById("js-editor").value;
        const outputDiv = document.getElementById("js-output");

        try {
            console.clear();
            outputDiv.innerHTML = ""; // Clear previous output
            const originalLog = console.log;

            console.log = function (message) {
                outputDiv.innerHTML += message + "<br>";
            };

            eval(code); // Run the JS code
            
            console.log = originalLog; // Restore console.log
        } catch (error) {
            outputDiv.innerHTML = `<span style="color: red;">Error: ${error.message}</span>`;
        }
    }
</script>


</body>
</html>
