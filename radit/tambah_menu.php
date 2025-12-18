<!DOCTYPE html>
<html>
<head>
<title>Tambah Menu</title>
</head>
<body style="font-family:Segoe UI;background:#f4f4f4">

<form action="proses_tambah_menu.php" method="POST" enctype="multipart/form-data"
      style="max-width:400px;margin:50px auto;background:#fff;padding:25px;border-radius:15px">

<h3>Tambah Menu</h3>

<select name="kategori" required style="width:100%;padding:10px">
    <option value="">-- Pilih Kategori --</option>
    <option>Coffee</option>
    <option>Makanan Berat</option>
    <option>Cemilan</option>
</select><br><br>

<input type="text" name="nama" placeholder="Nama Menu" required style="width:100%;padding:10px"><br><br>
<input type="number" name="harga" placeholder="Harga" required style="width:100%;padding:10px"><br><br>
<input type="file" name="foto" required><br><br>

<button type="submit" style="background:#f1c40f;padding:10px 20px;border:none;border-radius:20px">
Simpan
</button>

</form>
</body>
</html>
