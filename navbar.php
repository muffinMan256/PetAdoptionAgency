<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

echo "
    <nav class='navbar navbar-expand-lg bg-body-tertiary'>
        <div class='container-fluid'>
            
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>";

// Check if the user is logged in
if (isset($_SESSION['user']) || isset($_SESSION['adm'])) {
    // Display user type
    echo "<span class='navbar-text'> Logged in as: ";
    
    if (isset($_SESSION['adm'])) {
        echo " Admin </span>";
        echo "
            <li class='nav-item'>
                <a class='nav-link' href='senior.php'> Senior </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='index.php'> Home </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='logout.php'> Logout </a>
            </li>";
    } elseif (isset($_SESSION['user'])) {
        // Display user email and picture
        $userEmail = isset($_SESSION['user']['email']) ? $_SESSION['user']['email'] : 'Unknown Email';
        $userPicture = isset($_SESSION['user']['picture']) ? $_SESSION['user']['picture'] : 'path/to/default_picture.jpg';

        echo " User ($userEmail) </span>
            <li class='nav-item'>
                <a class='nav-link' href='senior.php'> Senior </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='home.php'> Home </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='logout.php'> Logout </a>
            </li>";
            
        // Display user picture
        echo "<li class='nav-item'>
                <img src='$userPicture' alt='User Picture' class='user-picture'>
              </li>";
    }
} else {
    // If not logged in, show a login button
    echo "<li class='nav-item'>
            <a class='nav-link' href='login.php'> Login </a>
          </li>";
}

echo "
            </ul>
        </div>
    </div>
</nav>";
?>
