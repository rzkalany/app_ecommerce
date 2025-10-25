<?php
require_once '../../config/koneksi.php';
require_once '../../assets/vendor/autoload.php';

// Initialize mPDF
$mpdf = new \Mpdf\Mpdf();

// Start output buffering
ob_start();

// Show Data
$query = "SELECT * FROM `tb_cart`, `tb_detail_order`, `tb_produk` WHERE `tb_produk`.`id_product` = `tb_detail_order`.`id_product` AND `tb_cart`.`id_order` = `tb_detail_order`.`id_order` ORDER BY `tb_detail_order`.`id_detail` ASC;";
$result = mysqli_query($koneksi, $query);
$no = 1;

function tgl_indo($tanggal)
{
    $bulan = array(
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

function hari_ini()
{
    $hari = date("D");
    $hari_ini = [
        'Sun' => 'Minggu', 'Mon' => 'Senin', 'Tue' => 'Selasa', 'Wed' => 'Rabu',
        'Thu' => 'Kamis', 'Fri' => 'Jumat', 'Sat' => 'Sabtu'
    ];
    return $hari_ini[$hari] ?? 'Tidak di ketahui';
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Report E-Commerce</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <h2 align="center">Laporan Data Penjualan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No Resi</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Tanggal Order</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result): ?>
                <?php foreach ($result as $data): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['id_order'] ?></td>
                        <td><?= $data['nama_product'] ?></td>
                        <td><?= $data['qty'] ?></td>
                        <td><?= $data['harga'] ?></td>
                        <td><?= tgl_indo($data['tgl_order']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <div style="position: absolute; bottom: 100px; width: 100%; text-align: right;">
        Karawang, <?= hari_ini() . " " .  tgl_indo(date('Y-m-d')) ?>
        <div style="margin-right: 50px;">Mengetahui,</div>
        <div style="margin-top: 100px; margin-right: 50px;">YPA.CO BEAUTY</div>
    </div>
</body>

</html>

<?php
$html = ob_get_contents();
ob_end_clean();

$mpdf->WriteHTML("<img src='kop.png' width='100%'>");
$mpdf->WriteHTML($html);
$mpdf->Output('report-penjualan.pdf', 'D');
?>
