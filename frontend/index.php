<?php
  // Ruta relativa des de la l'arrel de frontend/
  $path = "./";
?>
<!DOCTYPE html>
<html lang="ca">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Borsa de Treball - Institut Costafreda</title>
  <link rel="stylesheet" href="styles/style.css">
</head>

<body>

  <!-- ENCAPÇALAT COMPARTIT -->
  <?php require_once 'assets/shared/header.php'; ?>

  <!-- 1. SECCIÓ HERO (Amb Cercador i Cridada a l'Acció) -->
  <section class="hero-section">
    <div class="hero-content">
      <h1>Conectem el talent del centre amb el món laboral</h1>
      <p>Troba la teva primera oportunitat professional o el candidat ideal per a la teva empresa.</p>

      <!-- Formulari de Cerca -->
      <form class="search-box" action="index.php" method="get">
        <input type="text" name="query" placeholder="Especialitat, perfil o paraula clau (ex: PHP, DAW...)" class="search-input">
        <select name="categoria" class="search-select">
          <option value="">Tots els cicles</option>
          <option value="informatica">Informàtica i Comunicacions</option>
          <option value="administracio">Administració i Gestió</option>
          <option value="sanitat">Sanitat</option>
          <option value="manteniment">Manteniment i Electricitat</option>
        </select>
        <button type="submit" class="button primary btn-search">Cercar feina</button>
      </form>

      <!-- Botons d'accés ràpid -->
      <div class="hero-actions">
        <a href="#ofertes" class="button secondary button-sm">🔍 Veure totes les ofertes</a>
        <a href="pages/forms/publicar-oferta.php" class="button secondary button-sm">💼 Publicar una oferta</a>
      </div>
    </div>
  </section>

  <!-- 2. COMPTADOR D'ESTADÍSTIQUES (Counter Strip) -->
  <section class="stats-strip">
    <div class="container stats-grid">
      <div class="stat-item">
        <span class="stat-number">+50</span>
        <span class="stat-label">Ofertes actives</span>
      </div>
      <div class="stat-item">
        <span class="stat-number">+30</span>
        <span class="stat-label">Empreses col·laboradores</span>
      </div>
      <div class="stat-item">
        <span class="stat-number">85%</span>
        <span class="stat-label">D'inserció laboral</span>
      </div>
      <div class="stat-item">
        <span class="stat-number">CFGS / CFGM</span>
        <span class="stat-label">Tots els cicles formatius</span>
      </div>
    </div>
  </section>

  <!-- 3. SECCIÓ D'OFERTES DESTACADES -->
  <main class="container content-section" id="ofertes">
    <div class="section-header">
      <div>
        <h2>Ofertes de Treball Destacades</h2>
        <p class="section-subtitle">Últimes oportunitats publicades per les nostres empreses col·laboradores</p>
      </div>
      <span class="total-ofertes">6 ofertes disponibles</span>
    </div>

    <!-- Filtres ràpids per etiquetes -->
    <div class="filter-pills">
      <button class="pill active">Totes</button>
      <button class="pill">Informàtica</button>
      <button class="pill">Administració</button>
      <button class="pill">Pràctiques</button>
      <button class="pill">Jornada Completa</button>
    </div>

    <!-- Graella de Targetes d'Oferta -->
    <div class="grid-ofertes">

      <!-- OFERTA 1 -->
      <article class="card-oferta">
        <div class="card-content-simple">
          <div class="card-company-header">
            <h3 class="titol-oferta">Desenvolupador Web Front-End</h3>
          </div>
          
          <div class="requisits-generals">
            <span class="tag tag-blue">Grau DAW / DAM</span>
            <span class="tag tag-default">HTML5 & CSS3</span>
            <span class="tag tag-default">PHP</span>
          </div>

          <p class="detall-oferta">
            Cerquem un desenvolupador web amb experiència per unir-se al nostre equip i treballar en projectes innovadors.
          </p>
        </div>

        <div class="card-footer">
          <span class="data-oferta">📅 Publicat el 24/09/2026</span>
          <a href="details/oferta-detail.php" class="button primary button-sm">Veure detall →</a>
        </div>
      </article>

      <!-- OFERTA 2 -->
      <article class="card-oferta">
        <div class="card-content-simple">
          <div class="card-company-header">
            <h3 class="titol-oferta">Administratiu / va Comptable</h3>
          </div>

          <div class="requisits-generals">
            <span class="tag tag-blue">CFGS Administració</span>
            <span class="tag tag-default">Domini Excel</span>
          </div>

          <p class="detall-oferta">
            Gestionar la comptabilitat diària, atenció a clients i proveïdors. Es requereix capacitat d'organització.
          </p>
        </div>

        <div class="card-footer">
          <span class="data-oferta">📅 Publicat el 22/09/2026</span>
          <a href="details/oferta-detail.php" class="button primary button-sm">Veure detall →</a>
        </div>
      </article>

      <!-- OFERTA 3 -->
      <article class="card-oferta">
        <div class="card-content-simple">
          <div class="card-company-header">
            <h3 class="titol-oferta">Tècnic/a de Xarxes i Sistemes</h3>
          </div>

          <div class="requisits-generals">
            <span class="tag tag-blue">CFGS ASIR</span>
            <span class="tag tag-default">Linux</span>
            <span class="tag tag-default">Cisco</span>
          </div>

          <p class="detall-oferta">
            Manteniment d'infraestructures de xarxa, servidors i resolució d'incidències tècniques de primer nivell.
          </p>
        </div>

        <div class="card-footer">
          <span class="data-oferta">📅 Publicat el 20/09/2026</span>
          <a href="details/oferta-detail.php" class="button primary button-sm">Veure detall →</a>
        </div>
      </article>

    </div>
  </main>

  <!-- 4. ACCIONS DINÀMIQUES SEGONS L'ESTAT DE LA SESSIÓ -->
  <section class="dual-section">
    <div class="container dual-grid">

      <?php if (!isset($_SESSION['username'])): ?>

        <!-- ESTAT 1: SENSE SESSIÓ INICIADA (Invitats) -->
        <div class="dual-card student-card">
          <div class="dual-icon">🎓</div>
          <h3>Ets Alumne o Exalumne?</h3>
          <p>Crea el teu perfil, puja el teu currículum i inscriu-te directament a les ofertes adaptades als teus estudis.</p>
          <a href="pages/forms/register.php?tipus=alumne" class="button primary">Crear el meu perfil</a>
        </div>

        <div class="dual-card company-card">
          <div class="dual-icon">🏢</div>
          <h3>Ets una Empresa?</h3>
          <p>Publica les teves vacants de forma immediata i troba el talent tècnic qualificat format al nostre centre.</p>
          <a href="pages/forms/register.php?tipus=empresa" class="button secondary">Registrar la meva empresa</a>
        </div>

      <?php elseif (($_SESSION['tipus_usuari'] ?? '') === 'alumne'): ?>

        <!-- ESTAT 2: SESSIÓ D'ALUMNE INICIADA -->
        <div class="dual-card student-card">
          <div class="dual-icon">📄</div>
          <h3>El teu Perfil i CV</h3>
          <p>Mantén el teu currículum i dades de contacte actualitzades per destacar davant les empreses.</p>
          <a href="pages/perfil.php" class="button primary">Gestionar el meu perfil</a>
        </div>

        <div class="dual-card student-card">
          <div class="dual-icon">🎯</div>
          <h3>Les teves Candidatures</h3>
          <p>Consulta l'estat dels teus processos de selecció i les ofertes on t'has inscrit.</p>
          <a href="pages/candidatures.php" class="button secondary">Veure inscripcions</a>
        </div>

      <?php else: ?>

        <!-- ESTAT 3: SESSIÓ D'EMPRESA INICIADA -->
        <div class="dual-card company-card">
          <div class="dual-icon">➕</div>
          <h3>Publicar Nova Oferta</h3>
          <p>Tens un lloc vacant? Publica una oferta de treball per trobar candidats qualificats del centre.</p>
          <a href="pages/forms/publicar-oferta.php" class="button primary">Publicar una oferta</a>
        </div>

        <div class="dual-card company-card">
          <div class="dual-icon">📋</div>
          <h3>Gestió d'Ofertes</h3>
          <p>Revisa les ofertes que tens actives i administra les sol·licituds dels alumnes candidats.</p>
          <a href="pages/gestio-ofertes.php" class="button secondary">Les meves ofertes</a>
        </div>

      <?php endif; ?>

    </div>
  </section>

  <!-- 5. FAMÍLIES PROFESSIONALS -->
  <section class="container content-section">
    <div class="section-header">
      <h2>Explora per Família Professional</h2>
    </div>

    <div class="categories-grid">
      <a href="index.php?categoria=informatica" class="category-card">
        <span class="category-icon">💻</span>
        <h4>Informàtica i Comunicacions</h4>
        <span class="category-count">18 ofertes</span>
      </a>

      <a href="index.php?categoria=administracio" class="category-card">
        <span class="category-icon">📊</span>
        <h4>Administració i Gestió</h4>
        <span class="category-count">12 ofertes</span>
      </a>

      <a href="index.php?categoria=electricitat" class="category-card">
        <span class="category-icon">⚡</span>
        <h4>Electricitat i Electrònica</h4>
        <span class="category-count">8 ofertes</span>
      </a>

      <a href="index.php?categoria=sanitat" class="category-card">
        <span class="category-icon">🩺</span>
        <h4>Sanitat</h4>
        <span class="category-count">5 ofertes</span>
      </a>
    </div>
  </section>

  <!-- 6. PIE DE PÁGINA (FOOTER) -->
  <footer class="site-footer">
    <div class="container footer-grid">
      
      <div class="footer-col">
        <div class="footer-brand">
          <img height="40px" width="40px" src="assets/logoCostafreda.png" alt="Logo" />
          <h3>Borsa Treball</h3>
        </div>
        <p>Plataforma oficial d'ocupació de l'Institut Costafreda. Connectem el talent dels nostres aules amb el teixit empresarial.</p>
      </div>

      <div class="footer-col">
        <h4>Navegació</h4>
        <ul>
          <li><a href="index.php">Inici</a></li>
          <li><a href="#ofertes">Ofertes de feina</a></li>
          <li><a href="pages/forms/register.php">Registre d'usuaris</a></li>
          <li><a href="pages/forms/login.php">Iniciar Sessió</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Contacte i Legal</h4>
        <ul>
          <li>📍 Institut Costafreda</li>
          <li>📧 borsa@institutcostafreda.cat</li>
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

</body>
</html>