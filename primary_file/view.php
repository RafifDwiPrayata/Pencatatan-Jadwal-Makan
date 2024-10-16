<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Lihat Makanan</title>
    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus makanan ini?');
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Daftar Makanan</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama Makanan</th>
                <th>Kalori</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>

            <?php
            include('db.php');

            $stmt = $db->query("SELECT * FROM meals");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $date = new DateTime($row['date']);
                $formattedDate = $date->format('d-m-Y');

                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['calories']}</td>
                        <td>{$formattedDate}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}' class='edit-button'>Edit</a>
                            <a href='delete.php?id={$row['id']}' class='delete-button' onclick='return confirmDelete();'>Hapus</a>
                        </td>
                      </tr>";
            }
            ?>
        </table>
        <a href="index.php" class="back-button">Kembali ke Beranda</a>
    </div>
</body>
</html>
