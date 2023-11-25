<?php 
require_once '../db_connect.php';

if(isset($_GET["petID"]) && !empty($_GET["petID"])){

    $id = $_GET["petID"];

    $sql = "DELETE FROM `animals` WHERE `id` = $id";
    
    if(mysqli_query($connection, $sql)){
        // Entry deleted successfully
        echo "
            <div class='alert alert-success' role='alert'>
                The deletion of the entry was successful!
            </div>
        ";

        // Redirect to index.php after 2 seconds
        echo "
            <script>
                setTimeout(function() {
                    window.location.href = 'index.php';
                }, 2000); // 2000 milliseconds = 2 seconds
            </script>
            
        ";
    } else {
        // Display an error message if deletion fails
        echo "
            <div class='alert alert-danger' role='alert'>
                Error deleting the entry!
            </div>
        ";
    }

}

mysqli_close($connection);
?>
