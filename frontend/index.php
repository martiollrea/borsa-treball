<!DOCTYPE html>
<html lang="ca">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Borsa Treball - Ofertes Disponibles</title>
  <link rel="stylesheet" href="styles/style.css">
</head>

<body>

  <!-- HEADER -->
  <div class="header-index">
    <a style="text-decoration: none; display: flex; align-items: center; gap: 12px;" href="../frontend/index.php">
      <img height="50px" width="50px" src="../frontend/assets/logoCostafreda.png" alt="Logo" />
      <h1 style="margin: 0;">Borsa Treball</h1>
    </a>
    <div class="botons-inici">
      <a class="button primary" href="../frontend/pages/register.php">Registrar</a>
      <a class="button secondary" href="../frontend/pages/login.php">Iniciar Sessió</a>
      <a class="button" href="../frontend/pages/publicar-oferta.php">Publicar oferta</a>
    </div>
  </div>

  <!-- CONTINGUT PRINCIPAL -->
  <div class="contingut-index">
    <div class="index-title-bar">
      <h2>Ofertes Disponibles</h2>
      <span class="total-ofertes">6 ofertes trobades</span>
    </div>

    <div class="grid-ofertes">

      <!-- OFERTA 1 -->
      <article class="card-oferta">
        <div class="card-content-simple">
          <h3 class="titol-oferta">Desenvolupador Web Front-End</h3>
          
          <div class="requisits-generals">
            <span class="tag tag-blue">Grau DAW / DAM</span>
            <span class="tag tag-default">HTML5 & CSS3</span>
            <span class="tag tag-default">PHP</span>
          </div>

          <p class="detall-oferta">
            Cerquem un desenvolupador web amb experiència per unir-se al nostre equip i treballar en projectes innovadors de desenvolupament web.
          </p>
        </div>

        <div class="card-footer">
          <span class="data-oferta">📅 Publicat el 24/09/2026</span>
          <a href="../frontend/details/oferta-detail.php" class="button primary button-sm">Veure oferta →</a>
        </div>
      </article>

      <!-- OFERTA 2 -->
      <article class="card-oferta">
        <div class="card-content-simple">
          <h3 class="titol-oferta">Administratiu / va Comptable</h3>

          <div class="requisits-generals">
            <span class="tag tag-blue">CFGS Administració</span>
            <span class="tag tag-default">Domini Excel</span>
          </div>

          <p class="detall-oferta">
            Gestionar la comptabilitat diària, atenció a clients i proveïdors. Es requereix capacitat d'organització i treball en equip.
          </p>
        </div>

        <div class="card-footer">
          <span class="data-oferta">📅 Publicat el 22/09/2026</span>
          <a href="../frontend/details/oferta-detail.php" class="button primary button-sm">Veure oferta →</a>
        </div>
      </article>

      <!-- OFERTA 3 -->
      <article class="card-oferta">
        <div class="card-content-simple">
          <h3 class="titol-oferta">Tècnic/a de Xarxes i Sistemes</h3>

          <div class="requisits-generals">
            <span class="tag tag-blue">CFGS ASIR</span>
            <span class="tag tag-default">Linux</span>
            <span class="tag tag-default">Cisco</span>
          </div>

          <p class="detall-oferta">
            Manteniment d'infraestructures de xarxa, servidors i resolució d'incidències tècniques de primer i segon nivell.
          </p>
        </div>

        <div class="card-footer">
          <span class="data-oferta">📅 Publicat el 20/09/2026</span>
          <a href="../frontend/details/oferta-detail.php" class="button primary button-sm">Veure oferta →</a>
        </div>
      </article>

      <!-- OFERTA 4 -->
      <article class="card-oferta">
        <div class="card-content-simple">
          <h3 class="titol-oferta">Dissenyador/a UI/UX</h3>

          <div class="requisits-generals">
            <span class="tag tag-blue">Grau en Disseny / Similar</span>
            <span class="tag tag-default">Figma</span>
          </div>

          <p class="detall-oferta">
            Creació d'interfícies web i d'aplicacions mòbils, disseny de sistemes de components i prototipat interactiu.
          </p>
        </div>

        <div class="card-footer">
          <span class="data-oferta">📅 Publicat el 18/09/2026</span>
          <a href="../frontend/details/oferta-detail.php" class="button primary button-sm">Veure oferta →</a>
        </div>
      </article>

      <!-- OFERTA 5 -->
      <article class="card-oferta">
        <div class="card-content-simple">
          <h3 class="titol-oferta">Programador/a Backend PHP</h3>

          <div class="requisits-generals">
            <span class="tag tag-blue">DAM / DAW</span>
            <span class="tag tag-default">Laravel</span>
            <span class="tag tag-default">MySQL</span>
          </div>

          <p class="detall-oferta">
            Desenvolupament d'APIs REST, integració amb bases de dades i manteniment d'aplicacions web empresarials.
          </p>
        </div>

        <div class="card-footer">
          <span class="data-oferta">📅 Publicat el 15/09/2026</span>
          <a href="../frontend/details/oferta-detail.php" class="button primary button-sm">Veure oferta →</a>
        </div>
      </article>

      <!-- OFERTA 6 -->
      <article class="card-oferta">
        <div class="card-content-simple">
          <h3 class="titol-oferta">Moço / Moça de Magatzem</h3>

          <div class="requisits-generals">
            <span class="tag tag-default">Carnet de carretilla</span>
            <span class="tag tag-default">ESO</span>
          </div>

          <p class="detall-oferta">
            Preparació de comandes, control d'estoc i gestió d'entrades i sortides de material al magatzem.
          </p>
        </div>

        <div class="card-footer">
          <span class="data-oferta">📅 Publicat el 12/09/2026</span>
          <a href="../frontend/details/oferta-detail.php" class="button primary button-sm">Veure oferta →</a>
        </div>
      </article>

    </div>
  </div>

</body>

</html>