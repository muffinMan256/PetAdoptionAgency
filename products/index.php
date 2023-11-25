<?php
session_start();

if (!isset($_SESSION["user"]) && !isset($_SESSION["adm"])) { 
    header("Location: login.php"); 
}

if (isset($_SESSION["user"])) { 
    header("Location: home.php"); 
}

require_once "../db_connect.php";
require_once "../navbar.php";

$sql = "SELECT * FROM `animals`";

$result = mysqli_query($connection, $sql);

$cards = "";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cards .= "
            <div class='p-2'>
                <div class='card'>
                    <img src='" . htmlspecialchars($row['image']) . "' id='card-img-top' class='card-img-top' alt='Background Image'>
                    <div class='card-body' >
                        <h5 class='card-title'> " . htmlspecialchars($row['name']) . " </h5>
                        <p class='card-text'> Gender: " . htmlspecialchars($row['gender']) . " </p>
                        <p class='card-text'> Breed: " . htmlspecialchars($row['breed']) . " </p>
                        <p class='card-text'> Status: " . htmlspecialchars($row['status']? 'Available' : 'Adopted') . " </p>
                        <a href='../details.php?petID=" . htmlspecialchars($row['id']) . "' id='btn' class='btn btn-primary' style='margin-bottom: 5px'> Show details</a>
                        <a href='../update.php?petID=" . htmlspecialchars($row['id']) ."' id='btn' class='btn btn-outline-warning' style='margin-bottom: 5px'> Edit </a>
                        <a href='delete.php?petID=" . htmlspecialchars($row['id']) . "' id='btn' class='btn btn-outline-danger' style='margin-bottom: 5px'> Delete Entry </a>
                    </div>
                </div>
            </div>
        ";
    }
} else {
    $cards = "<p>No results found</p>";
}

mysqli_close($connection);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Overview - Animals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <a class="btn btn-secondary" href="create.php">Add a new pet to our family</a>
        <a class="btn btn-warning" href="../dashboard.php">Back to dashboard</a>
        <h1 class="mt-5">All our Animals</h1>
        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-1 row-cols-xs-1">
            <?= $cards ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
