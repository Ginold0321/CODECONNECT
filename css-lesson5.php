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
    <title>Lesson 4: Adding Backgrounds</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="lesson-template.css">

</head>
<body>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson 4: Adding Backgrounds</title>
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

        <div class="main-content">
            <h1>Lesson 5: Styling Boxes with Borders and Margins</h1>
            <p>CSS allows you to style HTML elements as boxes using borders, padding, and margins to control spacing and layout.</p>
        
            <!-- Borders -->
            <h2>1. Borders</h2>
            <p>The <code>border</code> property adds a line around an element.</p>
            <div class="code-container">
                <pre>
        p {
            border: 2px solid black;
        }
                </pre>
            </div>
        
            <!-- Padding -->
            <h2>2. Padding</h2>
            <p>The <code>padding</code> property adds space inside an element, between the text and the border.</p>
            <div class="code-container">
                <pre>
        p {
            padding: 10px;
        }
                </pre>
            </div>
        
            <!-- Margin -->
            <h2>3. Margins</h2>
            <p>The <code>margin</code> property adds space outside the element, separating it from other elements.</p>
            <div class="code-container">
                <pre>
        p {
            margin: 20px;
        }
                </pre>
            </div>
        
            <!-- Section Divider -->
            <div class="section-line"></div>
        
            <!-- Interactive Code Editor -->
            <h2>Try It Yourself</h2>
            <p>Experiment with borders, padding, and margins using the editor below.</p>
            <div style="display: flex; gap: 20px;">
                <textarea id="css-editor-box" rows="12" style="width: 50%; font-family: 'Courier New', Courier, monospace; padding: 10px; border: 1px solid #2a6bbf; border-radius: 5px; background-color: #4e80c2a6; color: #fff2f2;">
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                p {
                    border: 2px solid black;
                    padding: 10px;
                    margin: 20px;
                }
            </style>
        </head>
        <body>
            <p>Experiment with Borders, Padding, and Margins!</p>
        </body>
        </html>
                </textarea>
                <iframe id="css-output-box" style="width: 50%; height: 300px; border: 1px solid #2a6bbf; background-color: #fff;"></iframe>
            </div>
            <button onclick="runCode('css-editor-box', 'css-output-box')" style="margin-top: 10px; background-color: #ffd700; color: #000; padding: 8px 12px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">Run Code</button>
        
            <!-- Navigation -->
            <p style="margin-top: 20px;">
                <a href="css-lesson4.php" style="color: #ffd700; text-decoration: none;">&lt; Back: Lesson 4</a> | 
                <a href="page.php" style="color: #ffd700; text-decoration: none;">Home &gt;</a>
            </p>
        </div>
        <script>


document.addEventListener("DOMContentLoaded", function () {
                const userPic = document.querySelector(".user-pic");
                const subMenu = document.getElementById("subMenu");

                userPic.addEventListener("click", function () {
                    subMenu.classList.toggle("open-menu");
                    console.log("Submenu toggled"); // Check if this runs
                });
            });
            
            function runCode(editorId, outputId) {
                const code = document.getElementById(editorId).value;
                const outputFrame = document.getElementById(outputId);
                const output = outputFrame.contentDocument || outputFrame.contentWindow.document;
                output.open();
                output.write(code);
                output.close();
            }
        </script>
    </body>
    </html>
            