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
            <p1><?php include 'datatime.php'; ?></p1>
        </div>
        <a href="magazin.php"><button class="store-btn" >Magazin</button> </a>
    </div>

    <h1>Pagina depozitului</h1>
    

    <div class="data_table">
        <?php include 'tabel.php' ?>
    </div>
   

    <div class="select_box">
         <p>Editare stoc</p>
         <div class="edit_select">
         <?php include 'edit.php' ?>      
        </div>
    </div>


       
            <div  class="add_product">
                 <p>Adaugare produs</p>
            <form action="adauga_produs.php" method="POST" class="add_form">
        <input type="text" name="nume" id="nume" placeholder="Nume" required><br>

        <textarea name="descriere" id="descriere" rows="1" placeholder="Descriere" required></textarea><br>

        <input type="number" name="stoc" id="stoc" min="0" placeholder="Stoc" required><br>

        <input type="number" name="pret" id="pret" min="0" placeholder="Pret" required><br>

        <input type="submit" value="Adaugă produs">
          </form>
            </div>


</body>
</html>
