  <?php
  session_start();
  if (isset($_SESSION['username'])) {
    $showButtons = false;
  } else {
    $showButtons = true;
  }
  ?>


  <div class="header-index">
    <a style="text-decoration: none; display: flex; align-items: center; gap: 12px;" href="../../../frontend/index.php">
      <img height="50px" width="50px" src="../../../frontend/assets/logoCostafreda.png" alt="Logo" />
      <h1 style="margin: 0;">Borsa Treball</h1>
    </a>
    <?php if ($showButtons == true): ?>
      <div class="botons-inici">
        <a class="button primary" href="../../../frontend/pages/forms/register.php">Registrar</a>
        <a class="button secondary" href="../../../frontend/pages/forms/login.php">Iniciar Sessió</a>
      </div>
    <?php elseif ($showButtons == false): ?>
      <!-- DESPLEGABLE DEL PERFIL -->
      <div class="user-dropdown">
        <button class="avatar-circle-btn" type="button" aria-expanded="false">
          <span class="avatar-initial">
            <?php echo strtoupper(substr($_SESSION['username'] ?? 'U', 0, 1)); ?>
          </span>
        </button>

        <!-- Menú desplegable -->
        <div class="dropdown-menu">
          <div class="dropdown-header">
            <span>Hola, <strong><?php echo htmlspecialchars($_SESSION['username'] ?? 'Usuari'); ?></strong></span>
          </div>
          <hr class="dropdown-divider">
          <a href="../../../backend/logout.php" class="dropdown-item logout-item">
            🚪 Tancar Sessió
          </a>
        </div>
      </div>
    <?php endif; ?>
  </div>