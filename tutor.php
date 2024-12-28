<?php
session_start();
include("databaseCon.php");

if (isset($_SESSION['Username'])) {
    $username = $_SESSION['Username'];

    // Use parameterized queries to prevent SQL injection
    $query = "SELECT profile_image FROM users WHERE username = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $profilePath = $row['profile_image'] ? $row['profile_image'] : "images/no-user.jpg";
        $_SESSION['profileImage'] = $profilePath;
    } else {
        $profilePath = "images/no-user.jpg";
    }
} else {
    header("Location: login.php");
    exit();
}


if (isset($_GET['id'])) {
    $tutor_id = $_GET['id'];

    // Query to get the tutor's information and languages
    $queryTutor = "SELECT * FROM tutor_applications WHERE id = ? AND status = 'accept'";
    $stmt = mysqli_prepare($con, $queryTutor);
    mysqli_stmt_bind_param($stmt, 'i', $tutor_id);
    mysqli_stmt_execute($stmt);
    $resultTutor = mysqli_stmt_get_result($stmt);

    if ($resultTutor && mysqli_num_rows($resultTutor) > 0) {
        // Fetch tutor data
        $tutor = mysqli_fetch_assoc($resultTutor);
        
        // Split languages into an array if it's a comma-separated string
        $languagesArray = explode(",", $tutor['languages']); 
    } else {
        echo "Tutor not found.";
        exit();
    }
} else {
    echo "No tutor ID specified.";
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Connect</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="pages.css">
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

    <div class="tutor-profile-container1">
        <div class="tutor-main-section">
            <div class="tutor-card-large">
                <!-- Tutor Profile Image -->
                <img src="<?php echo !empty($tutor['profile_image']) ? $tutor['profile_image'] : 'images/default-profile.jpg'; ?>" alt="Tutor Picture" class="tutor-large-profile-pic">
                <div class="tutor-info">
                    <!-- Tutor Name -->
                    <h2 class="tutor-name-large"><?php echo htmlspecialchars($tutor['first_name']) . ' ' . htmlspecialchars($tutor['last_name']); ?></h2>
                    <!-- Tutor Rating -->
                    <div class="tutor-rating-large">
                        <?php
                        // Display the tutor's rating or a default value if not available
                        echo !empty($tutor['rating']) ? str_repeat('★', $tutor['rating']) : "No rating";
                        ?>
                    </div>
                </div>
            </div>

            <!-- Slider for Programming Languages -->
            <div class="language-slider-container">
                <h3 class="section-title">Languages</h3>
                <div class="line-separator"></div>
                <div class="language-slider-wrapper">
                    <button id="lang-left-arrow" class="lang-arrow" style="z-index: 999;">&lt;</button>
                    <div class="language-slider">
                        <?php
                        // Dynamically display the languages the tutor teaches
                        if (!empty($languagesArray)) {
                            foreach ($languagesArray as $language) {
                                echo '<div class="language-card">
                                        <p>' . htmlspecialchars(trim($language)) . '</p>
                                        <button class="see-lessons-btn">See Lessons</button>
                                      </div>';
                            }
                        } else {
                            echo '<div class="language-card"><p>No languages listed</p></div>';
                        }
                        ?>
                    </div>
                    <button id="lang-right-arrow" class="lang-arrow">&gt;</button>
                </div>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="comments-section">
            <h3 class="section-title">Comments</h3>
            <div class="comments-container" id="comments-container">
                <!-- Comments will be loaded here dynamically -->
            </div>

            <!-- Comment input and buttons -->
            <textarea id="comment-input" placeholder="Write your comment..."></textarea>

            <!-- Add an input field for the username -->
            <input type="text" id="username" placeholder="Enter your username" required>

            <div class="comments-section1">
                <button class="comment-submit" onclick="submitComment()">Submit Comment</button>
                <!-- Updated "Message" button to link to the message page with tutor ID -->
                <a href="chat.php" class="comment-submit">Message</a>
            </div>
        </div>

        <script>
        // Load existing comments when the page is loaded
        window.onload = function() {
            loadComments();
        };

        // Function to load all comments from the backend
function loadComments() {
    fetch('get_comments.php')
        .then(response => response.json())
        .then(comments => {
            console.log("Comments loaded: ", comments); // Log comments
            const commentsContainer = document.getElementById('comments-container');
            commentsContainer.innerHTML = ''; // Clear existing comments

            comments.forEach(comment => {
                const commentElement = document.createElement('div');
                commentElement.classList.add('comment');
                commentElement.innerHTML = ` 
                    <strong>${comment.username}</strong> <span>(${comment.timestamp})</span> 
                    <p>${comment.comment}</p>
                `;
                commentsContainer.appendChild(commentElement);
            });
        })
        .catch(error => {
            console.error('Error loading comments:', error);
        });
}

// Function to submit a new comment
function submitComment() {
    const username = document.getElementById('username').value.trim();
    const comment = document.getElementById('comment-input').value.trim();

    // Check if both username and comment are not empty
    if (!username || !comment) {
        alert("Please fill in both your name and comment.");
        return;
    }

    const commentData = new FormData();
    commentData.append('username', username);
    commentData.append('comment', comment);

    // Log the FormData to check
    console.log("Form data being sent: ", commentData);

    fetch('submit_comment.php', {
        method: 'POST',
        body: commentData
    })
    .then(response => response.json())
    .then(data => {
        console.log("Response from submitting comment: ", data);
        if (data.status === 'success') {
            loadComments(); // Reload comments after successful submission
            document.getElementById('comment-input').value = ''; // Clear comment input
            document.getElementById('username').value = ''; // Clear username input
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error submitting comment:', error);
    });
}
    </script>

</body>

</html>
