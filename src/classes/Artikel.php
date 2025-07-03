<?php
// Auteur: jouw naam
// Functie: definitie class Artikel (CRUD functionaliteit voor artikelen)

namespace Bas\classes;

class Artikel extends Database {
    // Naam van de database tabel
    private $table_name = "artikelen"; // pas aan naar de echte tabelnaam in je database

    /**
     * Haal alle artikelen op uit de database
     * @return array Lijst van artikelen
     */
    public function getArtikelen(): array {
        $sql = "SELECT * FROM $this->table_name";
        $stmt = self::$conn->query($sql);
        return $stmt->fetchAll();
    }

    /**
     * Haal één artikel op op basis van artikel_id
     * @param int $artikel_id
     * @return array Gegevens van het artikel
     */
    public function getArtikel($artikel_id): array {
        $sql = "SELECT * FROM $this->table_name WHERE artikel_id = :artikel_id";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute([':artikel_id' => $artikel_id]);
        return $stmt->fetch();
    }

    /**
     * Voeg een nieuw artikel toe aan de database
     * @param array $data (bevat: naam, prijs, categorie)
     * @return bool true als gelukt, false als mislukt
     */
    public function insertArtikel($data): bool {
        $sql = "INSERT INTO $this->table_name (naam, prijs, categorie)
                VALUES (:naam, :prijs, :categorie)";
        $stmt = self::$conn->prepare($sql);
        return $stmt->execute([
            ':naam' => $data['naam'],
            ':prijs' => $data['prijs'],
            ':categorie' => $data['categorie']
        ]);
    }

    /**
     * Werk een bestaand artikel bij op basis van artikel_id
     * @param array $data (bevat: artikel_id, naam, prijs, categorie)
     * @return bool true als gelukt, false als mislukt
     */
    public function updateArtikel($data): bool {
        $sql = "UPDATE $this->table_name SET
                naam = :naam, prijs = :prijs, categorie = :categorie
                WHERE artikel_id = :artikel_id";
        $stmt = self::$conn->prepare($sql);
        return $stmt->execute([
            ':naam' => $data['naam'],
            ':prijs' => $data['prijs'],
            ':categorie' => $data['categorie'],
            ':artikel_id' => $data['artikel_id']
        ]);
    }

    /**
     * Verwijder een artikel op basis van artikel_id
     * @param int $artikel_id
     * @return bool true als gelukt, false als mislukt
     */
    public function deleteArtikel($artikel_id): bool {
        $sql = "DELETE FROM $this->table_name WHERE artikel_id = :artikel_id";
        $stmt = self::$conn->prepare($sql);
        return $stmt->execute([':artikel_id' => $artikel_id]);
    }
}
?>
