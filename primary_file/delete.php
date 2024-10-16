<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $db->prepare("DELETE FROM meals WHERE id = :id");
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        $db->exec("VACUUM");
        
        $db->exec("UPDATE SQLITE_SEQUENCE SET seq = 0 WHERE name = 'meals'");

        header("Location: view.php");
        exit;
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
