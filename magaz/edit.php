
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "magaz_electro";

    // Conectarea la baza de date
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
    }

    // Obținerea valorilor din baza de date
    $sql = "SELECT nume FROM depozit";
    $result = $conn->query($sql);

    if (!$result) {
        die("Eroare: " . $conn->error);
    }
    ?>

    <form method="POST" action="">
        <select name="selectbox" id="selectbox">
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['nume'] . "'>" . $row['nume'] . "</option>";
            }
            ?>
        </select>

        <input type="number" name="numeric" id="numeric" required/>

        <button type="submit" name="ok">OK</button>
    </form>

    <?php
    // Procesarea datelor trimise prin formular
    if (isset($_POST['ok'])) {
        $selectedValue = $_POST['selectbox'];
        $numericValue = $_POST['numeric'];

        // Actualizarea înregistrării în baza de date
        $updateSql = "UPDATE depozit SET stoc = stoc + $numericValue WHERE nume = '$selectedValue'";
        if ($conn->query($updateSql) === TRUE) {
            echo "Stocul a fost actualizat cu succes.";
        } else {
            echo "Eroare la actualizarea stocului: " . $conn->error;
        }
    }


    

    // Închiderea conexiunii la baza de date
    $conn->close();
    ?>
