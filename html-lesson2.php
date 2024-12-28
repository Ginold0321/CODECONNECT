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
    <title>Lesson 2: Headings and Paragraphs</title>
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
            <h1>Lesson 2: Headings and Paragraphs</h1>

            <!-- Lesson Content -->
            <div class="introduction">
                <p>HTML uses headings and paragraphs to structure text on a webpage. Headings define titles and subtitles, while paragraphs create blocks of text for content.</p>
            </div>

            <!-- Headings -->
            <h2>Headings</h2>
            <p>HTML has six levels of headings: <code>&lt;h1&gt;</code> to <code>&lt;h6&gt;</code>. <code>&lt;h1&gt;</code> is the largest, and <code>&lt;h6&gt;</code> is the smallest.</p>
            <div class="code-container">
                <pre>
&lt;h1&gt;Main Heading&lt;/h1&gt;
&lt;h2&gt;Subheading&lt;/h2&gt;
&lt;h3&gt;Smaller Heading&lt;/h3&gt;
                </pre>
            </div>

            <!-- Paragraphs -->
            <h2>Paragraphs</h2>
            <p>Paragraphs are written using the <code>&lt;p&gt;</code> tag. They create blocks of text that help organize your content.</p>
            <div class="code-container">
                <pre>
&lt;p&gt;This is a paragraph of text. Paragraphs help organize your content.&lt;/p&gt;
                </pre>
            </div>

            
            <div class="section-line"></div>


            <!-- Interactive Code Editor -->
            <h2>Experiment with Headings and Paragraphs</h2>
            <p>Try editing the code below to practice creating headings and paragraphs. Press "Run Code" to see the output.</p>
            <div style="display: flex; gap: 20px;">
                <textarea id="html-editor" rows="10" style="width: 50%; font-family: 'Courier New', Courier, monospace; padding: 10px; border: 1px solid #2a6bbf; border-radius: 5px; background-color: #4e80c2a6; color: #fff2f2;">
<!DOCTYPE html>
<html>
<head>
  <title>Headings and Paragraphs</title>
</head>
<body>
  <h1>Welcome to My Page</h1>
  <h2>This is a Subheading</h2>
  <p>This is a paragraph. Edit this text or add more headings below!</p>
</body>
</html>
                </textarea>

                <!-- Output Display -->
                <iframe id="html-output" style="width: 50%; height: 300px; border: 1px solid #2a6bbf; background-color: #fff2f2;"></iframe>
            </div>
            <button onclick="runCode()" style="margin-top: 10px; background-color: #ffd700; color: #000; padding: 8px 12px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">Run Code</button>

            <div class="section-line"></div>


            <!-- Interactive Exercise -->
            <div class="card">
                <h2>Interactive Exercise</h2>

                <!-- Question 1 -->
                <h3>1. Fill in the blank to create the largest heading:</h3>
                <div class="code-container">
                    <code>
                        &lt;<input type="text" id="q1" placeholder="_____" style="width: 70px;">&gt;This is the main title.&lt;/<input type="text" id="q1-end" placeholder="_____" style="width: 70px;">&gt;
                    </code>
                </div>
                <button onclick="checkQ1()">Submit</button>
                <p id="q1-feedback"></p>

                <!-- Question 2 -->
                <h3>2. What tag is used to write a paragraph?</h3>
                <div class="code-container">
                    <code>
                        &lt;<input type="text" id="q2" placeholder="_____" style="width: 70px;">&gt;This is some text.&lt;/<input type="text" id="q2-end" placeholder="_____" style="width: 70px;">&gt;
                    </code>
                </div>
                <button onclick="checkQ2()">Submit</button>
                <p id="q2-feedback"></p>

                <!-- Question 3 -->
                <h3>3. Which heading is the smallest?</h3>
                <div class="code-container">
                    <code>
                        &lt;h<input type="text" id="q3" placeholder="__" style="width: 30px;">&gt;This is the smallest heading.&lt;/h<input type="text" id="q3-end" placeholder="__" style="width: 30px;">&gt;
                    </code>
                </div>
                <button onclick="checkQ3()">Submit</button>
                <p id="q3-feedback"></p>
            </div>

            <!-- Navigation Links -->
            <p style="margin-top: 20px;">
                <a href="html-lesson1.php" style="color: #ffd700; text-decoration: none;">&lt; Back: Lesson 1</a> | 
                <a href="html-lesson3.php" style="color: #ffd700; text-decoration: none;">Next: Lesson 3 &gt;</a>
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
