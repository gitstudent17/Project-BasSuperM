<?php
require_once __DIR__ . "/src/classes/Database.php";
require_once __DIR__ . "/src/verkooporder/Verkooporder.php";

use Bas\verkooporder\Verkooporder;

$db = new Verkooporder();

if (isset($_GET['delete'])) {
    $order_id = (int)$_GET['delete'];
    $db->deleteVerkooporder($order_id);
    header("Location: verkooporders.php");
    exit;
}

$orders = $db->getVerkooporders();
?>

<!DOCTYPE html>
<html>
<head><title>Verkooporders</title></head>
<body>
    <h1>Verkooporders</h1>
    <a href="nieuw_verkooporder.php">Nieuwe verkooporder toevoegen</a><br><br>
    <table border="1" cellpadding="5">
        <tr>
            <th>Order ID</th>
            <th>Klantnaam</th>
            <th>Datum</th>
            <th>Product</th>
            <th>Aantal</th>
            <th>Acties</th>
        </tr>
        <?php foreach ($orders as $order): ?>
        <tr>
            <td><?= htmlspecialchars($order['order_id']) ?></td>
            <td><?= htmlspecialchars($order['klantnaam']) ?></td>
            <td><?= htmlspecialchars($order['datum']) ?></td>
            <td><?= htmlspecialchars($order['product']) ?></td>
            <td><?= htmlspecialchars($order['aantal']) ?></td>
            <td>
                <a href="bewerk_verkooporder.php?order_id=<?= $order['order_id'] ?>">Bewerken</a> |
                <a href="?delete=<?= $order['order_id'] ?>" onclick="return confirm('Weet je het zeker?');">Verwijderen</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>