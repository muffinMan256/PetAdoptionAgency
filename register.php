<?php
session_start();

if (isset($_SESSION["user"])) {
    // if a session "user" is exist and has a value
    header("Location: home.php"); // redirect the user to the home page
}

if (isset($_SESSION["adm"])) {
    // if a session "adm" is exist and has a value
    header("Location: dashboard.php"); // redirect the admin to the dashboard page
}

require_once "db_connect.php";
require_once "file_upload.php";

$error = false; // by default, a variable $error is false, means there is no error in our form

function cleanInputs($input)
{
    $data = trim($input); // removing extra spaces, tabs, newlines out of the string
    $data = strip_tags($data); // removing tags from the string
    $data = htmlspecialchars($data); // converting special characters to HTML entities, something like "<" and ">", it will be replaced by "&lt;" and "&gt";

    return $data;
}

$fname = $lname = $email = $date_of_birth = $number = $address = ""; // define variables and set them to empty string
$fnameError = $lnameError = $emailError = $dateError = $passError = ""; // define variables that will hold error messages later, for now, an empty string

if (isset($_POST["sign-up"])) {
    $fname = cleanInputs($_POST["fname"]);
    $lname = cleanInputs($_POST["lname"]);
    $email = cleanInputs($_POST["email"]);
    $password = cleanInputs($_POST["password"]);
    $date_of_birth = cleanInputs($_POST["date_of_birth"]);
    $picture = fileUpload($_FILES["picture"]);
    $number = cleanInputs($_POST["number"]);
    $address = cleanInputs($_POST["address"]);

    // simple validation for the "first name"
    if (empty($fname)) {
        $error = true;
        $fnameError = "Please, enter your first name";
    } elseif (strlen($fname) < 3) {
        $error = true;
        $fnameError = "Name must have at least 3 characters.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $fname)) {
        $error = true;
        $fnameError = "Name must contain only letters and spaces.";
    }

    // simple validation for the "last name"
    if (empty($lname)) {
        $error = true;
        $lnameError = "Please, enter your last name";
    } elseif (strlen($lname) < 3) {
        $error = true;
        $lnameError = "Last name must have at least 3 characters.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $lname)) {
        $error = true;
        $lnameError = "Last name must contain only letters and spaces.";
    }

    // simple validation for the "date of birth"
    if (empty($date_of_birth)) {
        $error = true;
        $dateError = "date of birth can't be empty!";
    }

    // simple validation for the "date of birth"
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // if the provided text is not a format of an email, an error will be true
        $error = true;
        $emailError = "Please enter a valid email address";
    } else {
        // if email is already exists in the database, an error will be true
        $query = "SELECT email FROM users WHERE email='$email'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) != 0) {
            $error = true;
            $emailError = "Provided Email is already in use";
        }
    }

    // simple validation for the "password"
    if (empty($password)) {
        $error = true;
        $passError = "Password can't be empty!";
    } elseif (strlen($password) < 6) {
        $error = true;
        $passError = "Password must have at least 6 characters.";
    }

    if (!$error) {
        // if there is no error with any input, data will be inserted into the database
        // hashing the password before inserting it into the database
        $password = hash("sha256", $password);

        $sql = "INSERT INTO users (`first_name`, `last_name`, `email`, `phone_number`, `address`, `picture`, `password`)
            VALUES ('$fname', '$lname', '$email', '$number', '$address', '$picture[0]', '$password')";

        $result = mysqli_query($connection, $sql);

        if ($result) {
            echo "<div class='alert alert-success'>
            <p>New account has been created, $picture[1]</p>
        </div>";
        } else {
            echo "<div class='alert alert-danger'>
            <p>Something went wrong, please try again later ...</p>
        </div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Sign Up</h1>
        <form method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label for="fname" class="form-label">First name</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="First name"
                    value="<?= $fname ?>">
                <span class="text-danger"><?= $fnameError ?></span>
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name"
                    value="<?= $lname ?>">
                <span class="text-danger"><?= $lnameError ?></span>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date of birth</label>
                <input type="date" class="form-control" id="date" name="date_of_birth" value="<?= $date_of_birth ?>">
                <span class="text-danger"><?= $dateError ?></span>
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Profile picture</label>
                <input type="file" class="form-control" id="picture" name="picture">
            </div>
            <div class="mb-3">
                <label for="number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number"
                    value="<?= $number ?>">
                <!-- Add any validation/error message for number if needed -->
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Address"
                    value="<?= $address ?>">
                <!-- Add any validation/error message for address if needed -->
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email address"
                    value="<?= $email ?>">
                <span class="text-danger"><?= $emailError ?></span>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <span class="text-danger"><?= $passError ?></span>
            </div>
            <button name="sign-up" type="submit" class="btn btn-primary">Create account</button>

            <span>Already have an account? <a href="login.php">Sign in here</a></span>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>
