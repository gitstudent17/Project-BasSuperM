<?php 
// auteur: studentnaam
// functie: 

require_once 'klant.php';
use Bas\classes\Klant;

$klant = new Klant();
$klantId = $_GET['klantId'] ?? null;

if (!$klantId) {
    die("Geen klant geselecteerd.");
}

$conn = $klant->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['bevestig']) && $_POST['bevestig'] === 'ja') {
        $sql = "DELETE FROM Klanten WHERE klant_id = :klant_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':klant_id' => $klantId]);
        echo "Klant verwijderd.<br><a href='zoeken.php'>Terug naar zoeken</a>";
        exit;
    } else {
        header("Location: zoeken.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Klant verwijderen</title></head>
<body>
<h1>Klant verwijderen</h1>

<p>Weet je zeker dat je deze klant wilt verwijderen?</p>

<form method="post" action="">
    <button type="submit" name="bevestig" value="ja">Ja, verwijderen</button>
    <button type="submit" name="bevestig" value="nee">Nee, annuleren</button>
</form>

</body>
</html>


