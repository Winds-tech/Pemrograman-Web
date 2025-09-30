<?php
require 'data.php';

$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
$results = [];

if ($keyword !== '') {
    $results = search_biodata($keyword);
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Form Pencarian Biodata</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 100px;
            text-align: center;
            background: linear-gradient(to bottom, white);
            color: black; 
        }
        form {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid black;
            border-radius: 10px;
            width: 400px;
            background-color: rgba(71, 69, 69, 0.1);
            color: black;
            margin-left: auto;
            margin-right: auto;
        }
        table {
            border-collapse: collapse;
            margin: 20px auto;
            border: 1px solid black;
            background-color: rgba(168, 163, 163, 0.1);
            color: black;
            width: 50%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        a {
            color: black;
            text-decoration: none;
        }
    </style>
</head>
<body>

<h2>Form Pencarian Biodata</h2>

<form method="GET" action="">
    <label>Kata Kunci Pencarian:</label>
    <input type="text" name="keyword" value="<?= htmlspecialchars($keyword) ?>" required>
    <button type="submit">Cari</button>
</form>

<p><a href="inputPOST.php">Tambah biodata baru</a></p>

<?php if ($keyword !== ''): ?>
    <h3>Hasil pencarian untuk: <i><?= htmlspecialchars($keyword) ?></i></h3>

    <?php if (count($results) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Program Studi</th>
                    <th>Jenis Kelamin</th>
                    <th>Hobi</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['nim']) ?></td>
                        <td><?= htmlspecialchars($row['prodi']) ?></td>
                        <td><?= htmlspecialchars($row['jk']) ?></td>
                        <td><?= htmlspecialchars(implode(", ", $row['hobi'])) ?></td>
                        <td><?= htmlspecialchars($row['alamat']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Data tidak ditemukan.</p>
    <?php endif; ?>
<?php endif; ?>

</body>
</html>