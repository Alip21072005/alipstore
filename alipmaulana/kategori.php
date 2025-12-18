<?php
    include "koneksi.php";
    session_start();

    if ($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kategori | Kedai Kito Online</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        flex-direction: column;
        font-family: 'Poppins', sans-serif;
        background-color: #f4f7f6;
    }

    main {
        flex: 1 0 auto;
    }

    .navbar {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    /* Table Styling */
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .table thead {
        background-color: #f8f9fa;
    }

    .table th {
        border-top: none;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 1px;
    }

    .btn-action {
        transition: all 0.3s;
        border-radius: 8px;
    }

    .btn-action:hover {
        transform: scale(1.1);
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#"><i class="bi bi-shop me-2"></i>Kedai Kito</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-danger btn-sm text-white ms-lg-2 px-3"
                                href="keluar.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-0">Kategori Produk</h3>
                <p class="text-muted">Kelola jenis kategori makanan dan minuman Anda</p>
            </div>
            <a class="btn btn-primary px-4 py-2 shadow-sm rounded-pill" href="tambah_kategori.php">
                <i class="bi bi-plus-lg me-2"></i>Tambah Kategori
            </a>
        </div>

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0" style="vertical-align: middle;">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4" width="100px">No</th>
                                <th>Nama Kategori</th>
                                <th class="text-center" width="200px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY idkategori DESC");
                            if (mysqli_num_rows($kategori) > 0) {
                                while ($row = mysqli_fetch_array($kategori)) {
                            ?>
                            <tr>
                                <td class="ps-4 fw-bold text-muted"><?php echo $no++ ?></td>
                                <td><span
                                        class="badge bg-info bg-opacity-10 text-info px-3 py-2 rounded-pill"><?php echo $row['namakategori'] ?></span>
                                </td>
                                <td class="text-center">
                                    <a href="edit_kategori.php?id=<?php echo $row['idkategori'] ?>"
                                        class="btn btn-sm btn-outline-primary btn-action me-2" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="proses_hapus.php?idk=<?php echo $row['idkategori'] ?>"
                                        class="btn btn-sm btn-outline-danger btn-action"
                                        onclick="return confirm('Yakin ingin menghapus kategori ini?')" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php }
                            } else { ?>
                            <tr>
                                <td colspan="3" class="text-center py-5 text-muted">
                                    <i class="bi bi-folder-x fs-1 d-block mb-2"></i>
                                    Tidak ada data kategori ditemukan.
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white border-top py-4 shadow-sm">
        <div class="container text-center">
            <small class="text-muted">Copyright &copy; 2025 - <strong>Kedai Kito Online</strong>. All rights
                reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>