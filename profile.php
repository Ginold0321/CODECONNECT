<?php
session_start();
include("databaseCon.php");

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES['profileImage'])) {
    $targetDir = "uploads/";

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    $targetFile = $targetDir . basename($_FILES["profileImage"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
    
    if (in_array($imageFileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $targetFile)) {
            
            $username = $_SESSION['Username'];
            $profilePath = $targetFile;

            $updateQuery = "UPDATE users SET profile_image = '$profilePath' WHERE username = '$username'";
            
            if (mysqli_query($con, $updateQuery)) {
                $_SESSION['profileImage'] = $profilePath;
                echo "<script>alert('Profile image uploaded successfully!');</script>";
            } else {
                echo "<script>alert('Failed to save the image path in the database.');</script>";
            }
        } else {
            echo "<script>alert('Failed to upload the image.');</script>";
        }
    } else {
        echo "<script>alert('Only JPG, PNG, GIF files are allowed.');</script>";
    }
}

$username = $_SESSION['Username'];

$query = "SELECT profile_image FROM users WHERE username = '$username'";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $profilePath = $row['profile_image'];
    $_SESSION['profileImage'] = $profilePath;  
    $profilePath = "images/default_profile.jpg";
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Connect</title>
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="profile.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        .profile-picture {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px;
        }
        img.rounded-circle {
            object-fit: cover;
            height: 150px;
            width: 150px;
            border: 5px solid #f1f1f1;
        }
    </style>
</head>

<body>

<div class="container mt-5">
    <div class="main-body">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="page.php">Home</a></li>
                <li class="breadcrumb-item"><a href="profile.php">User</a></li> 
            </ol>
        </nav>

        <!-- Profile Section -->
        <div class="row gutters-sm">
            <!-- Left Panel -->
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            
                            <?php 
                                $profilePath = isset($_SESSION['profileImage']) ? $_SESSION['profileImage'] : "images/default_profile.jpg";
                            ?>
                            
                            <div class="profile-picture">
                                <img src="<?php echo $profilePath; ?>" alt="Profile" class="rounded-circle">
                            </div>

                            <div class="mt-3">
                                <?php if (isset($_SESSION['FullName'])): ?>
                                    <h3><?php echo htmlspecialchars($_SESSION['FullName']); ?></h3>
                                <?php else: ?>
                                    <h6>Guest User</h6>
                                <?php endif; ?>

                                <?php if (isset($_SESSION['Location'])): ?>
                                    <p><?php echo htmlspecialchars($_SESSION['Location']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upload Profile Image Card -->
                <div class="card mt-3">
                    <div class="card-header">
                        <h6>Upload Profile Image</h6>
                    </div>
                    <div class="card-body">
                        <form action="profile.php" method="POST" enctype="multipart/form-data">
                            <label for="profileImage">Choose an image</label>
                            <input type="file" name="profileImage" id="profileImage" accept="image/*" class="form-control mt-2" required>
                            <button type="submit" class="btn btn-primary mt-2 btn-block">Upload</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Panel -->
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php if (isset($_SESSION['FullName'])): ?>
                                    <p><?php echo htmlspecialchars($_SESSION['FullName']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php if (isset($_SESSION['Email'])): ?>
                                    <p><?php echo htmlspecialchars($_SESSION['Email']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Username</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php if (isset($_SESSION['Username'])): ?>
                                    <p><?php echo htmlspecialchars($_SESSION['Username']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Mobile</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php if (isset($_SESSION['PhoneNumber'])): ?>
                                    <p><?php echo htmlspecialchars($_SESSION['PhoneNumber']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php if (isset($_SESSION['Location'])): ?>
                                    <p><?php echo htmlspecialchars($_SESSION['Location']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>
