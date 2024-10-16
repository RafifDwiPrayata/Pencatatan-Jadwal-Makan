<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $calories = $_POST['calories'];
    $date = $_POST['date'];

    $stmt = $db->prepare("UPDATE meals SET name = :name, calories = :calories, date = :date WHERE id = :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':calories', $calories);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: view.php");
        exit;
    } else {
        echo "<p>Gagal memperbarui makanan.</p>";
    }
} else {
    echo "<p>ID tidak ditemukan.</p>";
}
?>
