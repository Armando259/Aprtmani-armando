<?php
require_once('config/db.php');
$query="select * from kontakt";
$result=mysqli_query($con,$query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprtman</title>
    <!-- Bootstrap CSS -->
    <link href='https://fonts.googleapis.com/css?family=Ephesis' rel='stylesheet'>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
 

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
   
   
   <script src="https://use.fontawesome.com/20ab91acc4.js"></script>
   <link rel="stylesheet" href="dizajn.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg  "> <!-- Dodajte bootstrap klase za svjetlosni stil i proširivost -->
    <a class="navbar-brand" href="index.html">Apartman Armando</a> <!-- Vaš logo ili naziv branda -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav ml-auto mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.html">Početna <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">FotoGalerija</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="smjestaj.html">Smještaj</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="kontakt.html">Kontakt</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Info</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="media/hrvatska.png" alt="Dropdown" style="width: 20px; height: 20px;"> <!-- Ažurirajte src s putanjom do vaše slike -->
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Hrvatski</a>
                    <a class="dropdown-item" href="#">Engleski</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="responsive-container">
    <h1>Ispis podataka</h1>
    <table >
        <thead >
            <tr>
                <th>Ime</th>
                <th >Email</th>
                <th >Mobitel</th>
                <th >Grad</th>
                <th>Poruka</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Pretpostavlja se da je već izvršen upit i dobiveni su rezultati
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Phone']) . "</td>";
                echo "<td>" . htmlspecialchars($row['City']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Message']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

              
</div>

    <script src="js/java.js"></script> <!-- Pretpostavljajući da se JS nalazi u poddirektoriju 'js' -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

