<!DOCTYPE html>
<html lang="ca">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Borsa Treball</title>
  <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
  <div class="header-index">
    <a style="text-decoration: none; display: flex; align-items: center; gap: 12px;" href="../index.php">
      <img height="50px" width="50px" src="../assets/logoCostafreda.png" alt="Logo" />
      <h1 style="margin: 0;">Borsa Treball</h1>
    </a>
    <div class="botons-inici">
      <a class="button secondary">Iniciar Sessió</a>
    </div>
  </div>

  <div class="form-container">
    <div>

    </div>
    <form action="../../backend/validar.php" method="post">
      <div class="form-header">
        <h2>Registra't</h2>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label>Nom</label>
          <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Cognoms</label>
          <input type="text" name="cognoms" class="form-control" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label>Edat</label>
          <input type="text" name="edat" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Telèfon</label>
          <input type="text" name="telefon" class="form-control" required>
        </div>
      </div>
      <div class="form-group">
        <label>Correu Eletrònic</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Població</label>
        <input type="text" name="poblacio" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Contrassenya</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <div class="form-actions">
        <div class="botons-inici">
          <a class="button secondary" href="../index.php">Cancel·lar</a>
          <button class="button primary">Iniciar Sessió</button>
        </div>
      </div>

    </form>
  </div>
</body>

</html>