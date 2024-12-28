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
    <title>Code Connect</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="pages.css">

</head>

<body>
    <nav>
        <img src="images/logo.png" alt="CONNECT">

        <div class="search">
            <input type="text" placeholder="Search...">
            <i class="bx bx-search icon"></i>
        </div>


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

    <div class="custom-select">
        <select id="category-select">
            <option value="all">CHOOSE CATEGORY</option>
            <option value="web">Web Development</option>
            <option value="systems">Systems Programming</option>
            <option value="database">Database Languages</option>
            <option value="mobile">Mobile App Development</option>
            <option value="game">Game Development</option>
            <option value="basic">Basic Languages</option>
            <option value="functional">Functional Programming</option>
            <option value="oop">Object-Oriented Programming</option>
            <option value="popular">Popular Programming</option>
            <option value="scripting">Scripting Languages</option>
        </select>
    </div>

    <div class="container" id="card-container">
        
        <div class="card" data-category="oop popular">
            <div class="card-image">
                <img src="images/java.png" alt="Java">
            </div>
            <div class="content">
                <h3>Java</h3>
                <a href="" class="button">Learn More</a>
            </div>
        </div>

        
        <div class="card" data-category="scripting popular web functional">
            <div class="card-image">
                <img src="images/python.png" alt="Python">
            </div>
            <div class="content">
                <h3>Python</h3>
                <a href="" class="button">Learn More</a>
            </div>
        </div>

      
        <div class="card" data-category="oop popular systems">
            <div class="card-image">
                <img src="images/c++.png" alt="C++">
            </div>
            <div class="content">
                <h3>C++</h3>
                <a href="" class="button">Learn More</a>
            </div>
        </div>

        
        <div class="card" data-category="web scripting popular">
            <div class="card-image">
                <img src="images/js.png" alt="JavaScript">
            </div>
            <div class="content">
                <h3>JavaScript</h3>
                <a href="js-ov.php" class="button">Learn More</a>
            </div>
        </div>

        
        <div class="card" data-category="oop popular mobile game">
            <div class="card-image">
                <img src="images/csharp.jpg" alt="C#">
            </div>
            <div class="content">
                <h3>C#</h3>
                <a href="" class="button">Learn More</a>
            </div>
        </div>

        
        <div class="card" data-category="database">
            <div class="card-image">
                <img src="images/sql.jpeg" alt="SQL">
            </div>
            <div class="content">
                <h3>SQL</h3>
                <a href="" class="button">Learn More</a>
            </div>
        </div>

        
        <div class="card" data-category="mobile">
            <div class="card-image">
                <img src="images/swift.jpg" alt="Swift">
            </div>
            <div class="content">
                <h3>Swift</h3>
                <a href="" class="button">Learn More</a>
            </div>
        </div>

        
        <div class="card" data-category="web">
            <div class="card-image">
                <img src="images/html and css.jpg" alt="HTML and CSS">
            </div>
            <div class="content">
                <h3>HTML and CSS</h3>
                <a href="css-ov.php" class="button">Learn More</a>
            </div>
        </div>

        
        <div class="card" data-category="systems">
            <div class="card-image">
                <img src="images/ada.png" alt="Ada">
            </div>
            <div class="content">
                <h3>Ada</h3>
                <a href="" class="button">Learn More</a>
            </div>
        </div>

        
        <div class="card" data-category="systems">
            <div class="card-image">
                <img src="images/assembly.jpg" alt="Assembly Language">
            </div>
            <div class="content">
                <h3>Assembly Language</h3>
                <a href="" class="button">Learn More</a>
            </div>
        </div>

        
        <div class="card" data-category="basic">
            <div class="card-image">
                <img src="images/basic.jpg" alt="BASIC">
            </div>
            <div class="content">
                <h3>BASIC</h3>
                <a href="" class="button">Learn More</a>
            </div>
        </div>

        
        <div class="card" data-category="scripting">
            <div class="card-image">
                <img src="images/bash.png" alt="Bash">
            </div>
            <div class="content">
                <h3>Bash (Shell Script)</h3>
                <a href="" class="button">Learn More</a>
            </div>
        </div>

        
        <div class="card" data-category="systems">
            <div class="card-image">
                <img src="images/c.png" alt="C">
            </div>
            <div class="content">
                <h3>C</h3>
                <a href="" class="button">Learn More</a>
            </div>
        </div>

        
        <div class="card" data-category="web scripting">
            <div class="card-image">
                <img src="images/php.jpg" alt="PHP">
            </div>
            <div class="content">
                <h3>PHP</h3>
                <a href="" class="button">Learn More</a>
            </div>
        </div>

        
        <div class="card" data-category="database">
            <div class="card-image">
                <img src="images/cql.jpg" alt="CQL">
            </div>
            <div class="content">
                <h3>CQL</h3>
                <a href="" class="button">Learn More</a>
            </div>
        </div>

        
        <div class="card" data-category="web">
            <div class="card-image">
                <img src="images/css.jpg" alt="CSS">
            </div>
            <div class="content">
                <h3>CSS</h3>
                <a href="css-ov.php" class="button">Learn More</a>
            </div>
        </div>

        
        <div class="card" data-category="mobile">
            <div class="card-image">
                <img src="images/dart.png" alt="Dart">
            </div>
            <div class="content">
                <h3>Dart</h3>
                <a href="" class="button">Learn More</a>
            </div>
        </div>

        
        <div class="card" data-category="systems">
            <div class="card-image">
                <img src="images/d.png" alt="D">
            </div>
            <div class="content">
                <h3>D</h3>
                <a href="" class="button">Learn More</a>
            </div>
        </div>

        <div class="card" data-category="functional database">
            <div class="card-image">
                <img src="images/datalog.png" alt="Datalog">
            </div>
            <div class="content">
                <h3>Datalog</h3>
                <a href="" class="button">Learn More</a>
            </div>
        </div>

        
        <div class="card" data-category="functional">
            <div class="card-image">
                <img src="images/elm.png" alt="Elm">
            </div>
            <div class="content">
                <h3>Elm</h3>
                <a href="" class="button">Learn More</a>
            </div>
        </div>

        
        <div class="card" data-category="functional">
            <div class="card-image">
                <img src="images/erlang.png" alt="Erlang">
            </div>
            <div class="content">
                <h3>Erlang</h3>
                <a href="" class="button">Learn More</a>
            </div>
        </div>

        
        <div class="card" data-category="functional">
            <div class="card-image">
                <img src="images/Fsharp.jpg" alt="F#">
            </div>
            <div class="content">
                <h3>F#</h3>
                <a href="" class="button">Learn More</a>
            </div>
        </div>

       
        <div class="card" data-category="systems">
            <div class="card-image">
                <img src="images/fortran.jpg" alt="Fortran">
            </div>
            <div class="content">
                <h3>Fortran</h3>
                <a href="" class="button">Learn More</a>
            </div>
        </div>

        
        <div class="card" data-category="systems">
            <div class="card-image">
                <img src="images/go.jpg" alt="Go">
            </div>
            <div class="content">
                <h3>Go</h3>
                <a href="" class="button">Learn More</a>
            </div>
        </div>

        
        <div class="card" data-category="functional">
            <div class="card-image">
                <img src="images/haskell.jpg" alt="Haskell">
            </div>
            <div class="content">
                <h3>Haskell</h3>
                <a href="" class="button">Learn More</a>
            </div>
        </div>

      
        <div class="card" data-category="web">
            <div class="card-image">
                <img src="images/html.png" alt="HTML">
            </div>
            <div class="content">
                <h3>HTML</h3>
                <a href="html-ov.php" class="button">Learn More</a>
            </div>
        </div>
    </div>
</div>

<script>
    
    const searchInput = document.querySelector('.search input');
    const cards = document.querySelectorAll('.card');


    searchInput.addEventListener('input', function() {
        const query = searchInput.value.toLowerCase();
        cards.forEach(card => {
            const languageName = card.querySelector('h3').textContent.toLowerCase();
            if (languageName.includes(query)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });

    const selectElement = document.getElementById('category-select');
    selectElement.addEventListener('change', () => {
        const selectedCategory = selectElement.value;

        cards.forEach(card => {
            const categories = card.getAttribute('data-category').split(' ');

            if (selectedCategory === 'all' || categories.includes(selectedCategory)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
</script>

</body>

</html>