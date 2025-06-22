<?php
    // auteur: ishika
    // functie: update class Klant

require_once 'klant.php';
use Bas\classes\Klant;

$klant = new Klant();

$klantId = $_GET['klantId'] ?? null;
$melding = '';

if (!$klantId) {
    die("Geen klant geselecteerd.");
}

// Klantgegevens ophalen
$conn = $klant->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update uitvoeren
    $sql = "UPDATE Klanten SET naam = :naam, adres = :adres, postcode = :postcode, telefoon = :telefoon WHERE klant_id = :klant_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':naam' => $_POST['naam'],
        ':adres' => $_POST['adres'],
        ':postcode' => $_POST['postcode'],
        ':telefoon' => $_POST['telefoon'],
        ':klant_id' => $klantId
    ]);
    $melding = "Klantgegevens zijn bijgewerkt.";
}

// Klant opnieuw ophalen voor formulier
$sql = "SELECT * FROM Klanten WHERE klant_id = :klant_id";
$stmt = $conn->prepare($sql);
$stmt->execute([':klant_id' => $klantId]);
$klantData = $stmt->fetch();

if (!$klantData) {
    die("Klant niet gevonden.");
}
?>

<!DOCTYPE html>
<html>
<head><title>Klantgegevens bijwerken</title></head>
<body>
<h1>Klantgegevens bijwerken</h1>

<?php if ($melding): ?>
    <p style="color: green;"><?= $melding ?></p>
<?php endif; ?>

<form method="post" action="">
    <label>Naam: <input type="text" name="naam" value="<?= htmlspecialchars($klantData['naam']) ?>" required></label><br>
    <label>Adres: <input type="text" name="adres" value="<?= htmlspecialchars($klantData['adres']) ?>" required></label><br>
    <label>Postcode: <input type="text" name="postcode" value="<?= htmlspecialchars($klantData['postcode']) ?>" required></label><br>
    <label>Telefoon: <input type="text" name="telefoon" value="<?= htmlspecialchars($klantData['telefoon']) ?>" required></label><br>
    <button type="submit">Opslaan</button>
</form>

<p><a href="zoeken.php">Terug naar zoeken</a></p>

</body>
</html>