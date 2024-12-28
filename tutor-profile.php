<?php
session_start();
include("databaseCon.php");

if (isset($_SESSION['Username'])) {
    $username = $_SESSION['Username'];

    $query = "SELECT profile_image FROM users WHERE username = '$username'";
    $result = mysqli_query($con, $query);

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Connect</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="tutor.css">
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

    <div class="tutor-slider-container">
        <h1>CHOOSE A TUTOR</h1>
        <div class="tutor-cards-wrapper">
            <?php
            $queryTutors = "SELECT * FROM tutor_applications WHERE status = 'accept'"; 
            $tutorResult = mysqli_query($con, $queryTutors);

            if (mysqli_num_rows($tutorResult) > 0):
                while ($row = mysqli_fetch_assoc($tutorResult)):
            ?>
                <div class="tutor-card">
                    <img src="<?php echo !empty($row['profile_image']) ? $row['profile_image'] : 'images/no-user.jpg'; ?>" alt="Tutor Profile Picture" class="tutor-profile-pic">
                    <h3 class="tutor-name"><?php echo htmlspecialchars($row['first_name']) . ' ' . htmlspecialchars($row['last_name']); ?></h3>
                    <div class="tutor-rating">
                        <?php echo !empty($row['rating']) ? "★★★★★ " . htmlspecialchars($row['rating']) : ""; ?>
                    </div>
                    <ul class="tutor-language-list">
                    <?php
                    // Assuming $languages contains the comma-separated list of languages
                                if (!empty($row['languages'])) {
                                    $languages = explode(",", $row['languages']);
                                    foreach ($languages as $language) {
                                        echo "<li>" . htmlspecialchars(trim($language)) . "</li>";
                                    }
                                } else {
                                    echo "<li>No languages listed</li>";
                                }
                                ?>
                            </ul>

                    <a href="tutor.php?id=<?php echo $row['id']; ?>">
                        <button class="tutor-learn-btn">LEARN MORE</button>
                    </a>
                </div>
            <?php endwhile; ?>
            <?php else: ?>
                <p>No tutors found.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="tutor-profile.js"></script>
</body>
</html>
