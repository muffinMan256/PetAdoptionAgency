<?php
session_start();

require_once "db_connect.php";
require_once"navbar.php";

if (!isset($_SESSION["user"]) && !isset($_SESSION["adm"])) {
    header("Location: login.php");
    exit(); // Ensure that the script stops executing after a redirect
}

if (isset($_SESSION["user"])) {
    header("Location: home.php");
    exit();
}

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, "i", $_SESSION["adm"]);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

$sqlUsers = "SELECT * FROM users WHERE status != 'adm'";
$resultUsers = mysqli_query($connection, $sqlUsers);

$layout = "";

if ($resultUsers) {
    while ($userRow = mysqli_fetch_assoc($resultUsers)) {
        $layout .= "<div>
            <div class='card' style='width: 18rem;'>
                <img src='pictures/{$userRow["picture"]}' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>{$userRow["first_name"]} {$userRow["last_name"]}</h5>
                    <p class='card-text'>{$userRow["email"]}</p>
                    <a href='products/update.php?id={$userRow["id"]}' class='btn btn-warning'>Update</a>
                </div>
            </div>
        </div>";
    }
} else {
    $layout .= "No results found!";
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard <?= $row["status"] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
   
    <h2 class="text-center">Welcome to the Dashboard <?= $row["status"];?></h2>

    <div class="container">
        <div class="row row-cols-3">
            <?= $layout ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>