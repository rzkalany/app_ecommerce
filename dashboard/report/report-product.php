<?php
require_once '../../config/koneksi.php';
require_once '../../assets/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
ob_start();

// Show Data
$query = "SELECT * FROM `tb_produk`";
$result = mysqli_query($koneksi, $query);
$no = 1;

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

function hari_ini()
{
    $hari = date("D");

    switch ($hari) {
        case 'Sun':
            $hari_ini = "Minggu";
            break;

        case 'Mon':
            $hari_ini = "Senin";
            break;

        case 'Tue':
            $hari_ini = "Selasa";
            break;

        case 'Wed':
            $hari_ini = "Rabu";
            break;

        case 'Thu':
            $hari_ini = "Kamis";
            break;

        case 'Fri':
            $hari_ini = "Jumat";
            break;

        case 'Sat':
            $hari_ini = "Sabtu";
            break;

        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }

    return $hari_ini;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Report E-Commerce</title>
</head>

<body>
    <h2 align="center">Laporan Data Produk</h2>
    <table border="1" style="border-collapse: collapse; width: 100%;" cellspacing="2">
        <thead>
            <tr>
                <th style="font-size: 12px; padding: 10px;">No</th>
                <th style="font-size: 12px; padding: 10px;">Nama Produk</th>
                <th style="font-size: 12px; padding: 10px;">Harga</th>
                <th style="font-size: 12px; padding: 10px;">Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $data) : ?>
                <tr>
                    <td style="font-size: 12px; padding: 10px;"><?= $no++ ?></td>
                    <td style="font-size: 12px; padding: 10px;"><?= $data['nama_product'] ?></td>
                    <td style="font-size: 12px; padding: 10px;"><?= $data['harga'] ?></td>
                    <td style="font-size: 12px; padding: 10px;"><?= $data['deskripsi'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div style="position: absolute; bottom: 100px;width: 100%; margin-right: 100px; text-align: right;">
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
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output('report-product.pdf', 'D');
?>