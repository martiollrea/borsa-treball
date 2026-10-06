<!DOCTYPE html>
<html lang="ca">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Borsa Treball</title>
  <link rel="stylesheet" href="../../styles/style.css">
</head>

<body>
  <div class="header-index">
    <a style="text-decoration: none; display: flex; align-items: center; gap: 12px;" href="../../index.php">
      <img height="50px" width="50px" src="../../assets/logoCostafreda.png" alt="Logo" />
      <h1 style="margin: 0;">Borsa Treball</h1>
    </a>
    <div class="botons-inici">
      <a class="button secondary" href="login.php">Iniciar Sessió</a>
    </div>
  </div>

  <?php
    // Detectem el tipus d'usuari a través de la URL (per defecte 'alumne')
    $tipus = isset($_GET['tipus']) && $_GET['tipus'] === 'empresa' ? 'empresa' : 'alumne';
  ?>
  <div class='selector-tipus-container'>
    <div class='selector-tipus-usuari'>
      <form action='register.php' method='get'>
        <a href='register.php?tipus=alumne' class='btn-option <?= ($tipus === 'alumne') ? 'active' : '' ?>'>Sóc un alumne</a>
        <a href='register.php?tipus=empresa' class='btn-option <?= ($tipus === 'empresa') ? 'active' : '' ?>'>Sóc una empresa</a>
      </form>
    </div>
  </div>


  <!-- Camp ocult per enviar al backend quin tipus d'usuari es registra -->
      <input type="hidden" name="tipus_usuari" value="<?= $tipus ?>">


  <div class="form-container">
    <form action="../../backend/validar.php" method="post">
      <div class="form-header">
        <h2>Registra't</h2>
      </div>
      
      <?php if($tipus === 'alumne'): ?>
      <div class="form-row">
        <div class="form-group">
          <label>Nom</label>
          <input type="text" name="username" class="form-control" required>
        </div>
        <div class='form-group'>
          <label>Cognoms</label>
          <input type="text" name="cognoms" class="form-control" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label>Edat</label>
          <input type="text" name="edat" class='form-control' required>
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


      <?php elseif ($tipus === 'empresa'): ?>
        
      <div class="form-group">
          <label>Nom Empresa</label>
          <input type="text" name="username" class="form-control" required>
        </div>
      <div class="form-row">
        <div class="form-group">
          <label>Telèfon</label>
          <input type="text" name="telefon" class="form-control" required>
        </div>
      
      <div class="form-group">
        <label>Correu Eletrònic</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      </div>
      <div class="form-row">
      <div class="form-group">
        <label>Ubicació</label>
        <input type="text" name="poblacio" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Codi Postal</label>
        <input type="text" name="poblacio" class="form-control" required>
      </div>
      </div>
      <div class="form-group">
        <label>Contrassenya</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      

      <?php endif ?>
      <div class="form-actions">
        <div class="botons-inici">
          <a class="button secondary" href="../../index.php">Cancel·lar</a>
          <button class="button primary">Registra't</button>
        </div>
      </div>

    </form>
  </div>
</body>

</html>