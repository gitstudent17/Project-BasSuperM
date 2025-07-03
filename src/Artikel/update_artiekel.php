<?php
require '../../vendor/autoload.php';
use Bas\classes\Artikel;

$artikel = new Artikel();
if (isset($_GET['artikel_id'])) {
    $row = $artikel->getArtikel($_GET['artikel_id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artikel->updateArtikel($_POST);
    header("Location: read_artikelen.php");
    exit;
}
?>
<h1>Artikel bewerken</h1>
<form method="post">
<input type="hidden" name="artikel_id" value="<?= $row['artikel_id'] ?>">
Naam: <input type="text" name="naam" value="<?= $row['naam'] ?>"><br>
Prijs: <input type="text" name="prijs" value="<?= $row['prijs'] ?>"><br>
Categorie: <input type="text" name="categorie" value="<?= $row['categorie'] ?>"><br>
<input type="submit" value="Opslaan wijzigingen">
</form>
