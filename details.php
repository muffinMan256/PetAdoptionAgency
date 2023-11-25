<?php 
    require_once "db_connect.php";
    require_once "navbar.php";
    
        $sql = "SELECT * FROM `animals` WHERE id = $_GET[petID]";
        $res = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($res);

        $card = "
        <div class='p-2'>
            <div class='card'>
                <img src='" . htmlspecialchars($row['image']) . "' id='card-img-top' class='card-img-top' alt='Background Image'>
                <div class='card-body' >
                    <h5 class='card-title'> " . htmlspecialchars($row['name']) . " </h5>
                    <p class='card-text'> Gender: " . htmlspecialchars($row['gender']) . " </p>
                    <p class='card-text'> Breed: " . htmlspecialchars($row['breed']) . " </p>
                    <p class='card-text'> Size: " . htmlspecialchars($row['size']) . " </p>
                    <p class='card-text'> Age: " . htmlspecialchars($row['age']) . " </p>
                    <p class='card-text'> Vaccine: " . ($row['vaccine'] ? 'Yes' : 'No') . " </p>
                    <p class='card-text'> Weight: " . htmlspecialchars($row['weight']) . " </p>
                    <p class='card-text'> Location: " . htmlspecialchars($row['location']) . " </p>
                    <p class='card-text'> Description: " . htmlspecialchars($row['description']) . " </p>
                    <p class='card-text'> Status: " . htmlspecialchars($row['status'] ? 'Available' : 'Adopted') . " </p>
                </div>
            </div>
        </div>
    ";
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.72.0">
  <title>Animal Adoption Center</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .section-background {
      background-image: url('https://cdn.pixabay.com/photo/2015/04/23/21/59/tree-736877_640.jpg');
      background-size: cover; /* or 'contain' based on your preference */
      background-position: center center;
      background-repeat: no-repeat;
      color: #ffffff; /* Set text color to be visible against the background */
      padding: 20px; /* Adjust padding as needed */
    }
  </style>


</head>

<body>

  <main>
    <div class="album py-5 bg-light">
      <div class="container align-self-center" >

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?= $card;?>
        </div>
      </div>
    </div>

  </main>

  <footer class="text-muted py-5">
    <div class="container">
      <p class="float-right mb-1">
        <a href="#">Back to top</a>
      </p>
      <p class="mb-1">&copy; JediProgramming</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>