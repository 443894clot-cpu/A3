
<!doctype html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>ex01</title>
</head>
<body>
    <h1> Ingredients extra </h1>

<?php
    /*
        Fes un formulari amb almenys 4 checkbox d'ingredients
        extra (1 € cadascun) sobre una base de 8 €.
        En enviar-lo, mostra la llista d'ingredients triats
        i el preu total.
    */
?>

<form method="post">
    <input type="checkbox" name="ingredients[]" value="Formatge"> Formatge <br>
    <input type="checkbox" name="ingredients[]" value="Pernil"> Pernil <br>
    <input type="checkbox" name="ingredients[]" value="Ceba"> Ceba <br>
    <input type="checkbox" name="ingredients[]" value="Olives"> Olives <br><br>

    <input type="submit" value="Calcular preu">
</form>

<?php
    $preu = 8;

    if (isset($_POST["ingredients"])) {

        echo "<h2> Ingredients triats </h2>";

        foreach ($_POST["ingredients"] as $ingredient) {
            echo htmlspecialchars($ingredient) . "<br>\n";
            $preu++;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<p>Preu total: " . $preu . " €</p>";
    }
?>

    <h2> Codi font </h2>
<?php
    show_source("ej1.php");
?>

</body>
</html>
