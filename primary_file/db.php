<?php
try {
    $db = new PDO('sqlite:db_makan.sqlite');

    $db->exec("CREATE TABLE IF NOT EXISTS meals (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        calories INTEGER NOT NULL,
        date DATE NOT NULL
    )");
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}