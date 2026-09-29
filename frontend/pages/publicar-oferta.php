<!DOCTYPE html>
<html>

<head>
  <title>Publicar oferta</title>
  <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
  <div class="header-index">
    <a style="text-decoration: none; display: flex; align-items: center; gap: 12px;" href="../index.php">
      <img height="50px" width="50px" src="../assets/logoCostafreda.png" alt="Logo" />
      <h1 style="margin: 0;">Borsa Treball</h1>
    </a>
    <div class="botons-inici">
      <a class="button primary" href="../pages/register.php">Registrar</a>
      <a class="button secondary">Iniciar Sessió</a>
    </div>
  </div>

  <div class="form-container">
    <div class="form-header">
      <h2>Publicar oferta</h2>
      <p>Emplena el formulari per publicar una oferta de treball a la borsa.</p>
    </div>

    <form class="custom-form" action="../../backend/validatePublicarOferta.php" method="post">
      <div class="form-group">
        <label for="title">Títol: <span class="required">*</span></label>
        <input type="text" id="title" name="title" class="form-control" required />
      </div>

      <div class="form-group">
        <label for="description">Descripció: <span class="required">*</span></label>
        <textarea id="description" name="description" class="form-control" required></textarea>
      </div>

      <div class="form-group">
        <label for="sector">Sector: <span class="required">*</span></label>
        <input type="text" id="sector" name="sector" class="form-control" required />
      </div>

      <div class="form-group">
        <label for="date">Data vàlida: <span class="required">*</span></label>
        <input type="date" id="date" name="date" class="form-control" required />
      </div>

      <div class="form-actions">
        <a href="../index.php"><button type="button" class="button secondary">Cancel·lar</button></a>
        <button type="submit" class="button primary">Desar dades</button>
      </div>
    </form>
  </div>
</body>

</html>