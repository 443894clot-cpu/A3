
<!doctype html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>ex02</title>
</head>
<body>
    <h1> Qüestionari </h1>

<?php
    /*
        Fes una pregunta tipus test amb 4 radio
        (una de correcta) i digues si la resposta
        triada és correcta, incorrecta, o si no
        s'ha triat cap.
    */
?>

<form method="post">
    <p>Quin llenguatge s'executa al servidor?</p>

    <input type="radio" name="resposta" value="a"> HTML <br>
    <input type="radio" name="resposta" value="b"> CSS <br>
    <input type="radio" name="resposta" value="c"> PHP <br>
    <input type="radio" name="resposta" value="d"> JavaScript <br><br>

    <input type="submit" value="Comprovar resposta">
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!isset($_POST["resposta"])) {
            echo "<p>No has triat cap resposta.</p>";

        } elseif ($_POST["resposta"] == "c") {
            echo "<p>Resposta correcta!</p>";

        } else {
            echo "<p>Resposta incorrecta!</p>";
        }
    }
?>

    <h2> Codi font </h2>
<?php
    show_source("ej2.php");
?>

</body>
</html>
