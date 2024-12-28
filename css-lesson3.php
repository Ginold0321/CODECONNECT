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
    <title>Lesson 3: Changing Text Styles</title>
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
            <h1>Lesson 3: Changing Text Styles</h1>
            <p>CSS allows you to change the appearance of text using different properties such as color, size, font family, and alignment.</p>

            <!-- Color -->
            <h2>1. Color</h2>
            <p>The <code>color</code> property changes the color of the text.</p>
            <div class="code-container">
                <pre>
p {
    color: red;
}
                </pre>
            </div>
            <p>Example:</p>
            <p style="color: red;">This text is red.</p>

            <!-- Font Size -->
            <h2>2. Font Size</h2>
            <p>The <code>font-size</code> property controls the size of the text.</p>
            <div class="code-container">
                <pre>
p {
    font-size: 18px;
}
                </pre>
            </div>
            <p>Example:</p>
            <p style="font-size: 18px;">This text is 18px.</p>

            <!-- Font Family -->
            <h2>3. Font Family</h2>
            <p>The <code>font-family</code> property specifies the type of font to use.</p>
            <div class="code-container">
                <pre>
p {
    font-family: Arial, sans-serif;
}
                </pre>
            </div>
            <p>Example:</p>
            <p style="font-family: Arial, sans-serif;">This text uses Arial font.</p>

            <!-- Text Alignment -->
            <h2>4. Text Alignment</h2>
            <p>The <code>text-align</code> property aligns text to the left, center, or right.</p>
            <div class="code-container">
                <pre>
p {
    text-align: center;
}
                </pre>
            </div>
            <p>Example:</p>
            <p style="text-align: center;">This text is centered.</p>

            <div class="section-line"></div>


            <!-- Interactive Code Editor -->
            <h2>Try It Yourself</h2>
            <p>Use the code editor below to experiment with different text styles like color, font size, font family, and alignment.</p>
            <div style="display: flex; gap: 20px;">
                <textarea id="css-editor" rows="12" style="width: 50%; font-family: 'Courier New', Courier, monospace; padding: 10px; border: 1px solid #2a6bbf; border-radius: 5px; background-color: #4e80c2a6; color: #fff2f2;">
<!DOCTYPE html>
<html>
<head>
    <style>
        p {
            color: blue;
            font-size: 18px;
            font-family: Arial, sans-serif;
            text-align: center;
        }
    </style>
</head>
<body>
    <p>Experiment with this text!</p>
</body>
</html>
                </textarea>

                <!-- Output Display -->
                <iframe id="css-output" style="width: 50%; height: 300px; border: 1px solid #2a6bbf; background-color: #fff;"></iframe>
            </div>
            <button onclick="runCSSCode()" style="margin-top: 10px; background-color: #ffd700; color: #000; padding: 8px 12px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">Run Code</button>


            <!-- Navigation Links -->
            <p style="margin-top: 20px;">
                <a href="css-lesson2.php" style="color: #ffd700; text-decoration: none;">&lt; Back: Lesson 2</a> | 
                <a href="css-lesson4.php" style="color: #ffd700; text-decoration: none;">Next: Lesson 4 &gt;</a>
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

    </script>
</body>
</html>
