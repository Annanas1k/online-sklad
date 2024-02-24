<?php

function refreshTabel() {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "magaz_electro";

    // Crearea conexiunii cu baza de date
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificarea conexiunii
    if ($conn->connect_error) {
        die("Conexiune esuata: " . $conn->connect_error);
    }

    // Selectarea datelor din tabelul depozit
    $sql = "SELECT * FROM depozit";
    $result = $conn->query($sql);

    // Verificarea rezultatelor
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Nume</th>
                <th>Descriere</th>
                <th>Stoc</th>
                <th>Pret</th>
                <th>Creat la</th>
                <th>Modificat la</th>
            </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nume"] . "</td>";
            echo "<td>" . $row["descriere"] . "</td>";
            echo "<td>" . $row["stoc"] . "</td>";
            echo "<td>" . $row["pret"] . "</td>";
            echo "<td>" . $row["creat_la"] . "</td>";
            echo "<td>" . $row["modificat_la"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Nu s-au gasit rezultate.";
    }

    // Închiderea conexiunii
    $conn->close();
}

// Apelarea funcției pentru afișarea tabelului
refreshTabel();

?>
