<?php
// Conexiunea la baza de date
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "magaz_electro";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}

// Verificare dacă formularul a fost trimis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Preia valorile din formular
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Verifică dacă utilizatorul există în baza de date
    $sql = "SELECT * FROM utilizatori WHERE login = '$username' AND pass = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Autentificare reușită
        header("Location: index.php");
exit();
        echo "Autentificare reușită!";
    } else {
        // Autentificare eșuată
        // Poți afișa un mesaj de eroare sau efectua alte acțiuni specifice logării eșuate
        echo "Nume de utilizator sau parolă incorectă.";
    }
}

// Închiderea conexiunii
$conn->close();
?>
