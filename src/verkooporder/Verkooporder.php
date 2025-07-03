<?php
// auteur: ishika
// functie: definitie class Verkooporder

namespace Bas\verkooporder;

use Bas\classes\Database;

class Verkooporder extends Database {
    private $table_name = "verkooporders";

    public function getVerkooporders(): array {
        $sql = "SELECT * FROM $this->table_name";
        $stmt = self::$conn->query($sql);
        return $stmt->fetchAll();
    }

    public function getVerkooporder(int $order_id): array|false {
        $sql = "SELECT * FROM $this->table_name WHERE order_id = :order_id";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute([':order_id' => $order_id]);
        return $stmt->fetch();
    }

    public function insertVerkooporder(array $data): bool {
        $sql = "INSERT INTO $this->table_name (klantnaam, datum, product, aantal)
                VALUES (:klantnaam, :datum, :product, :aantal)";
        $stmt = self::$conn->prepare($sql);
        return $stmt->execute([
            ':klantnaam' => $data['klantnaam'],
            ':datum' => $data['datum'],
            ':product' => $data['product'],
            ':aantal' => $data['aantal']
        ]);
    }

    public function updateVerkooporder(array $data): bool {
        $sql = "UPDATE $this->table_name SET
                klantnaam = :klantnaam,
                datum = :datum,
                product = :product,
                aantal = :aantal
                WHERE order_id = :order_id";
        $stmt = self::$conn->prepare($sql);
        return $stmt->execute([
            ':klantnaam' => $data['klantnaam'],
            ':datum' => $data['datum'],
            ':product' => $data['product'],
            ':aantal' => $data['aantal'],
            ':order_id' => $data['order_id']
        ]);
    }

    public function deleteVerkooporder(int $order_id): bool {
        $sql = "DELETE FROM $this->table_name WHERE order_id = :order_id";
        $stmt = self::$conn->prepare($sql);
        return $stmt->execute([':order_id' => $order_id]);
    }
}
?>
