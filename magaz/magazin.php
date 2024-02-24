<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAGAZ</title>
    <link rel="icon" href="img/carts.png" />
    <link rel="stylesheet" href="magazin.css" />
    <script src="fisier.js"></script>
</head>
<body>

    <div class="navbar">
        <div class="datetime">
            <p><?php include 'datatime.php'; ?></p>
        </div>
        <button onclick="showLoginForm()" class="store-btn">Admin</button>
    </div>

    <h1>Pagina magazinului</h1>
    
        <div class="lista_produse">
        
        <?php include 'frame.php' ?>




    
        </div>



        <div id="overlay" class="overlay">
    <div class="login-form">
      <h2>Login</h2>
      <form action="login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
      </form>
      <button onclick="hideLoginForm()">Close</button>
    </div>
  </div>

   
  <script>
    function showLoginForm() {
      var overlay = document.getElementById('overlay');
      overlay.classList.add('active');
    }

    function hideLoginForm() {
      var overlay = document.getElementById('overlay');
      overlay.classList.remove('active');
    }

    
  </script>

</body>
</html>
