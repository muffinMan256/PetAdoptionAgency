<?php
session_start();

require_once "../db_connect.php";
require_once "../file_upload.php";

// Create the 'pictures' directory if it doesn't exist
$uploadDirectory = 'pictures';

if (!file_exists($uploadDirectory) && !mkdir($uploadDirectory, 0777, true)) {
    die('Failed to create upload directory');
}

$id = $_GET["id"] ?? null;

if (!$id) {
    die("Invalid ID");
}

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$userRow = mysqli_fetch_assoc($result);

if (isset($_POST["update"])) {
    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $email = $_POST["email"];
    $password = isset($_POST["password"]) ? $_POST["password"] : $userRow["password"];


    [$pictureName, $message] = fileUpload($_FILES["picture"]);

    // Update picture only if a new file is uploaded
    if ($pictureName) {
        $oldPicture = $userRow["picture"];
        if ($oldPicture) {
            $filePath = $uploadDirectory . '/' . $oldPicture;

            if (file_exists($filePath)) {
                unlink($filePath);
            } else {
                // Handle the case where the file doesn't exist
            }
        }
    } else {
        // If no new file is uploaded, use the existing picture name
        $pictureName = $userRow["picture"];
    }

    $updateSql = "UPDATE users SET first_name=?, last_name=?, email=?, password=?, picture=? WHERE id=?";
    $updateStmt = mysqli_prepare($connection, $updateSql);
    mysqli_stmt_bind_param($updateStmt, "sssssi", $first_name, $last_name, $email, $password, $pictureName, $id);
    if (mysqli_stmt_execute($updateStmt)) {
        $successMessage = "The entry was successfully updated!";
        header("refresh: 5; url=index.php");
    } else {
        $errorMessage = "There was an error in the updating process!";
    }

    mysqli_stmt_close($updateStmt);
}

mysqli_close($connection);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Edit profile</h1>
        <form method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label for="fname" class="form-label">First name</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="First name">
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name">
            </div>

            <div class="mb-3">
                <label for="picture" class="form-label">Profile picture</label>
                <input type="file" class="form-control" id="picture" name="picture">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email address">
            </div>

            <button name="update" type="submit" class="btn btn-warning">Update profile</button>
           
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
