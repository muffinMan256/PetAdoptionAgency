<?php 
    require_once "db_connect.php";
    require_once "navbar.php";

$sql = "SELECT * FROM `animals` WHERE `age` > 8";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

$card = "";

if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $card .= "
            <div class='p-2'>
                <div class='card'>
                    <img src='" . htmlspecialchars($row['image']) . "' id='card-img-top' class='card-img-top' alt='Background Image'>
                    <div class='card-body' >
                        <h5 class='card-title'> Name: " . htmlspecialchars($row['name']) . " </h5>
                        <p class='card-text'> Status: " . htmlspecialchars($row['status']? 'Available' : 'Adopted') . " </p>
                        <a href='details.php?petID=" . htmlspecialchars($row['id']) . "' id='btn' class='btn btn-primary' style='margin-bottom: 5px'> Show details</a>";

                         // Check if the user is an admin to show the "Edit" and "Delete" buttons
        if (isset($_SESSION['adm'])) {
          $card .= "
              <a href='update.php?petID=" . htmlspecialchars($row['id']) . "' id='btn' class='btn btn-outline-warning' style='margin-bottom: 5px'>Edit</a>
              <a href='products/delete.php?petID=" . htmlspecialchars($row['id']) . "' id='btn' class='btn btn-outline-danger' style='margin-bottom: 5px'>Delete Entry</a>";
      }
      if (isset($_SESSION["user"]) && $row["status"] !=0 ) {
        $card .= "
        <form method='post' action='adopt.php'>
        <input type='hidden' name='prod' value=". htmlspecialchars($row['id']) .">
        <button type='submit' name='adopt' class='btn btn-outline-success' style='margin-bottom: 5px'>Take me home</button>
        </form>
        ";
      }
        $card .= "                 
                    </div>
                </div>
            </div>
        ";
    }
}

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
      text-anchor: left;
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
      background-image: url('https://cdn.pixabay.com/photo/2015/12/01/15/43/black-1072366_1280.jpg');
      background-size: auto; /* or 'contain' based on your preference */
      background-position: center center;
      background-repeat: no-repeat;
      color: #ffffff; /* Set text color to be visible against the background */
      padding: 20px; /* Adjust padding as needed */
    }
  </style>


</head>

<body>

  <main>

  <section class="py-5 text-center container section-background">
  <div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="font-weight-light"></h1>
      <p class="lead text" style="color: #ffffff;"> Explore our Senior Sanctuary, where each distinguished furry friend has a lifetime of experiences to share. From gentle giants to seasoned feline friends, our diverse selection of senior cats and dogs reflects the rich tapestry of their unique personalities.</p>
    </div>
  </div>
</section>


    <div class="album py-5 bg-light">
      <div class="container">

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
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>