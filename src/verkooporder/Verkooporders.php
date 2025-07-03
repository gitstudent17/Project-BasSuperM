<?php
require_once __DIR__ . "/src/classes/Database.php";
require_once __DIR__ . "/src/verkooporder/Verkooporder.php";

use Bas\verkooporder\Verkooporder;

$db = new Verkooporder();
$orders = $db->getVerkooporders();
?>

<!DOCTYPE html>
<html>
<head><title>Verkooporders</title></head>
<body>
    <h1>Verkooporders</h1>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Order ID</th>
            <th>Klantnaam</th>
            <th>Datum</th>
            <th>Product</th>
            <th>Aantal</th>
        </tr>
        <?php foreach ($orders as $order): ?>
        <tr>
            <td><?= htmlspecialchars($order['order_id']) ?></td>
            <td><?= htmlspecialchars($order['klantnaam']) ?></td>
            <td><?= htmlspecialchars($order['datum']) ?></td>
            <td><?= htmlspecialchars($order['product']) ?></td>
            <td><?= htmlspecialchars($order['aantal']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
