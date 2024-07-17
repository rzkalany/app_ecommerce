<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bootstrap Dropdown</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<style>
                #welcomeMessage {
                font-size: 20px; /* Increase font size */
                font-weight: bold; /* Make text bold */
                color: white; /* Optional: change text color to white for better contrast on dark background */
                margin-top: 10px; /* Add margin to the top */
                margin-bottom: 10px; /* Add margin to the bottom */
                }

                .header-text {
                font-size: 20px; /* Default font size for larger screens */
                font-weight: bold; /* Make text bold */
                color: white; /* Text color */
                white-space: nowrap; /* Prevent text from wrapping */
                overflow: hidden; /* Hide overflow */
                display: inline-block;
                animation: scroll 13s linear infinite; /* Animation */
                }

                @keyframes scroll {
                0% { transform: translateX(100%); }
                100% { transform: translateX(-100%); }
                }

                /* Responsive adjustments */
                @media (max-width: 768px) {
                .header-text {
                        font-size: 24px; /* Smaller font size for tablets */
                }
                }

                @media (max-width: 576px) {
                .header-text {
                        font-size: 20px; /* Smaller font size for mobile phones */
                }
                }
                
        body {
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
        background-color: #f4f4f4;
        }

        .content {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #101010;
        max-width: 100%;
        width: 98%;
        margin: 10px;
        padding: 70px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .separator {
        border: 0.5px solid black;
        width: 30%;
        }

        .justified-text {
        text-align: justify;
        width: 100%;
        }

        .section-title {
        text-align: left;
        margin-bottom: 15px;
        }

        ul {
        text-align: left;
        list-style-type: disc;
        padding-left: 20px;
        }

        @media (max-width: 768px) {
        .content {
                max-width: 80%;
                padding: 50px;
        }
        }

        @media (max-width: 480px) {
        .content {
                max-width: 95%;
                padding: 30px;
        }
        }
</style>
</head>

<body>
        <!-- Header -->
                <div class="col-12 bg-dark py-3">
                        <p class="header-text" id="welcomeMessage">Welcome to our shop at YPA.CO BEAUTY, happy shopping....</p>
                </div>

        <div class="col-12 bg-white pt-4">
                <div class="col-lg-auto">
                        <div class="site-logo text-center text-lg-left">
                        <a href="<?= $base_url ?>">YPA.CO Beauty</a>
                </div>

                
                <div class="col-lg-auto ms-auto text-center text-lg-left header-item-holder">
                
                        <?php
                        if (isset($_SESSION['login'])) {
                                $id_user = $_SESSION['id'];
                                $cariKeranjang = mysqli_query($koneksi, "SELECT * FROM `tb_cart` WHERE `id_user` = '$id_user' AND `status` = 'cart'");
                                $fetchKeranjang = mysqli_fetch_assoc($cariKeranjang);
                                $getIDOrder = $fetchKeranjang['id_order'];
                                $showKeranjang = mysqli_query($koneksi, "SELECT * FROM `tb_detail_order`, `tb_produk` WHERE `id_order` = '$getIDOrder' AND `tb_detail_order`.`id_product`=`tb_produk`.`id_product` ORDER by `tb_detail_order`.`id_product` ASC");
                                $getRow = mysqli_num_rows($showKeranjang);
                        } else {
                                $getRow = '0';
                        }
                        ?>
                        <?php if (!isset($_SESSION['login'])) : ?>
                                <?php else : ?>
                                <a href="<?= $base_url ?>cart.php" class="header-item">
                                        <i class="fas fa-shopping-bag me-2"></i><span id="header-qty" class="me-3"><?= $getRow ?></span>
                                </a>
                                <?php endif; ?>
                                </div>
                        </div>  
                        <!-- Flex container for horizontal layout -->
                        <div class="d-flex justify-content-between mt-4 mb-4">

                        <!-- About Dropdown -->
                        <div class="dropdown">
                                <a class="btn btn-pink dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                About
                                </a>
                                <ul class="dropdown-menu p-3" aria-labelledby="dropdownMenuLink1">
                                <li><a class="dropdown-item" href="tel:+628978826548">Contact us</a></li>
                                <li><a class="dropdown-item" href="mailto:rizkamaelani0504@gmail.com">Gmail us</a></li>
                                <li><a class="dropdown-item" href="https://www.instagram.com/ypa.co_beauty/">Instagram</a></li>
                                <li><a class="dropdown-item" href="https://www.tiktok.com/@ypa.cobeauty">Tiktok</a></li>
                                </ul>
                        </div>
                        <!-- End About Dropdown -->

                        <!-- Account Dropdown -->
                        <div class="dropdown">
                                <a class="btn btn-pink dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
                                Account
                                </a>
                                <ul class="dropdown-menu p-3" aria-labelledby="dropdownMenuLink2">
                                <?php if (!isset($_SESSION['login'])) : ?>
                                <li><a class="dropdown-item" href="<?= $base_url ?>auth/register.php"><i class="fas fa-user-edit me-2"></i>Register</a></li>
                                <li><a class="dropdown-item" href="<?= $base_url ?>auth/login.php"><i class="fas fa-sign-in-alt me-2"></i>Login</a></li>
                                <?php else : ?>
                                <li><a class="dropdown-item" href="<?= $base_url ?>auth/ganti_password.php"><i class="fas fa-key me-2"></i>Ganti Password</a></li>
                                <li><a class="dropdown-item" href="<?= $base_url ?>auth/logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                                <?php endif; ?>
                                </ul>
                        </div>
                        <!-- End Account Dropdown -->
                        </div>

                        <div class="content">
                        <hr class="separator">
                        <h2 class="title">Mengenal Produk Kami</h2>
                        <hr class="separator">
                        <div class="justified-text">
                        <h3 class="section-title">Nikmati Keindahan Perawatan Alami</h3>
                        <p>Di YPA.CO BEAUTY, kami percaya pada kekuatan alam untuk merawat kulit Anda dan meningkatkan kilau alami Anda. Produk perawatan tubuh kami dibuat dengan cermat menggunakan bahan-bahan berkualitas, memastikan sentuhan lembut namun efektif pada kulit Anda.</p>
                        </div>
                        <div class="justified-text">
                        <h3 class="section-title">Manjakan diri Anda dengan rangkaian Bodycare kami:</h3>
                        <ul>
                                <li>Body Lotion mengandung SPF 30+++ yang membantu menjaga kulit dari paparan sinar matahari yang buruk, moisturizing, brightening, niacinamide, alpha arbutin, aloe vera, dan honey, melembapkan kulit, tidak lengket, dan menjadikan kulit sehat, cerah, dan lembut.</li>
                                <li>Body scrub mengandung honey, collagen, hydrogenated coconut oil, dan citric acid, yang membantu melembapkan kulit, mencerahkan, dan membersihkan kotoran yang menempel pada kulit, menjadikan kulit cerah maksimal dan permanen.</li>
                        </ul>
                        </div>
                </div>

                        <!-- Nav -->
                        <div class="row">
                                <nav class="navbar navbar-expand-lg navbar-light bg-white col-12">
                                <button class="navbar-toggler d-lg-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                                        <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="mainNav">
                                        <ul class="navbar-nav mx-auto mt-3 mt-lg-0">
                                        <li class="nav-item active">
                                                <a class="nav-link" href="<?= $base_url ?>">- Home -<span class="sr-only">(current)</span></a>
                                        </li>
                                        <?php if (!isset($_SESSION['login'])) : ?>
                                                <?php else : ?>
                                                <li class="nav-item">
                                                <a class="nav-link" href="<?= $base_url ?>history.php">- History Pesanan - </a>
                                                </li>
                                                <?php endif; ?>
                                        </ul>
                                </nav>
                                </div>
                        </div>
                        <!-- Header -->
                        
                </header>
        </div>
</script>
                <!-- Include Bootstrap JS and dependencies -->
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                <!-- JavaScript for typing effect -->
                <script>
                document.addEventListener('DOMContentLoaded', (event) => {
                        const message = "Welcome to our shop at YPA.CO BEAUTY, happy shopping....";
                        let index = 0;
                        const speed = 100; // Adjust typing speed here (in milliseconds)
                        
                        function typeWriter() {
                        if (index < message.length) {
                                document.getElementById("welcomeMessage").innerHTML += message.charAt(index);
                                index++;
                                setTimeout(typeWriter, speed);
                        }
                        }
                        
                        typeWriter();
                });
                

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>


        