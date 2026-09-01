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
    <title>Kategori Koleksi | Toko Boneka Oktifia</title>
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
        background-color: #fff5f7;
        /* Background Pink Muda */
    }

    main {
        flex: 1 0 auto;
    }

    .navbar {
        background-color: #ff69b4 !important;
        box-shadow: 0 2px 10px rgba(255, 105, 180, 0.2);
    }

    /* Table Styling */
    .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 5px 20px rgba(255, 105, 180, 0.1);
        overflow: hidden;
    }

    .table thead {
        background-color: #fff0f5;
    }

    .table th {
        border-top: none;
        color: #ff1493;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 1px;
        padding: 1.2rem;
    }

    .badge-pink {
        background-color: #fff0f5;
        color: #ff1493;
        border: 1px solid #ffc0cb;
        font-weight: 500;
    }

    .btn-add {
        background-color: #ff69b4;
        border: none;
        color: white;
        transition: 0.3s;
    }

    .btn-add:hover {
        background-color: #ff1493;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 20, 147, 0.3);
    }

    .btn-action {
        transition: all 0.3s;
        border-radius: 10px;
    }

    .btn-action:hover {
        transform: scale(1.15);
    }

    .btn-outline-pink {
        color: #ff69b4;
        border-color: #ff69b4;
    }

    .btn-outline-pink:hover {
        background-color: #ff69b4;
        color: white;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#"><i class="bi bi-heart-fill me-2"></i>Oktifia Doll</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link active" href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-light btn-sm text-danger ms-lg-2 px-3 fw-bold" href="keluar.php"
                                onclick="return confirm('Apakah Oktifia yakin ingin keluar?')">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-0" style="color: #ff1493;">Kategori Koleksi</h3>
                <p class="text-muted">Kelola kategori boneka di tokomu, Oktifia.</p>
            </div>
            <a class="btn btn-add px-4 py-2 rounded-pill shadow-sm fw-bold" href="tambah_kategori.php">
                <i class="bi bi-plus-circle-fill me-2"></i>Tambah Kategori
            </a>
        </div>

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0" style="vertical-align: middle;">
                        <thead>
                            <tr>
                                <th class="ps-4" width="100px text-center">No</th>
                                <th>Nama Kategori Koleksi</th>
                                <th class="text-center" width="200px">Aksi</th>
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
                                <td>
                                    <span class="badge badge-pink px-4 py-2 rounded-pill">
                                        <i class="bi bi-tag-fill me-1"></i> <?php echo $row['namakategori'] ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="edit_kategori.php?id=<?php echo $row['idkategori'] ?>"
                                        class="btn btn-sm btn-outline-pink btn-action me-2" title="Edit Data">
                                        <i class="bi bi-pencil-heart"></i>
                                    </a>
                                    <a href="proses_hapus.php?idk=<?php echo $row['idkategori'] ?>"
                                        class="btn btn-sm btn-outline-danger btn-action"
                                        onclick="return confirm('Apakah Oktifia yakin ingin menghapus kategori ini?')"
                                        title="Hapus Data">
                                        <i class="bi bi-trash3"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php }
                            } else { ?>
                            <tr>
                                <td colspan="3" class="text-center py-5 text-muted">
                                    <i class="bi bi-heartbreak fs-1 d-block mb-2" style="color: #ffc0cb;"></i>
                                    Belum ada kategori koleksi boneka.
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white border-top py-4 mt-auto shadow-sm">
        <div class="container text-center">
            <small class="text-muted">Copyright &copy; 2025 - <strong>Toko Boneka Oktifia</strong>. All rights
                reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>