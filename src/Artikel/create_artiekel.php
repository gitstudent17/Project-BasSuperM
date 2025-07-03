<?php
require '../../vendor/autoload.php';
use Bas\classes\Artikel;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artikel = new Artikel();
    $artikel->insertArtikel($_POST);
    header("Location: read_artikelen.php");
    exit;
}
?>
<h1>Nieuw artikel toevoegen</h1>
<form method="post">
Naam: <input type="text" name="naam"><br>
Prijs: <input type="text" name="prijs"><br>
Categorie: <input type="text" name="categorie"><br>
<input type="submit" value="Opslaan">
</form>
