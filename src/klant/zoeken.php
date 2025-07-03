<?php
require_once 'klant.php'; // Zorg dat dit de juiste namespace gebruikt of pas aan
use Bas\classes\Klant;

$klant = new Klant();
$resultaten = [];

if (isset($_GET['zoek'])) {
    $zoekterm = $_GET['zoek'];
    $resultaten = $klantId($zoekterm);
}
?>

<!DOCTYPE html>
<html>
<head><title>Zoeken op klantnaam</title></head>
<body>
<h1>Zoeken op klantnaam</h1>

<form method="get" action="">
    <input type="text" name="zoek" placeholder="Voer klantnaam in" value="<?= htmlspecialchars($_GET['zoek'] ?? '') ?>">
    <button type="submit">Zoeken</button>
</form>

<?php if (count($resultaten) > 0): ?>
    <table border="1">
        <tr>
            <th>Klant ID</th><th>Naam</th><th>Adres</th><th>Postcode</th><th>Telefoon</th>
        </tr>
        <?php foreach($resultaten as $rij): ?>
            <tr>
                <td><?= htmlspecialchars($rij['klant_id']) ?></td>
                <td><?= htmlspecialchars($rij['naam']) ?></td>
                <td><?= htmlspecialchars($rij['adres']) ?></td>
                <td><?= htmlspecialchars($rij['postcode']) ?></td>
                <td><?= htmlspecialchars($rij['telefoon']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php elseif (isset($_GET['zoek'])): ?>
    <p>Geen klanten gevonden.</p>
<?php endif; ?>

</body>
</html>
