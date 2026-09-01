<?php
function dummy_connect($host = '', $user = '', $pass = '', $db = '')
{
    return (object)['host' => $host, 'status' => 'dummy_connected'];
}

function dummy_query(object $conn, string $sql)
{
    $sqlLower = strtolower(trim($sql));

    if (strpos($sqlLower, 'insert') === 0 || strpos($sqlLower, 'update') === 0 || strpos($sqlLower, 'delete') === 0) {
        return true;
    }

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

    if (strpos($sqlLower, 'kategori') !== false && strpos($sqlLower, 'join') === false) {
        return new DummyResult([
            ['idkategori' => 5, 'namakategori' => 'Makanan'],
            ['idkategori' => 6, 'namakategori' => 'Minuman']
        ]);
    }

    if (strpos($sqlLower, 'produk') !== false && strpos($sqlLower, 'select') !== false) {
        // Dynamic data based on folder that has images
        $image_folder = __DIR__;
        if (isset($_SERVER['REQUEST_URI'])) {
            $uri = $_SERVER['REQUEST_URI'];
            if (preg_match('#/([^/]+)/#', $uri, $matches)) {
                $folder = $matches[1];
                $image_folder = __DIR__ . '/' . $folder . '/image';
            }
        }

        // Check if folder has images and get the first available
        $available_images = [];
        if (is_dir($image_folder)) {
            $files = scandir($image_folder);
            foreach ($files as $file) {
                if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $file)) {
                    $available_images[] = $file;
                }
            }
        }

        // Fallback to alipmaulana images if no images found
        if (empty($available_images)) {
            $alipmaulana_images = __DIR__ . '/alipmaulana/image';
            if (is_dir($alipmaulana_images)) {
                $files = scandir($alipmaulana_images);
                foreach ($files as $file) {
                    if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $file)) {
                        $available_images[] = $file;
                    }
                }
            }
        }

        // Build product data based on available images
        $products = [];
        $image_count = count($available_images);
        if ($image_count >= 1) {
            $products[] = [
                'idproduk' => 1,
                'namaproduk' => 'Nasi Goreng',
                'harga' => 10000,
                'deskripsi' => 'Nasi goreng lezat',
                'gambar' => $available_images[0],
                'namakategori' => 'Makanan',
                'status' => 1,
                'idkategori' => 5
            ];
        }
        if ($image_count >= 2) {
            $products[] = [
                'idproduk' => 2,
                'namaproduk' => 'Es Teh',
                'harga' => 5000,
                'deskripsi' => 'Esteh segar',
                'gambar' => $available_images[1],
                'namakategori' => 'Minuman',
                'status' => 1,
                'idkategori' => 6
            ];
        }

        return new DummyResult($products);
    }

    if (strpos($sqlLower, 'admin') !== false || strpos($sqlLower, 'user') !== false) {
        return new DummyResult([
            ['id' => 1, 'username' => 'admin', 'password' => 'admin', 'nama_lengkap' => 'Administrator Dummy']
        ]);
    }

    return new DummyResult([]);
}

class DummyResult
{
    public function __construct(
        public array $data,
        public int $index = 0,
        public int $num_rows = 0
    ) {
        $this->num_rows = count($data);
    }
}

function dummy_fetch_array(DummyResult $res)
{
    if (!$res instanceof DummyResult) return null;
    if ($res->index < $res->num_rows) {
        $row = $res->data[$res->index++];
        $mixedRow = [];
        $i = 0;
        foreach ($row as $key => $val) {
            $mixedRow[$i++] = $val;
            $mixedRow[$key] = $val;
        }
        return $mixedRow;
    }
    return null;
}

function dummy_fetch_assoc(DummyResult $res)
{
    if (!$res instanceof DummyResult) return null;
    if ($res->index < $res->num_rows) {
        return $res->data[$res->index++];
    }
    return null;
}

function dummy_fetch_object(DummyResult $res)
{
    $assoc = dummy_fetch_assoc($res);
    return $assoc ? (object)$assoc : null;
}

function dummy_num_rows(DummyResult $res): int
{
    if (!$res instanceof DummyResult) return 0;
    return $res->num_rows;
}

function dummy_real_escape_string(object $conn, string $str): string
{
    return addslashes($str);
}
function dummy_escape_string(object $conn, string $str): string
{
    return dummy_real_escape_string($conn, $str);
}

function dummy_error(?object $conn = null): string
{
    return "";
}
function dummy_insert_id(?object $conn = null): int
{
    return rand(10, 100);
}
function dummy_affected_rows(?object $conn = null): int
{
    return 1;
}
function dummy_close(?object $conn = null): bool
{
    return true;
}
function dummy_select_db(object $conn, string $dbname): bool
{
    return true;
}

function picsum_image(string $seed, int $w = 640, int $h = 480): string
{
    return "https://picsum.photos/seed/{$seed}/{$w}/{$h}";
}
