<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Tambah Makanan</title>
</head>
<body>
    <div class="container">
        <h1>Tambah Makanan</h1>
        <form action="" method="POST">
            <label for="name">Nama Makanan:</label>
            <input type="text" id="name" name="name" required autofocus>

            <label for="calories">Kalori:</label>
            <input type="number" id="calories" name="calories" required>

            <label for="date">Tanggal:</label>
            <input type="date" id="date" name="date" required>

            <input type="submit" value="Tambah Makanan">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include('db.php');

            $name = $_POST['name'];
            $calories = $_POST['calories'];
            $date = $_POST['date'];

            $stmt = $db->prepare("INSERT INTO meals (name, calories, date) VALUES (:name, :calories, :date)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':calories', $calories);
            $stmt->bindParam(':date', $date);
            if ($stmt->execute()) {
                header("Location: view.php");
                exit;
            } else {
                echo "<p>Gagal menambahkan makanan.</p>";
            }
        }
        ?>

        <a href="index.php" class="back-button">Kembali ke Beranda</a>
    </div>
</body>
</html>
