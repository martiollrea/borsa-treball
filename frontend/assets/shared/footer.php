<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>

<footer class="site-footer">
  <div class="container footer-grid">

    <div class="footer-col">
      <div class="footer-brand">
        <img height="40px" width="40px" src="../../../frontend/assets/logoCostafreda.png" alt="Logo" />
        <h3>Borsa Treball</h3>
      </div>
      <p>Plataforma oficial d'ocupació de l'Institut Costafreda. Connectem el talent dels nostres aules amb el teixit
        empresarial.</p>
    </div>

    <div class="footer-col">
      <h4>Navegació</h4>
      <ul>
        <li><a href="../../frontend/index.php">Inici</a></li>
        <li><a href="#ofertes">Ofertes de feina</a></li>
        <li><a href="pages/forms/register.php">Registre d'usuaris</a></li>
        <li><a href="pages/forms/login.php">Iniciar Sessió</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>Contacte i Legal</h4>
      <ul>
        <li>📍 Institut Costafreda</li>
        <li>📧 borsa@insalfonscostafreda.cat</li>
        <li><a href="#">Política de Privacitat</a></li>
        <li><a href="#">Avis Legal</a></li>
      </ul>
    </div>

  </div>

  <div class="footer-bottom">
    <div class="container">
      <p>&copy; 2026 Borsa de Treball Institut Costafreda. Tots els drets reservats.</p>
    </div>
  </div>
</footer>