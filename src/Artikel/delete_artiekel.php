<?php
require '../../vendor/autoload.php';
use Bas\classes\Artikel;

if (isset($_GET["artikel_id"])) {
    $artikel = new Artikel();
    $artikel->deleteArtikel($_GET["artikel_id"]);
    header("Location: read_artikelen.php");
    exit;
}
?>
