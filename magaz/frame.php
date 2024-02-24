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

    // Selectarea datelor din tabelul produse
    $sql = "SELECT nume, descriere, stoc, pret FROM depozit";
    $result = $conn->query($sql);

    // Verificare
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="produs">';
            echo '<h3 id="numeProdus">' . $row["nume"] . '</h3>';
            echo '<p>Pret: <span id="pretProdus">' . $row["pret"] . '</span></p>';
            echo '<button class="btn-cumpara" onclick="creareFisierTxt()">Cumpără</button>';
            echo '</div>';
        }
    } else {
        echo "Nu există produse disponibile.";
    }

    




    // Închiderea conexiunii
    $conn->close();
?>
