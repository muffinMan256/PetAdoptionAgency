<?php
require_once "../db_connect.php";

if (!empty(isset($_POST["submit"]))) {
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $breed = $_POST["breed"];
    $size = $_POST["size"];
    $age = $_POST["age"];
    $vaccine = $_POST["vaccine"];
    $weight = $_POST["weight"];
    $image = $_POST["image"];
    $location = $_POST["location"];
    $description = $_POST["description"];
    $status = $_POST["status"];

    $sql = "INSERT INTO `animals`(`name`, `gender`, `breed`, `size`, `age`, `vaccine`, `weight`, `image`, `location`, `description`, `status`) 
            VALUES ('$name', '$gender' , '$breed' , '$size' , $age , '$vaccine' ,'$weight','$image', '$location', '$description', '$status')";

    if (mysqli_query($connection, $sql)) {
        echo "
            <div class='alert alert-success' role='alert'>
                The pet was added to the family!
            </div>
        ";

        // Redirect to the dashboard after successfully adding a new pet
        header("Location: ../dashboard.php");
        exit(); // Ensure that no further code is executed after the header is sent
    } else {
        echo "
            <div class='alert alert-danger' role='alert'>
                There was an error
            </div>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-oqdzp5egq8XOkpuk5rjKEdK0b3FkcmnZ65cKnHd76w=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Create</title>
</head>

<body>

    <div class="container mt-5">
        <h2>Add a new pet to our Family!</h2>
        <form action="" method="POST" class="row g-3" style="margin-top: 20px">

            <div class="col-md-12">
                <label for="name" class="form-label"> What is the name of the new pet? </label>
                <input class="form-control" type="text" name="name">
            </div>

            <div class="col-md-6">
                <label for="gender" class="form-label"> What is the gender of the pet? </label>
                <select name="gender" class="form-select">
                    <option value=""></option>
                    <option value="Female"> Female </option>
                    <option value="Male"> Male </option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="breed" class="form-label"> What is the breed of the pet? </label>
                <input type="text" class="form-control" name="breed">
            </div>

            <div class="col-md-6">
                <label for="size" class="form-label"> What is the size of the pet? </label>
                <select name="size" class="form-select">
                    <option value=""></option>
                    <option value="small"> Small </option>
                    <option value="medium"> Medium </option>
                    <option value="Large"> Large </option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="age" class="form-label"> How old is the pet?</label>
                <input class="form-control" type="text" name="age">
            </div>

            <div class="col-md-6">
                <label for="vaccine" class="form-label"> Is the pet vaccinated? </label>
                <select name="vaccine" class="form-select">
                    <option value=""></option>
                    <option value="1"> Yes </option>
                    <option value="0"> No </option>
                </select>
            </div>



            <div class="col-md-6">
                <label for="weight" class="form-label"> What is the weight of the pet?</label>
                <input class="form-control" type="number" name="weight">
            </div>


            <div class="col-md-4">
                <label for="image" class="form-label"> Add an image of the pet </label>
                <input class="form-control" type="text" name="image" placeholder="Add picture URL">
            </div>


            <div class="col-md-8">
                <label for="location" class="form-label"> What is the location of the pet? </label>
                <input class="form-control" type="text" name="location">
            </div>

            <div class="col-md-12">
                <label for="description" class="form-label"> Pet description </label>
                <textarea class="form-control" id="description" name="description" placeholder="(max. 200 charachters.)"></textarea>
            </div>

            <div class="col-md-3">
                <label for="status" class="form-label"> What is the status of the pet? </label>
                <select name="status" class="form-select">
                    <option value=""></option>
                    <option value="1"> Avaliable </option>
                    <option value="0"> Adopted </option>
                </select>
            </div>

            <div class="col-md-12">
                <div class="float-end">
                    <input class="btn btn-outline-success btn-lg" type="submit" name="submit" value="Add the new pet to the family!">
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>













