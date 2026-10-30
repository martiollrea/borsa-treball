<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old_input'] ?? [];

unset($_SESSION['errors'], $_SESSION['old_input']);

$tipus = $_GET['tipus'] ?? ($old['tipus_usuari'] ?? 'alumne');
$tipus = ($tipus === 'empresa') ? 'empresa' : 'alumne';
?>
<!DOCTYPE html>
<html lang="ca">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Borsa Treball</title>
  <link rel="stylesheet" href="../../styles/style.css">
  <style>
    .error-msg {
      color: #dc3545;
      font-size: 0.85rem;
      display: block;
    }
  </style>
</head>

<body>

  <?php require_once '../../assets/shared/header.php'; ?>

  <div class='selector-tipus-container'>
    <div class='selector-tipus-usuari'>
      <a href='register.php?tipus=alumne' class='btn-option <?= ($tipus === 'alumne') ? 'active' : '' ?>'>Sóc un
        alumne</a>
      <a href='register.php?tipus=empresa' class='btn-option <?= ($tipus === 'empresa') ? 'active' : '' ?>'>Sóc una
        empresa</a>
    </div>
  </div>

  <div class="form-container">
    <form action="../../../backend/validateRegister.php" method="post">
      <input type="hidden" name="tipus_usuari" value="<?= $tipus ?>">

      <div class="form-header">
        <h2>Registra't (<?= ucfirst($tipus) ?>)</h2>
      </div>

      <?php if ($tipus === 'alumne'): ?>

        <!-- ALUMNE -->
        <div class="form-row">
          <div class="form-group">
            <label>Nom</label>
            <input type="text" name="username" class="form-control"
              value="<?= htmlspecialchars($old['username'] ?? '') ?>">
            <?php if (isset($errors['username'])): ?>
              <span class="error-msg"><?= $errors['username'] ?></span>
            <?php endif; ?>
          </div>

          <div class='form-group'>
            <label>Cognoms</label>
            <input type="text" name="cognoms" class="form-control" value="<?= htmlspecialchars($old['cognoms'] ?? '') ?>">
            <?php if (isset($errors['cognoms'])): ?>
              <span class="error-msg"><?= $errors['cognoms'] ?></span>
            <?php endif; ?>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>Edat</label>
            <input type="text" name="edat" class='form-control' value="<?= htmlspecialchars($old['edat'] ?? '') ?>">
            <?php if (isset($errors['edat'])): ?>
              <span class="error-msg"><?= $errors['edat'] ?></span>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label>Telèfon</label>
            <input type="text" name="telefon" class="form-control" value="<?= htmlspecialchars($old['telefon'] ?? '') ?>">
            <?php if (isset($errors['telefon'])): ?>
              <span class="error-msg"><?= $errors['telefon'] ?></span>
            <?php endif; ?>
          </div>
        </div>

        <div class="form-group">
          <label>Correu Electrònic</label>
          <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($old['email'] ?? '') ?>">
          <?php if (isset($errors['email'])): ?>
            <span class="error-msg"><?= $errors['email'] ?></span>
          <?php endif; ?>
        </div>

        <div class="form-group">
          <label>Població</label>
          <input type="text" name="poblacio" class="form-control" value="<?= htmlspecialchars($old['poblacio'] ?? '') ?>">
          <?php if (isset($errors['poblacio'])): ?>
            <span class="error-msg"><?= $errors['poblacio'] ?></span>
          <?php endif; ?>
        </div>

        <div class="form-group">
          <label>Contrasenya</label>
          <input type="password" name="password" class="form-control">
          <?php if (isset($errors['password'])): ?>
            <span class="error-msg"><?= $errors['password'] ?></span>
          <?php endif; ?>
        </div>

        <div class="form-group">
          <label>Confirmar contrasenya</label>
          <input type="password" name="repetir_password" class="form-control">
          <?php if (isset($errors['repetir_password'])): ?>
            <span class="error-msg"><?= $errors['repetir_password'] ?></span>
          <?php endif; ?>
        </div>

      <?php elseif ($tipus === 'empresa'): ?>

        <!-- EMPRESA -->
        <div class="form-group">
          <label>Nom Empresa</label>
          <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($old['username'] ?? '') ?>">
          <?php if (isset($errors['username'])): ?>
            <span class="error-msg"><?= $errors['username'] ?></span>
          <?php endif; ?>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>Telèfon</label>
            <input type="text" name="telefon" class="form-control" value="<?= htmlspecialchars($old['telefon'] ?? '') ?>">
            <?php if (isset($errors['telefon'])): ?>
              <span class="error-msg"><?= $errors['telefon'] ?></span>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label>Correu Electrònic</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($old['email'] ?? '') ?>">
            <?php if (isset($errors['email'])): ?>
              <span class="error-msg"><?= $errors['email'] ?></span>
            <?php endif; ?>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>Ubicació</label>
            <input type="text" name="poblacio" class="form-control"
              value="<?= htmlspecialchars($old['poblacio'] ?? '') ?>">
            <?php if (isset($errors['poblacio'])): ?>
              <span class="error-msg"><?= $errors['poblacio'] ?></span>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label>Codi Postal</label>
            <input type="text" name="codi_postal" class="form-control"
              value="<?= htmlspecialchars($old['codi_postal'] ?? '') ?>">
            <?php if (isset($errors['codi_postal'])): ?>
              <span class="error-msg"><?= $errors['codi_postal'] ?></span>
            <?php endif; ?>
          </div>
        </div>

        <div class="form-group">
          <label>Contrasenya</label>
          <input type="password" name="password" class="form-control">
          <?php if (isset($errors['password'])): ?>
            <span class="error-msg"><?= $errors['password'] ?></span>
          <?php endif; ?>
        </div>

        <div class="form-group">
          <label>Repetir contrasenya</label>
          <input type="password" name="repetir_password" class="form-control">
          <?php if (isset($errors['repetir_password'])): ?>
            <span class="error-msg"><?= $errors['repetir_password'] ?></span>
          <?php endif; ?>
        </div>

      <?php endif ?>

      <div class="form-actions">
        <div class="botons-inici">
          <a class="button secondary" href="../../index.php">Cancel·lar</a>
          <button type="submit" class="button primary">Registra't</button>
        </div>
      </div>

    </form>
  </div>
</body>

</html>