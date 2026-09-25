<!DOCTYPE html>
<html>

<head>
    <title>Publicar oferta</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="../publicar-oferta/publicar-oferta.css">
</head>

<body>

    <h1>Pagina per omplir el formulari</h1>
    <p>Aqui van els inputs</p>

    <form meathod="post">
        <label
            for="title"
            class="form-label">
            Títol:
        </label><br />
        <input type="text" id="title" name="title" /><br />

        <label
            for="description"
            class="form-label">
            Descripció:
        </label><br />
        <input type="text" id="description" name="description" /><br />

        <label
            for="sector"
            class="form-label">
            Sector:
        </label><br />
        <input type="text" id="sector" name="sector" /><br />

        <label
            for="data"
            class="form-label">
            Data:
        </label><br />
        <input type="text" id="data" name="data" /><br />

        <br />
        <input type="submit" value="Enviar" />
    </form>

</body>

</html>