
<?php
function mostrarContingut(string $ruta): void
{
    $elements = scandir($ruta);

    if ($elements === false) {
        return;
    }

    natcasesort($elements);

    echo '<ul>';

    foreach ($elements as $element) {
        if ($element === '.' || $element === '..' || str_starts_with($element, '.')) {
            continue;
        }

        if ($ruta === __DIR__ && $element === 'index.php') {
            continue;
        }

        $rutaCompleta = $ruta . DIRECTORY_SEPARATOR . $element;
        $rutaRelativa = substr($rutaCompleta, strlen(__DIR__) + 1);
        $url = implode('/', array_map('rawurlencode', explode(DIRECTORY_SEPARATOR, $rutaRelativa)));

        $nom = htmlspecialchars($element, ENT_QUOTES, 'UTF-8');

        if (is_dir($rutaCompleta)) {
            echo '<li class="carpeta">';
            echo '📁 <strong>' . $nom . '</strong>';

            mostrarContingut($rutaCompleta);

            echo '</li>';
        } elseif (is_file($rutaCompleta) && preg_match('/\.(php|html?)$/i', $element)) {
            echo '<li class="fitxer">';
            echo '📄 <a href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '">' . $nom . '</a>';
            echo '</li>';
        }
    }

    echo '</ul>';
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pràctica 3 - Introducció al PHP</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #333;
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
        }

        h1 {
            color: #2456a6;
        }

        .subtitol {
            color: #666;
            margin-bottom: 30px;
        }

        .contenidor {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        ul {
            list-style: none;
            padding-left: 20px;
        }

        li {
            margin: 10px 0;
        }

        li.carpeta {
            padding: 8px;
            background: #f4f7fc;
            border-radius: 6px;
        }

        li.fitxer {
            padding: 4px 0;
        }

        a {
            color: #2456a6;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        footer {
            margin-top: 30px;
            text-align: center;
            color: #888;
            font-size: 13px;
        }
    </style>
</head>

<body>

    <h1>Pràctica 3</h1>
    <p class="subtitol">Exercicis d'introducció al PHP</p>

    <div class="contenidor">
        <h2>📚 Índex d'exercicis</h2>

        <?php mostrarContingut(__DIR__); ?>
    </div>

    <footer>
        Pràctica 3 · Desenvolupament Web
    </footer>

</body>
</html>
