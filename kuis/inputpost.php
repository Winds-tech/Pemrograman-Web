<?php
require 'data.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $nim = htmlspecialchars($_POST['nim']);
    $prodi = htmlspecialchars($_POST['prodi']);
    $jk = htmlspecialchars($_POST['jk']);
    $hobi = isset($_POST['hobi']) ? array_map('htmlspecialchars', $_POST['hobi']) : [];
    $alamat = htmlspecialchars($_POST['alamat']);

    $new_biodata = [
        'nama' => $nama,
        'nim' => $nim,
        'prodi' => $prodi,
        'jk' => $jk,
        'hobi' => $hobi,
        'alamat' => $alamat
    ];

    add_biodata($new_biodata);

    $message = "Data berhasil disimpan!";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Form Biodata Mahasiswa Teknik</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 50px;
            text-align: center;
            background: linear-gradient(to bottom, white);
            color: black; 
        }
        form {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid black;
            border-radius: 10px;
            width: 300px;
            background-color: rgba(95, 93, 93, 0.1);
            color: black;
            margin-left: auto;
            margin-right: auto;
            text-align: left;
        }
        label {
            display: block;
            margin-top: 15px;
        }
        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 6px;
            margin-top: 4px;
            border-radius: 5px;
            border: none;
            background-color: rgba(164, 163, 163, 0.2);
            color: black;
        }
        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 6px;
            cursor: pointer;
        }
        .hobi-group, .jk-group {
            margin-top: 5px;
        }
        button {
            margin-top: 15px;
            padding: 10px 15px;
            border: none;
            border-radius: 7px;
            background-color: #000000ff;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background-color: #2e4438ff;
        }
        .message {
            width: 400px;
            margin: 0 auto 20px;
            padding: 10px;
            background-color: #0b130bff;
            border-radius: 8px;
            font-weight: bold;
            color: white;
        }
         {
            color: #0f1410ff;
            text-decoration: none;
            display: block;
            margin-top: 20px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2>Form Biodata Mahasiswa Teknik</h2>

<?php if ($message): ?>
    <div class="message"><?= $message ?></div>
<?php endif; ?>

<form method="POST" action="">
    <label for="nama">Nama Lengkap:</label>
    <input type="text" id="nama" name="nama" required>

    <label for="nim">NIM:</label>
    <input type="text" id="nim" name="nim" required>

    <label for="prodi">Program Studi:</label>
    <select id="prodi" name="prodi" required>
        <option value="">-- Pilih Program Studi --</option>
        <option value="Informatika">Informatika</option>
        <option value="Teknik Kimia">Teknik Kimia</option>
        <option value="Teknik Elektro">Teknik Elektro</option>
        <option value="Teknik Sipil">Teknik Sipil</option>
        <option value="Teknik Mesin">Teknik Mesin</option>
        <option value="Teknik Industri">Teknik Industri</option>
    </select>

    <label>Jenis Kelamin:</label>
    <div class="jk-group">
        <label><input type="radio" name="jk" value="Pria" required> Pria</label>
        <label><input type="radio" name="jk" value="Wanita" required> Wanita</label>
    </div>

    <label>Hobi:</label>
    <div class="hobi-group">
        <label><input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga</label>
        <label><input type="checkbox" name="hobi[]" value="Musik"> Musik</label>
        <label><input type="checkbox" name="hobi[]" value="Gaming"> Gaming</label>
    </div>

    <label for="alamat">Alamat:</label>
    <textarea id="alamat" name="alamat" rows="3" required></textarea>

    <button type="submit">Kirim</button>
</form>

<a href="get.php">Cari data biodata</a>

</body>
</html>