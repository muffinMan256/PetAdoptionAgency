<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption Form</title>
</head>
<body>

    <h1>Pet Adoption Form</h1>

    <?php
    require_once "db_connect.php";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_POST['adopt'])) {
        // Retrieve user ID from the session (assuming you have a logged-in user)
        $userId = $_SESSION['user'];  // Change this to your actual user ID key

        // Assuming $_POST['fk_user'] and $_POST['fk_animals'] are set in your form
        $fkUser = $_POST["fk_user"];
        $fkAnimal = $_POST["fk_animals"];

        echo "User ID: " . $userId . "<br>";
        echo "Animal ID: " . $fkAnimal . "<br>";
        
        // Use the existing database connection from db_connect.php
        global $connection; // assuming your connection variable is named $connection

        // Insert a new record into the pet_adoption table
        $sql = "INSERT INTO `pet_adoption` (fk_user, fk_animals, buy_date) 
        VALUES (?, ?, NOW())";  

        $stmt = $connection->prepare($sql);

        if (!$stmt) {
            die("Error preparing statement: " . $connection->error);
        }

        //"ii": This is a string that specifies the data types of the variables being bound. In this case, it indicates that both $userId and $fkAnimal are integers (i stands for integer).
        $stmt->bind_param("ii", $userId, $fkAnimal);

        if ($stmt->execute()) {
            echo "Pet adopted successfully!";
        } else {
            echo "Error adopting pet: " . $stmt->error;
        }

        // Close the database connection
        $stmt->close();
    }
    ?>

    <form method="post" action="">
        <label for="fk_user">User ID:</label>
        <input value="<?= htmlspecialchars($row["fk_user"] ?? ''); ?>" type="text" name="fk_user" required >

        <label for="fk_animals">Animal ID:</label>
        <input value="<?= htmlspecialchars($row["fk_animals"] ?? ''); ?>"type="text" name="fk_animals" required>

        <button type="submit" name="adopt">Adopt Pet</button>
    </form>

</body>
</html>
