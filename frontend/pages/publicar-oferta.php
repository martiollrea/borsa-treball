<!DOCTYPE html>
<html>

<head>
    <title>Publicar oferta</title>
    <link rel="stylesheet" href="../../styles/style.css">
</head>

<body>

    <div class="form-container">
        <div class="form-header">
            <h2>Publicar oferta</h2>
            <p>Emplena el formulari per publicar una oferta de treball a la borsa.</p>
        </div>

        <form class="custom-form">
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