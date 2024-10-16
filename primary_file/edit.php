<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Edit Makanan</title>
</head>
<body>
    <div class="container">
        <h1>Edit Makanan</h1>

        <?php
        include('db.php');

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $stmt = $db->prepare("SELECT * FROM meals WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $meal = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($meal) {
                $date = new DateTime($meal['date']);
                $formattedDate = $date->format('Y-m-d');
                ?>
                <form action="update.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $meal['id']; ?>">

                    <label for="name">Nama Makanan:</label>
                    <input type="text" id="name" name="name" value="<?php echo $meal['name']; ?>" required autofocus>

                    <label for="calories">Kalori:</label>
                    <input type="number" id="calories" name="calories" value="<?php echo $meal['calories']; ?>" required>

                    <label for="date">Tanggal:</label>
                    <input type="date" id="date" name="date" value="<?php echo $formattedDate; ?>" required>

                    <input type="submit" value="Update Makanan">
                </form>
                <?php
            } else {
                echo "<p>Makanan tidak ditemukan.</p>";
            }
        } else {
            echo "<p>ID tidak ditemukan.</p>";
        }
        ?>

        <a href="view.php" class="back-button">Kembali ke Daftar Makanan</a>
    </div>
</body>
</html>
