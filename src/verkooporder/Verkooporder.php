<?php
namespace Bas\verkooporder;

use Bas\classes\Database;

class Verkooporder extends Database {
    private $table_name = "verkooporders";

    public function getVerkooporders(): array {
        $sql = "SELECT * FROM $this->table_name ORDER BY datum DESC";
        $stmt = self::$conn->query($sql);
        return $stmt->fetchAll();
    }

    public function insertVerkooporder(array $data): bool {
        $sql = "INSERT INTO $this->table_name (klantnaam, datum, product, aantal) 
                VALUES (:klantnaam, :datum, :product, :aantal)";
        $stmt = self::$conn->prepare($sql);
        return $stmt->execute([
            ':klantnaam' => $data['klantnaam'],
            ':datum' => $data['datum'],
            ':product' => $data['product'],
            ':aantal' => $data['aantal'],
        ]);
    }
}
