<?php
require_once __DIR__ . "/src/classes/Database.php";
require_once __DIR__ . "/src/verkooporder/Verkooporder.php";

use Bas\verkooporder\Verkooporder;

$db = new Verkooporder();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'klantnaam' => $_POST['klantnaam'],
        'datum' => $_POST['datum'],
        'product' => $_POST['product'],
        'aantal' => $_POST['aantal'],
    ];
    if ($db->insertVerkooporder($data)) {
        header("Location: verkooporders.php");
        exit;
    } else {
        echo "Fout bij toevoegen.";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Nieuwe verkooporder</title></head>
<body>
    <h1>Nieuwe verkooporder toevoegen</h1>
    <form method="post">
        <label>Klantnaam: <input type="text" name="klantnaam" required></label><br><br>
        <label>Datum: <input type="date" name="datum" required></label><br><br>
        <label>Product: <input type="text" name="product" required></label><br><br>
        <label>Aantal: <input type="number" name="aantal" min="1" required></label><br><br>
        <button type="submit">Opslaan</button>
    </form>
    <a href="verkooporders.php">Terug naar overzicht</a>
</body>
</html>
