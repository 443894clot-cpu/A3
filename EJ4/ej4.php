
<!doctype html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>ex04</title>
</head>
<body>
    <h1> Formulari de comentaris </h1>

<?php
    /*
        Fes un formulari amb un nom i un textarea
        de comentari. En enviar-lo, mostra'l tal
        com l'usuari l'ha escrit, respectant els
        salts de línia.
    */
?>

<form method="post">
    <label for="nom">Nom:</label>
    <input type="text" name="nom" id="nom"><br><br>

    <label for="comentari">Comentari:</label><br>
    <textarea name="comentari" id="comentari" rows="5" cols="40"></textarea><br><br>

    <input type="submit" value="Enviar">
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST["nom"]) && isset($_POST["comentari"])) {

            echo "<h2> Comentari enviat </h2>";
            echo "<p>Nom: " . htmlspecialchars($_POST["nom"]) . "</p>";
            echo "<p>Comentari:<br>";
            //sirve para convertir los saltos de linea en etiquetas HTML
            echo nl2br(htmlspecialchars($_POST["comentari"]));
            echo "</p>";
        }
    }
?>

    <h2> Codi font </h2>
<?php
    show_source("ej4.php");
?>

</body>
</html>
