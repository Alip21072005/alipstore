<?php
// Mock mysqli_connect
function dummy_connect($host='', $user='', $pass='', $db='') {
    return (object)['host' => $host, 'status' => 'dummy_connected'];
}

// Mock mysqli_query
function dummy_query($conn, $sql) {
    $sqlLower = strtolower(trim($sql));
    
    // Ignore inserts, updates, deletes
    if (strpos($sqlLower, 'insert') === 0 || strpos($sqlLower, 'update') === 0 || strpos($sqlLower, 'delete') === 0) {
        return true;
    }
    
    // Data Statistik Toko (Root index.php)
    if (strpos($sqlLower, 'statistik_toko') !== false) {
        return new DummyResult([
            ['nama_toko' => 'nada', 'jumlah_kunjungan' => 1520],
            ['nama_toko' => 'alipmaulana', 'jumlah_kunjungan' => 1205],
            ['nama_toko' => 'sopiamarini', 'jumlah_kunjungan' => 950],
            ['nama_toko' => 'dementrius', 'jumlah_kunjungan' => 1100],
            ['nama_toko' => 'rafifaturiqbal', 'jumlah_kunjungan' => 1430],
            ['nama_toko' => 'berliana', 'jumlah_kunjungan' => 880],
            ['nama_toko' => 'yosia', 'jumlah_kunjungan' => 1340],
            ['nama_toko' => 'surya', 'jumlah_kunjungan' => 1700],
            ['nama_toko' => 'yunda', 'jumlah_kunjungan' => 2100],
            ['nama_toko' => 'radit', 'jumlah_kunjungan' => 740],
            ['nama_toko' => 'fina', 'jumlah_kunjungan' => 980],
            ['nama_toko' => 'rifat', 'jumlah_kunjungan' => 1120],
            ['nama_toko' => 'dellar', 'jumlah_kunjungan' => 1400],
            ['nama_toko' => 'marco', 'jumlah_kunjungan' => 1050],
            ['nama_toko' => 'alparani', 'jumlah_kunjungan' => 890]
        ]);
    }
    
    // Data Kategori
    if (strpos($sqlLower, 'kategori') !== false && strpos($sqlLower, 'join') === false) {
        return new DummyResult([
            ['idkategori' => 1, 'namakategori' => 'Makanan Utama'],
            ['idkategori' => 2, 'namakategori' => 'Minuman Segar'],
            ['idkategori' => 3, 'namakategori' => 'Camilan / Dessert'],
            ['idkategori' => 4, 'namakategori' => 'Pakaian / Aksesoris']
        ]);
    }
    
    // Data Produk - gambar berupa nama file karena template memakai src="image/<?= $row['gambar'] ?>"
    // File-file ini di-download oleh build.php ke folder image/ masing-masing mahasiswa
    if (strpos($sqlLower, 'produk') !== false && strpos($sqlLower, 'select') !== false) {
        return new DummyResult([
            [
                'idproduk' => 1, 'namaproduk' => 'Nasi Goreng Spesial', 'harga' => 25000,
                'deskripsi' => 'Nasi goreng dengan bumbu rahasia, suwiran ayam, dan topping telur mata sapi.',
                'gambar' => 'produk1.jpg', 'namakategori' => 'Makanan Utama', 'status' => 1, 'idkategori' => 1
            ],
            [
                'idproduk' => 2, 'namaproduk' => 'Es Teh Manis', 'harga' => 5000,
                'deskripsi' => 'Es teh manis segar pelepas dahaga.',
                'gambar' => 'produk2.jpg', 'namakategori' => 'Minuman Segar', 'status' => 1, 'idkategori' => 2
            ],
            [
                'idproduk' => 3, 'namaproduk' => 'Ayam Geprek Sambal Matah', 'harga' => 22000,
                'deskripsi' => 'Ayam goreng tepung digeprek dengan sambal matah khas pedas mantap.',
                'gambar' => 'produk3.jpg', 'namakategori' => 'Makanan Utama', 'status' => 1, 'idkategori' => 1
            ],
            [
                'idproduk' => 4, 'namaproduk' => 'Kopi Susu Gula Aren', 'harga' => 18000,
                'deskripsi' => 'Paduan espresso, susu segar, dan gula aren asli Indonesia.',
                'gambar' => 'produk4.jpg', 'namakategori' => 'Minuman Segar', 'status' => 1, 'idkategori' => 2
            ],
            [
                'idproduk' => 5, 'namaproduk' => 'Mie Goreng Seafood', 'harga' => 28000,
                'deskripsi' => 'Mie goreng dengan udang, cumi, dan bumbu rempah pilihan.',
                'gambar' => 'produk5.jpg', 'namakategori' => 'Makanan Utama', 'status' => 1, 'idkategori' => 1
            ],
            [
                'idproduk' => 6, 'namaproduk' => 'Jus Mangga Segar', 'harga' => 15000,
                'deskripsi' => 'Jus mangga asli tanpa pemanis buatan.',
                'gambar' => 'produk6.jpg', 'namakategori' => 'Minuman Segar', 'status' => 1, 'idkategori' => 2
            ],
            [
                'idproduk' => 7, 'namaproduk' => 'Pisang Bakar Coklat Keju', 'harga' => 12000,
                'deskripsi' => 'Pisang bakar manis dengan taburan coklat meses dan keju parut.',
                'gambar' => 'produk7.jpg', 'namakategori' => 'Camilan / Dessert', 'status' => 1, 'idkategori' => 3
            ],
            [
                'idproduk' => 8, 'namaproduk' => 'Kaos Polos Premium', 'harga' => 50000,
                'deskripsi' => 'Kaos polos bahan cotton combed 30s sangat nyaman dipakai.',
                'gambar' => 'produk8.jpg', 'namakategori' => 'Pakaian / Aksesoris', 'status' => 1, 'idkategori' => 4
            ]
        ]);
    }
    
    // Data Admin / Login
    if (strpos($sqlLower, 'admin') !== false || strpos($sqlLower, 'user') !== false) {
        return new DummyResult([
            ['id' => 1, 'username' => 'admin', 'password' => 'admin', 'nama_lengkap' => 'Administrator Dummy'] 
        ]);
    }
    
    // Default empty result for unhandled queries
    return new DummyResult([]);
}

class DummyResult {
    public $data;
    public $index = 0;
    public $num_rows;
    public function __construct($data) {
        $this->data = $data;
        $this->num_rows = count($data);
    }
}

// Mock fetch array (both numeric and associative)
function dummy_fetch_array($res) {
    if (!$res instanceof DummyResult) return null;
    if ($res->index < $res->num_rows) {
        $row = $res->data[$res->index++];
        $mixedRow = [];
        $i = 0;
        foreach($row as $key => $val) {
            $mixedRow[$i++] = $val;
            $mixedRow[$key] = $val;
        }
        return $mixedRow;
    }
    return null;
}

// Mock fetch assoc
function dummy_fetch_assoc($res) {
    if (!$res instanceof DummyResult) return null;
    if ($res->index < $res->num_rows) {
        return $res->data[$res->index++];
    }
    return null;
}

// Mock fetch object
function dummy_fetch_object($res) {
    $assoc = dummy_fetch_assoc($res);
    return $assoc ? (object)$assoc : null;
}

// Mock num rows
function dummy_num_rows($res) {
    if (!$res instanceof DummyResult) return 0;
    return $res->num_rows;
}

// Security / formatting functions
function dummy_real_escape_string($conn, $str) {
    return addslashes($str);
}
function dummy_escape_string($conn, $str) {
    return dummy_real_escape_string($conn, $str);
}

// Helper functions that might be called
function dummy_error($conn=null) { return ""; }
function dummy_insert_id($conn=null) { return rand(10, 100); }
function dummy_affected_rows($conn=null) { return 1; }
function dummy_close($conn=null) { return true; }
function dummy_select_db($conn, $dbname) { return true; }

// Helper: gambar menggunakan picsum.photos (tidak membutuhkan API key)
function picsum_image(string $seed, int $w = 640, int $h = 480): string {
    return "https://picsum.photos/seed/{$seed}/{$w}/{$h}";
}
?>
