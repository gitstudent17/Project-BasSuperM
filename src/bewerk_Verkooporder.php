<?php
require_once __DIR__ . "/src/classes/Database.php";
require_once __DIR__ . "/src/verkooporder/Verkooporder.php";

use Bas\verkooporder\Verkooporder;

$db = new Verkooporder();

if (!isset($_GET['order_id'])) {
    die("Geen order geselecteerd.");
}
$order_id = (int)$_GET['order_id'];

$order = $db->getVerkooporder($order_id);
if (!$order) {
    die("Order niet gevonden.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'order_id' => $order_id,
        'klantnaam' => $_POST['klantnaam'],
        'datum' => $_POST['datum'],
        'product' => $_POST['product'],
        'aantal' => $_POST['aantal'],
    ];
    if ($db->updateVerkooporder($data)) {
        header("Location: verkooporders.php");
        exit;
    } else {
        echo "Fout bij bijwerken.";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Verkooporder bewerken</title></head>
<body>
    <h1>Order bewerken</h1>
    <form method="post">
        <label>Klantnaam: <input type="text" name="klantnaam" value="<?= htmlspecialchars($order['klantnaam']) ?>" required></label><br><br>
        <label>Datum: <input type="date" name="datum" value="<?= htmlspecialchars($order['datum']) ?>" required></label><br><br>
        <label>Product: <input type="text" name="product" value="<?= htmlspecialchars($order['product']) ?>" required></label><br><br>
        <label>Aantal: <input type="number" name="aantal" min="1" value="<?= htmlspecialchars($order['aantal']) ?>" required></label><br><br>
        <button type="submit">Bijwerken</button>
    </form>
    <a href="verkooporders.php">Terug naar overzicht</a>
</body>
</html>
