<?php
session_start();

require_once "db_connect.php";
require_once "file_upload.php";

$id = $_GET["petID"] ?? null;

if (!$id) {
    // Handle the case where $id is not set
    die("Invalid ID");
}

$sql = "SELECT * FROM animals WHERE id = ?";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

$backBtn = isset($_SESSION["adm"]) ? "dashboard.php" : "home.php";

if (isset($_POST["update"])) {
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $breed = $_POST["breed"];
    $size = $_POST["size"];
    $age = $_POST["age"];
    $vaccine = $_POST["vaccine"];
    $weight = $_POST["weight"];
    $picture = $_POST["image"];
    $location = $_POST["location"];
    $description = $_POST["description"];
    $status = $_POST["status"];

    $updateSql = "UPDATE `animals` 
                  SET `name`=?, `gender`=?, `breed`=?, `size`=?, `age`=?, `vaccine`=?, `weight`=?, `image`=?, `location`=?, `description`=?, `status`=? 
                  WHERE `id`= ?";

$updateStmt = mysqli_prepare($connection, $updateSql);
mysqli_stmt_bind_param($updateStmt, "ssssdssssssi", $name, $gender, $breed, $size, $age, $vaccine, $weight, $picture, $location, $description, $status, $id);

    if (mysqli_stmt_execute($updateStmt)) {
        $successMessage = "The entry was successfully updated!";
        header("refresh: 3; url=$backBtn");
    } else {
        $errorMessage = "There was an error in the updating process!";
    }

    mysqli_stmt_close($updateStmt);
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Update Animal</h1>
        <?php if (isset($successMessage)) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $successMessage; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($errorMessage)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>
        <form method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="row">
            <div class="col-md-12">
                <label for="name" class="form-label"> What is the name of the new pet? </label>
                <input value="<?= htmlspecialchars($row["name"] ?? ''); ?>" class="form-control" type="text" name="name">
            </div>

            <div class="col-md-6">
                <label for="gender" class="form-label"> What is the gender of the pet? </label>
                <select name="gender" class="form-select">
                    <option value="Female" <?php echo $row["gender"] == "Female" ? "selected" : ""; ?>> Female </option>
                    <option value="Male" <?php echo $row["gender"] == "Male" ? "selected" : ""; ?>> Male </option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="breed" class="form-label"> What is the breed of the pet? </label>
                <input value="<?= htmlspecialchars($row["breed"] ?? ''); ?>" type="text" class="form-control" name="breed">
            </div>

            <div class="col-md-6">
                <label for="size" class="form-label"> What is the size of the pet? </label>
                <select name="size" class="form-select">
                    <option value="small" <?php echo $row["size"] == "small" ? "selected" : ""; ?>> Small </option>
                    <option value="medium" <?php echo $row["size"] == "medium" ? "selected" : ""; ?>> Medium </option>
                    <option value="Large" <?php echo $row["size"] == "Large" ? "selected" : ""; ?>> Large </option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="age" class="form-label"> How old is the pet? </label>
                <input value="<?= htmlspecialchars($row["age"] ?? ''); ?>" class="form-control" type="text" name="age">
            </div>

            <div class="col-md-6">
                <label for="vaccine" class="form-label"> Is the pet vaccinated? </label>
                <select name="vaccine" class="form-select">
                    <option value="1" <?php echo $row["vaccine"] == "1" ? "selected" : ""; ?>> Yes </option>
                    <option value="0" <?php echo $row["vaccine"] == "0" ? "selected" : ""; ?>> No </option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="weight" class="form-label"> What is the weight of the pet? </label>
                <input value="<?= htmlspecialchars($row["weight"] ?? ''); ?>" class="form-control" type="number" name="weight">
            </div>

            <div class="col-md-4">
                <label for="image" class="form-label"> Add an image of the pet </label>
                <input value="<?= htmlspecialchars($row["image"] ?? ''); ?>" class="form-control" type="text" name="image" placeholder="Add picture URL">
            </div>

            <div class="col-md-8">
                <label for="location" class="form-label"> What is the location of the pet? </label>
                <input value="<?= htmlspecialchars($row["location"] ?? ''); ?>" class="form-control" type="text" name="location">
            </div>

            <div class="col-md-12">
                <label for="description" class="form-label"> Pet description </label>
                <textarea class="form-control" id="description" name="description" placeholder="(max. 200 characters.)"><?= htmlspecialchars($row["description"] ?? ''); ?></textarea>
            </div>

            <div class="col-md-3">
                <label for="status" class="form-label"> What is the status of the pet? </label>
                <select name="status" class="form-select">
                    <option value=""></option>
                    <option value="1" <?php echo $row["status"] == "1" ? "selected" : ""; ?>> Available </option>
                    <option value="0" <?php echo $row["status"] == "0" ? "selected" : ""; ?>> Adopted </option>
                </select>
            </div>

            <div class="col-md-12">
                <div class="float-end">
                    <input class="btn btn-outline-success btn-lg" type="submit" name="update" value="Update">
                </div>
            </div>

            
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
