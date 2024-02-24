<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "magaz_electro";

    // Crearea conexiunii la baza de date
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
    }

    // Obținerea valorilor din formular
    $nume = $_POST['nume'];
    $descriere = $_POST['descriere'];
    $stoc = $_POST['stoc'];
    $pret = $_POST['pret'];

    // Construirea și executarea interogării SQL pentru adăugarea produsului
    $sql = "INSERT INTO depozit (nume, descriere, stoc, pret) VALUES ('$nume', '$descriere', '$stoc', '$pret')";
    if ($conn->query($sql) === TRUE) {
        echo "Produsul a fost adăugat cu succes!";
    } else {
        echo "Eroare la adăugarea produsului: " . $conn->error;
    }

    // Închiderea conexiunii la baza de date
    $conn->close();
?>
