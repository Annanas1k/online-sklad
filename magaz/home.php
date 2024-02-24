<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAGAZ</title>
    <link rel="icon" href="img/carts.png" />
    <link rel="stylesheet" href="home.css" />
</head>
<body>

<div class="navbar">
        <div class="datetime">
            <?php
                $currentDateTime = date('Y-m-d H:i:s');
                echo $currentDateTime;
            ?>
        </div>
        <button class="store-btn">Magazin</button>
    </div>

    <h1>Pagina depozitului</h1>
    <?php
        // conectarea cu baza de date

            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "magaz_electro";
            // conexiunea cu baza de date
            $conn = new mysqli($servername, $username, $password, $dbname);

            if($conn->connect_error ) {
                die("Conexiunea a eșuat: " . $conn->connect_error);
            }



    ?>


            



    
        <div class="data_table">
    <table>
        <tr>
            <th>ID</th>
            <th>Nume</th>
            <th>Descriere</th>
            <th>Stoc</th>
            <th>Pret</th>
            <th>Creat la</th>
            <th>Modificat la</th>
        </tr>
        <?php
            // selectarea datelor din tabelul depozit
            $sql = "SELECT * FROM depozit";
            $result = $conn->query($sql);

            // Verificare
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
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
            } else {
                echo "<tr><td colspan='7'>Nu s-au găsit rezultate.</td></tr>";
            }
        
        ?>

    </table>
        </div>
            <p>Editare stoc</p>

        <div class="select_box">
            <?php
                $sql = "SELECT nume FROM depozit";
                $result = mysqli_query($conn, $sql);

                if(!$result) {
                    die("eroare" . mysqli_error($conn));
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

                <input type="number" name="numeric" id="numeric" min="0" />

                <button type="submit" name="ok" >OK</button>
            </form>

            <?php
            // Procesarea datelor trimise prin formular
            if (isset($_POST['ok'])) {
                $selectedValue = $_POST['selectbox'];
                $numericValue = $_POST['numeric'];

                // Actualizarea înregistrării în baza de date
                $updateSql = "UPDATE depozit SET stoc = stoc + $numericValue  WHERE nume = '$selectedValue'";
                if ($conn->query($updateSql) === TRUE) {
                    echo "Stocul a fost actualizat cu succes." . $numericValue;
                } else {
                    echo "Eroare la actualizarea stocului: " . $conn->error;
                }
            }

    ?>
        </div>


        <p>Adaugare produs</p>
            <div class="add_product">
            <form  method="POST" class="add_form">
        <input type="text" name="nume" id="nume" placeholder="Nume" required><br>

        <textarea name="descriere" id="descriere" rows="1" placeholder="Descriere" required></textarea><br>

        <input type="number" name="stoc" id="stoc" min="0" placeholder="Stoc" required><br>

        <input type="number" name="pret" id="pret" min="0" placeholder="Pret" required><br>

        <input type="submit" value="Adaugă produs">
          </form>

                    <?php
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
            ?>




            </div>



        <?php
        // închiderea conexiunii
            $conn->close();
        ?>




<script>
        function refreshPage() {
            location.reload();
        }
    </script>
</body>
</html>
