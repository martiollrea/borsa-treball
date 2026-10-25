<!DOCTYPE html>
<html lang="ca">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Borsa Treball</title>
  <link rel="stylesheet" href="../../styles/style.css">
</head>

<body>
  <?php
  require_once '../../assets/shared/header.php';
  ?>

  <div class="form-container">
    <div>

    </div>
    <form method="post" action="../../../backend/validateLogin.php">
      <div class="form-header">
        <h2>Inicia sessió</h2>
      </div>

      <div class="form-group">
        <label>Nom d'usuari</label>
        <input type="text" name="username" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Contrassenya</label>
        <input type="password" name="password" class="form-control" required>
      </div>
           <?php     if (isset($_GET['error'])) {
    echo '<p style="color:red"> error <p>';
    unset($_GET['error']);
  }?>
      <div class="form-actions">
        <div class="botons-inici">
          <a class="button secondary" href="../../index.php">Cancel·lar</a>
          <button class="button primary">Iniciar Sessió</button>
        </div>
      </div>
    </form>
  </div>

</body>

</html>