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
    <title>Lesson 3: Adding Images</title>
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
            <h1>Lesson 3: Adding Images</h1>

            <!-- Adding an Image -->
            <h2>Adding an Image</h2>
            <p>Images can be added to an HTML page using the <code>&lt;img&gt;</code> tag. The <code>src</code> attribute tells the browser where the image file is located.</p>
            <div class="code-container">
                <pre>
&lt;img src="image.jpg" alt="A beautiful view"&gt;
                </pre>
            </div>
            <ul>
                <li><code>src="image.jpg"</code>: The location of the image file.</li>
                <li><code>alt="A beautiful view"</code>: Text that appears if the image cannot load.</li>
            </ul>

            <!-- Adding Images from Local Folder -->
            <h2>Adding Images from a Local Folder</h2>
            <p>If your image file is saved in the same folder as your HTML file, you can use its filename in the <code>src</code>. For files in a subfolder, add the folder name.</p>
            <div class="code-container">
                <pre>
&lt;img src="images/photo.jpg" alt="Local Image"&gt;
                </pre>
            </div>

            <!-- Adding Images from a Website -->
            <h2>Adding Images from Another Website</h2>
            <p>You can add images hosted on other websites using their full URL in the <code>src</code> attribute.</p>
            <div class="code-container">
                <pre>
&lt;img src="https://example.com/photo.jpg" alt="External Image"&gt;
                </pre>
            </div>

            <!-- Image Formats -->
            <h2>Image Formats</h2>
            <p>Common image formats include:</p>
            <ul>
                <li><strong>JPG/JPEG</strong>: Best for photographs.</li>
                <li><strong>PNG</strong>: Supports transparency.</li>
                <li><strong>GIF</strong>: Used for simple animations.</li>
                <li><strong>SVG</strong>: Best for vector graphics.</li>
            </ul>

            <!-- Image Sizes -->
            <h2>Image Sizes</h2>
            <p>You can control the size of an image using the <code>width</code> and <code>height</code> attributes:</p>
            <div class="code-container">
                <pre>
&lt;img src="image.jpg" alt="Resized Image" width="300" height="200"&gt;
                </pre>
            </div>
            <p>It’s better to use CSS for resizing images to maintain flexibility.</p>

            <!-- Adding Images with a Link -->
            <h2>Adding Images with a Link</h2>
            <p>You can make an image clickable by wrapping it inside an <code>&lt;a&gt;</code> tag:</p>
            <div class="code-container">
                <pre>
&lt;a href="https://example.com"&gt;
  &lt;img src="image.jpg" alt="Click here"&gt;
&lt;/a&gt;
                </pre>
            </div>

            <!-- Multiple-Choice Questions -->
            <div class="card">
                <h2>Multiple-Choice Questions</h2>
                
                <!-- Question 1 -->
                <h3>1. Which attribute specifies the image location?</h3>
                <input type="radio" name="q1" value="alt"> alt<br>
                <input type="radio" name="q1" value="src" id="q1-correct"> src<br>
                <input type="radio" name="q1" value="href"> href<br>
                <p id="q1-feedback"></p>

                <!-- Question 2 -->
                <h3>2. Which format supports transparency?</h3>
                <input type="radio" name="q2" value="JPG"> JPG<br>
                <input type="radio" name="q2" value="PNG" id="q2-correct"> PNG<br>
                <input type="radio" name="q2" value="GIF"> GIF<br>
                <p id="q2-feedback"></p>

                <!-- Question 3 -->
                <h3>3. What tag is used to make an image clickable?</h3>
                <input type="radio" name="q3" value="&lt;img&gt;"> &lt;img&gt;<br>
                <input type="radio" name="q3" value="&lt;a&gt;" id="q3-correct"> &lt;a&gt;<br>
                <input type="radio" name="q3" value="&lt;link&gt;"> &lt;link&gt;<br>
                <p id="q3-feedback"></p>

                <button onclick="checkAnswers()" style="margin-top: 10px; background-color: #ffd700; color: #000; padding: 8px 12px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">Check Answers</button>
            </div>

            <!-- Navigation Links -->
            <p style="margin-top: 20px;">
                <a href="html-lesson2.php" style="color: #ffd700; text-decoration: none;">&lt; Back: Lesson 2</a> | 
                <a href="html-lesson4.php" style="color: #ffd700; text-decoration: none;">Next: Lesson 4 &gt;</a>
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
            // Question 1
            const q1 = document.getElementById("q1-correct").checked;
            document.getElementById("q1-feedback").innerText = q1 ? "Correct! 🎉" : "Try again! The correct answer is 'src'.";

            // Question 2
            const q2 = document.getElementById("q2-correct").checked;
            document.getElementById("q2-feedback").innerText = q2 ? "Correct! 🎉 PNG supports transparency." : "Try again! The correct answer is 'PNG'.";

            // Question 3
            const q3 = document.getElementById("q3-correct").checked;
            document.getElementById("q3-feedback").innerText = q3 ? "Correct! 🎉 Use the '&lt;a&gt;' tag to make an image clickable." : "Try again! The correct answer is '&lt;a&gt;'.";
        }
    </script>
</body>
</html>
