<?php
// auteur: ishika Lal
// functie: insert class Klant

// Autoloader classes via composer
require '../../vendor/autoload.php';
use Bas\classes\Klant;

if (isset($_POST["insert"]) && $_POST["insert"] === "Toevoegen") {
    // Instantieer de Klant class
    $klant = new Klant();

    // Maak een array met keys die overeenkomen met databasekolommen
    $data = [
        'naam'     => $_POST['naam'] ?? '',
        'adres'    => $_POST['adres'] ?? '',
        'postcode' => $_POST['postcode'] ?? '',
        'telefoon' => $_POST['telefoon'] ?? '',
    ];

    // Voer insert uit
    $result = $klant->insertKlant($data);

    if ($result) {
        // Redirect naar leespagina na succesvolle insert
        header("Location: read.php");
        exit;
    } else {
        echo "<p>Fout bij toevoegen klant!</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CRUD Klant - Toevoegen</title>
    <link rel="stylesheet" href="../style.css" />
</head>
<body>

<h1>CRUD Klant</h1>
<h2>Toevoegen</h2>

<form method="post">
    <label for="naam">Naam:</label>
    <input type="text" id="naam" name="naam" placeholder="Naam" required />
    <br>

    <label for="adres">Adres:</label>
    <input type="text" id="adres" name="adres" placeholder="Adres" required />
    <br>

    <label for="postcode">Postcode:</label>
    <input type="text" id="postcode" name="postcode" placeholder="Postcode" required />
    <br>

    <label for="telefoon">Telefoon:</label>
    <input type="text" id="telefoon" name="telefoon" placeholder="Telefoon" required />
    <br><br>

    <input type="submit" name="insert" value="Toevoegen" />
</form>

<br>
<a href="read.php">Terug</a>

</body>
</html>
