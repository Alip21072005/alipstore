<?php
session_start();
include "koneksi.php";

// Proteksi Halaman
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Kategori | Kedai Kito</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .navbar { box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .section { padding: 40px 0; }
        .card { border: none; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); }
        .table thead { background-color: #f8f9fa; border-bottom: 2px solid #dee2e6; }
        .btn-add { border-radius: 10px; padding: 10px 20px; font-weight: 600; transition: 0.3s; }
        .btn-add:hover { transform: translateY(-2px); box-shadow: 0 4px 15px rgba(13, 110, 253, 0.3); }
        .action-btns a { margin-right: 5px; text-decoration: none; }
        footer { background: #fff; border-top: 1px solid #eee; }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-3">
            <div class="container">
                <a class="navbar-brand fw-bold fs-4" href="dashboard.php"><i class="fas fa-store me-2"></i>Kedai gue</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link active fw-bold" href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>
                        <li class="nav-item ms-lg-3">
                            <a class="btn btn-outline-light btn-sm px-4" href="keluar.php" style="border-radius: 20px;">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="section">
        <div class="container">
            <div class="row mb-4 align-items-center">
                <div class="col-md-6">
                    <h3 class="fw-bold m-0"><i class="fas fa-tags text-primary me-2"></i>Kategori Produk</h3>
                </div>
                <div class="col-md-6 text-md-end">
                    <a class="btn btn-primary btn-add" href="tambah_kategori.php">
                        <i class="fas fa-plus me-2"></i>Tambah Kategori
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle m-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4 py-3" width="80px">No</th>
                                    <th class="py-3">Nama Kategori</th>
                                    <th class="py-3 text-center" width="200px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $kategori = dummy_query($conn, "SELECT * FROM kategori ORDER BY idkategori DESC");
                                if (dummy_num_rows($kategori) > 0) {
                                    while ($row = dummy_fetch_array($kategori)) {
                                ?>
                                    <tr>
                                        <td class="ps-4 fw-bold text-muted"><?php echo $no++ ?></td>
                                        <td class="fw-semibold text-dark"><?php echo $row['namakategori'] ?></td>
                                        <td class="text-center action-btns">
                                            <a href="edit_kategori.php?id=<?php echo $row['idkategori'] ?>" class="btn btn-sm btn-outline-warning rounded-pill px-3">
                                                <i class="fas fa-edit me-1"></i> Edit
                                            </a>
                                            <a href="proses_hapus.php?idk=<?php echo $row['idkategori'] ?>" class="btn btn-sm btn-outline-danger rounded-pill px-3" onclick="return confirm('Yakin ingin hapus data ini?')">
                                                <i class="fas fa-trash me-1"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="3" class="text-center py-5 text-muted italic">
                                            <i class="fas fa-folder-open fa-3x mb-3 d-block"></i>
                                            Belum ada data kategori.
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-4 mt-auto">
        <div class="container text-center text-muted">
            <small>Copyright &copy; 2025 - <b>Kedai gue Online</b>. All rights reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>