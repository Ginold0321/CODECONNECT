<?php session_start();
include("databaseCon.php");

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
    if (isset($_GET['fetch_messages']) && isset($_GET['receiver'])) {
        $receiver = mysqli_real_escape_string($con, $_GET['receiver']);
        $query = "SELECT * FROM chat_messages 
                  WHERE (sender_username = '$username' AND receiver_username = '$receiver') 
                     OR (sender_username = '$receiver' AND receiver_username = '$username') 
                  ORDER BY timestamp ASC";
    
        $result = mysqli_query($con, $query);
    
        if (!$result) {
            die("Query failed: " . mysqli_error($con));
        }
    
        while ($row = mysqli_fetch_assoc($result)) {
            $class = $row['sender_username'] === $username ? 'message-sender' : 'message-receiver';
            echo "<div class='message {$class}'>{$row['message']} <br><small>{$row['timestamp']}</small></div>";
        }
        exit();
    }
    
    
    if (isset($_GET['validate_user']) && isset($_GET['username'])) {
        $receiver = mysqli_real_escape_string($con, $_GET['username']);
        $query = "SELECT * FROM users WHERE LOWER(Username) = LOWER('$receiver')";
        $result = mysqli_query($con, $query);
    
        echo (mysqli_num_rows($result) > 0) ? 'valid' : 'invalid';
        exit();
    }
    
    
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['message']) && isset($_POST['receiver'])) {
        $receiver = mysqli_real_escape_string($con, $_POST['receiver']);
        $message = mysqli_real_escape_string($con, $_POST['message']);
        $timestamp = date("Y-m-d H:i:s");
    
        $checkUserQuery = "SELECT * FROM users WHERE LOWER(Username) = LOWER('$receiver')";
        $userExists = mysqli_query($con, $checkUserQuery);
    
        if (mysqli_num_rows($userExists) > 0) {
            $query = "INSERT INTO chat_messages (sender_username, receiver_username, message, timestamp) VALUES ('$username', '$receiver', '$message', '$timestamp')";
    
            if (mysqli_query($con, $query)) {
                echo "<p>Message sent to $receiver successfully.</p>";
            } else {
                echo "Failed to send message. Error: " . mysqli_error($con);
            }
        } else {
            echo "<p>User '$receiver' does not exist in the CodeConnect database.</p>";
        }
        exit();
    }
    
    
    function getRecentChats($con, $username) {
        $query = "SELECT DISTINCT 
                        IF(sender_username = '$username', receiver_username, sender_username) AS chat_partner
                  FROM chat_messages 
                  WHERE sender_username = '$username' OR receiver_username = '$username' 
                  ORDER BY timestamp DESC";
    
        return mysqli_query($con, $query);
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
    <link rel="stylesheet" href="chat.css">
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
                        <a href="chat_interface.php">Messages</a>
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
    <div class="sidebar">
    <h3>Recent Chats</h3>
    <button class="btn-nm" onclick="initiateNewChat()">New Message</button>
    <div id="recentChats">
        <?php
        $recentChats = getRecentChats($con, $username);

        if ($recentChats && mysqli_num_rows($recentChats) > 0) {
            while ($row = mysqli_fetch_assoc($recentChats)) {
                $partner = $row['chat_partner'];
                echo "<div class='recent-chat-item' onclick='selectChat(\"$partner\")'>$partner</div>";
            }
        } else {
            echo "<p>No recent chats found.</p>";
        }
        ?>
    </div>
</div>

<div class="main-chat">
    <div id="chat-header"></div>
    <div class="chat-container" id="messages"></div>

    <form id="messageForm" method="POST">
        <input type="hidden" name="receiver" id="receiver">
        <input class="input-message" type="text" name="message" placeholder="Type your message..." required>
        <button class="send-btn" type="submit">Send</button>
    </form>
</div>

<script>

        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("oper-menu");
        }
    let currentReceiver = '';

    function selectChat(receiver) {
        currentReceiver = receiver;
        document.getElementById('receiver').value = receiver;
        document.getElementById('chat-header').innerText = `Chatting with ${receiver}`;

        const chatContainer = document.getElementById('messages');
        chatContainer.innerHTML = '';

        fetch(`?fetch_messages=1&receiver=${receiver}`)
            .then(response => response.text())
            .then(data => chatContainer.innerHTML = data);
    }

    function initiateNewChat() {
        const receiver = prompt('Enter the username of the person you want to chat with:');
        if (receiver) {
            fetch(`?validate_user=1&username=${encodeURIComponent(receiver)}`)
                .then(response => response.text())
                .then(data => {
                    if (data.trim() === 'valid') {
                        selectChat(receiver);
                    } else {
                        alert('User does not exist.');
                    }
                });
        }
    }

    document.getElementById('messageForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);

        fetch('', {
            method: 'POST',
            body: formData
        }).then(() => {
            selectChat(currentReceiver);
            refreshRecentChats();
        });
    });

    function refreshRecentChats() {
        const timestamp = new Date().getTime();
        fetch(`?refresh=${timestamp}`)
            .then(response => response.text())
            .then(data => {
                const newRecentChats = data.match(/<div class='recent-chat-item' onclick='selectChat\("(.*?)"\)'>.*?<\/div>/g);
                document.getElementById('recentChats').innerHTML = newRecentChats ? newRecentChats.join('') : '<p>No recent chats found.</p>';
            });
    }

    setInterval(refreshRecentChats, 5000); 
</script>
   
</body>

</html>