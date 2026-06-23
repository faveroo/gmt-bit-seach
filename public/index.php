<?php

require_once __DIR__ . '/TimeZoneFinder.php';

$finder = new TimeZoneFinder();

$cities = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gmt = (int) $_POST['gmt'];
    $cities = $finder->findCities($gmt);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Bit Masks GMT</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 700px;
            margin: 30px auto;
        }

        .result {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ccc;
        }

        li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

<h1>Bit Mask GMT Finder</h1>

<form method="POST">
    <label>
        GMT:
        <input
            type="number"
            name="gmt"
            min="-12"
            max="12"
            required
        >
    </label>

    <button type="submit">
        Encontrar Cidades
    </button>
</form>

<?php if (!empty($cities)): ?>
    <div class="result">
        <h3>Cidades encontradas</h3>

        <ul>
            <?php foreach ($cities as $city): ?>
                <li><?= htmlspecialchars($city) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

</body>
</html>