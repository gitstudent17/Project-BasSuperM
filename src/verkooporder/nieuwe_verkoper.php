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
        echo "Order succesvol toegevoegd.";
    } else {
        echo "Er is iets misgegaan.";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Nieuwe Verkooporder</title></head>
<body>
    <h1>Nieuwe Verkooporder</h1>
    <form method="post" action="">
        <label>Klantnaam: <input type="text" name="klantnaam" required></label><br><br>
        <label>Datum: <input type="date" name="datum" required></label><br><br>
        <label>Product: <input type="text" name="product" required></label><br><br>
        <label>Aantal: <input type="number" name="aantal" min="1" required></label><br><br>
        <button type="submit">Order toevoegen</button>
    </form>
</body>
</html>
