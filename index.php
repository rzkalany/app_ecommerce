<?php
require_once 'config/koneksi.php';
session_start();
$resultProduct = mysqli_query($koneksi, "SELECT * FROM `tb_produk` INNER JOIN `tb_kategori` USING(`id_kategori`)");
?>

<!doctype php>
<php lang="en">

    <head>
        <?php
        require_once 'partikel/head.php'
        ?>
<link rel="stylesheet" href="assets/css/style.css">

    </head>

    <body>
        <div class="container-fluid">

            <div class="row min-vh-50">
                <?php
                require_once 'partikel/navbar.php';
                ?>
                
                        <!-- Produk -->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 py-3">
                                    <div class="row">
                                        <div class="col-12 text-center text-uppercase">
                                            <h2>Products</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php
                                        foreach ($resultProduct as $data) :
                                        ?>
                                            <!-- Product -->
                                            <div class="col-lg-3 col-sm-6 my-3">
                                                <div class="col-12 bg-white text-center h-100 product-item">
                                                    <div class="row h-100">
                                                        <div class="col-12 p-0 mb-3">
                                                            <a href="<?= $base_url ?>product.php?id=<?= $data['id_product'] ?>">
                                                                <img src="<?= $base_url ?>assets/images/<?= $data['foto_product'] ?>" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <a href="product.php" class="product-name"><?= $data['nama_product'] ?></a>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <span class="product-price">
                                                                Rp<?= number_format($data['harga'], 0, ",", ".") ?>
                                                            </span>
                                                        </div>
                                                        <div class="col-12 mb-3 align-self-end">
                                                            <a href="<?= $base_url ?>product.php?id=<?= $data['id_product'] ?>" class="btn btn-outline-dark">Lihat Produk</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        endforeach;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Featured Products -->
                        
            <section class="content">
                <div class="content-box">
                    <hr class="separator" />
                    <h2 class="title">Mengenal Produk Kami</h2>
                    <hr class="separator" />

                    <div class="justified-text">
                        <h3 class="section-title">Nikmati Keindahan Perawatan Alami</h3>
                        <p>
                            Di <strong>YPA.CO BEAUTY</strong>, kami percaya pada kekuatan alam untuk
                            merawat kulit Anda dan meningkatkan kilau alami Anda. Produk perawatan
                            tubuh kami dibuat dengan cermat menggunakan bahan-bahan berkualitas,
                            memastikan sentuhan lembut namun efektif pada kulit Anda.
                        </p>
                    </div>

                <div class="justified-text">
                <h3 class="section-title">Manjakan diri Anda dengan rangkaian Bodycare kami:</h3>
                <ul>
                    <li>
                        <strong>Body Lotion</strong> mengandung SPF 30+++ yang membantu menjaga
                        kulit dari paparan sinar matahari yang buruk, moisturizing, brightening,
                        niacinamide, alpha arbutin, aloe vera, dan honey, melembapkan kulit,
                        tidak lengket, dan menjadikan kulit sehat, cerah, dan lembut.
                    </li>
                    <li>
                        <strong>Body Scrub</strong> mengandung honey, collagen, hydrogenated
                        coconut oil, dan citric acid, yang membantu melembapkan kulit,
                        mencerahkan, dan membersihkan kotoran yang menempel pada kulit,
                        menjadikan kulit cerah maksimal dan permanen.
                    </li>
                    </ul>
                    </div>
                </div>
            </section>
                        <?php
                        require_once 'partikel/main_footer.php'
                        ?>
                    </main>

                    <!-- Main Content -->
                </div>
                
                <?php
                require_once 'partikel/footer.php';
                ?>
            </div>

        </div>

        <?php
        require_once 'partikel/javascript.php';
        ?>
    </body>

</php>

