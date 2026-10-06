<!DOCTYPE html>
<html lang="ca">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detall de l'Oferta - Borsa Treball</title>
  <link rel="stylesheet" href="../styles/style.css">
</head>

<body>

  <!-- HEADER -->
  <div class="header-index">
    <a style="text-decoration: none; display: flex; align-items: center; gap: 12px;" href="../index.php">
      <img height="50px" width="50px" src="../assets/logoCostafreda.png" alt="Logo" />
      <h1 style="margin: 0;">Borsa Treball</h1>
    </a>
    <div class="botons-inici">
      <a class="button primary" href="../pages/register.php">Registrar</a>
      <a class="button secondary" href="../pages/login.php">Iniciar Sessió</a>
      <a class="button" href="../pages/publicar-oferta.php">Publicar oferta</a>
    </div>
  </div>

  <!-- CONTINGUT DETALL -->
  <div class="container-detail">
    
    <a href="../index.php" class="back-link">← Tornar a les ofertes</a>

    <div class="detail-card">

      <!-- HERO CAPÇALERA DE L'OFERTA -->
      <div class="detail-hero">
        
        <div class="detail-hero-header">
          <div class="detail-hero-info">
            <span class="badge-status">Oferta Activa</span>
            <h1 class="hero-title">Desenvolupador Web Front-End</h1>
            <a href="#" class="empresa-link">Tech Solutions S.L.</a>
          </div>

          <!-- LOGO A DALT A LA DRETA -->
          <img src="../assets/logoCostafreda.png" alt="Logo de l'empresa" class="hero-logo" />
        </div>

        <div class="hero-quick-tags">
          <span class="hero-tag">📍 Lleida</span>
          <span class="hero-tag">⏰ Jornada completa</span>
          <span class="hero-tag">💶 22.000 € - 26.000 €</span>
          <span class="hero-tag">💻 Híbrid</span>
        </div>

      </div>

      <!-- LAYOUT PRINCIPAL (2 COLUMNES) -->
      <div class="detail-grid">

        <!-- COLUMNA ESQUERRA (DESCRIPCIÓ) -->
        <div class="detail-main-content">
          
          <section class="detail-section">
            <h2>Descripció del lloc de treball</h2>
            <p class="description-text">
              Estem cercant un/a desenvolupador/a web Front-End apassionat/da per la tecnologia i amb ganes de formar part d'un equip dinàmic i innovador. La persona seleccionada s'encarregarà de crear i mantenir interfícies web modernes, millorar l'experiència d'usuari i col·laborar directament amb l'equip de disseny i backend.
            </p>
          </section>

          <section class="detail-section">
            <h2>Tasques i responsabilitats</h2>
            <ul class="detail-list">
              <li>Desenvolupament i maquetació d'interfícies web responsive (HTML5, CSS3, JavaScript).</li>
              <li>Integració de vistes amb backend desenvolupat en PHP / Laravel.</li>
              <li>Optimització del rendiment i l'accessibilitat de les aplicacions web.</li>
              <li>Resolució d'incidències i millora contínua de la usabilitat (UX/UI).</li>
            </ul>
          </section>

          <section class="detail-section">
            <h2>Requisits valorats</h2>
            <div class="skills-grid">
              <span class="skill-badge">HTML5 & CSS3</span>
              <span class="skill-badge">JavaScript (ES6+)</span>
              <span class="skill-badge">PHP Bàsic</span>
              <span class="skill-badge">Git / GitHub</span>
              <span class="skill-badge">Bootstrap / Tailwind</span>
            </div>
          </section>

          <section class="detail-section">
            <div class="empresa-box">
              <h3>Sobre Tech Solutions S.L.</h3>
              <p>Empresa líder en solucions tecnològiques a les comarques de Lleida, especialitzada en desenvolupament de programari a mida i transformació digital per a pimes.</p>
            </div>
          </section>

        </div>

        <!-- SIDEBAR DRETA -->
        <aside class="sidebar-box">
          <div class="actions-wrapper">
            <button class="button primary full-width button-lg">Inscriure'm a l'oferta</button>
            <button class="button secondary full-width">Guardar a preferits</button>
          </div>

          <hr class="sidebar-divider">

          <div class="summary-list">
            <div class="summary-item">
              <span class="summary-label">Publicat</span>
              <span class="summary-value">24/09/2026</span>
            </div>

            <div class="summary-item">
              <span class="summary-label">Ubicació</span>
              <span class="summary-value">Lleida, Espanya</span>
            </div>

            <div class="summary-item">
              <span class="summary-label">Tipus de contracte</span>
              <span class="summary-value">Indefinit</span>
            </div>

            <div class="summary-item">
              <span class="summary-label">Jornada</span>
              <span class="summary-value">Completa (40h/setmana)</span>
            </div>

            <div class="summary-item">
              <span class="summary-label">Salari</span>
              <span class="summary-value">22.000 € - 26.000 € / any</span>
            </div>
          </div>
        </aside>

      </div>

    </div>

  </div>

</body>

</html>