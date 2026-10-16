
<!doctype html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>ex03</title>
</head>
<body>
    <h1> Selecció de ciutats </h1>

<?php
    /*
        Fes un select amb 3 ciutats i, en triar-ne
        una, mostra un missatge diferent per a
        cadascuna (per exemple, un consell de viatge).
    */
?>

<form method="post">
    <label for="ciutat">Tria una ciutat:</label>

    <select name="ciutat" id="ciutat">
        <option value="">Selecciona una ciutat</option>
        <option value="Barcelona">Barcelona</option>
        <option value="Paris">París</option>
        <option value="Roma">Roma</option>
    </select>

    <input type="submit" value="Enviar">
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST["ciutat"])) {

            switch ($_POST["ciutat"]) {
                case "Barcelona":
                    echo "<p>Visita la Sagrada Família!</p>";
                    break;

                case "Paris":
                    echo "<p>Visita la Torre Eiffel!</p>";
                    break;

                case "Roma":
                    echo "<p>Visita el Colosseu!</p>";
                    break;

                default:
                    echo "<p>No has seleccionat cap ciutat.</p>";
            }
        }
    }
?>

    <h2> Codi font </h2>
<?php
    show_source("ej3.php");
?>

</body>
</html>
