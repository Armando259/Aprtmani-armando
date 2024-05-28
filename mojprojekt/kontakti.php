<?php
$servarname = "localhost";
$username = "root";
$password = "";
$database_name = "baza123";

$conn = new mysqli($servarname, $username, $password, $database_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $stmt = $conn->prepare("INSERT INTO kontaktiranje (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            // Nakon uspješnog unosa podataka, korisnik se preusmjerava na kontakti.html
            header("Location: kontakt.html");
            exit(); // Osigurava da se preostali PHP kod ne izvrši nakon preusmjeravanja
        } else {
            echo "Error: " . $stmt->error;
            $stmt->close();
        }
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Connected successfully"; // Ovo će se ispisati samo ako se ne radi o POST zahtjevu
}

$conn->close();
?>
