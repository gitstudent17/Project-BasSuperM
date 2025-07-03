<?php
require '../../vendor/autoload.php';
use Bas\classes\Artikel;

$artikel = new Artikel();
$lijst = $artikel->getArtikelen();
?>
<h1>Artikelen</h1>
<table>
<tr><th>Naam</th><th>Prijs</th><th>Categorie</th><th></th><th></th></tr>
<?php foreach($lijst as $row): ?>
<tr>
<td><?= htmlspecialchars($row['naam']) ?></td>
<td><?= htmlspecialchars($row['prijs']) ?></td>
<td><?= htmlspecialchars($row['categorie']) ?></td>
<td><a href="update_artikel.php?artikel_id=<?= $row['artikel_id'] ?>">Bewerk</a></td>
<td><a href="delete_artikel.php?artikel_id=<?= $row['artikel_id'] ?>">Verwijder</a></td>
</tr>
<?php endforeach; ?>
</table>
<a href="create_artikel.php">Nieuw artikel toevoegen</a>
