<?php
    require 'config/koneksi.php';

    $products = mysqli_query($conn, 'SELECT * FROM produk LIMIT 3');
    $articles = mysqli_query($conn, 'SELECT * FROM artikel');
?>

<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>UNIKLOH</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <!-- FONT -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
      <!-- CSS -->
      <link rel="stylesheet" href="styles/navbar.css">
      <link rel="stylesheet" href="styles/home.css">
   </head>
   <body>
      <!-- NAV -->
      <nav class="navbar navbar-expand-lg" style="background-color: #fff; position: fixed; top: 0; width: 100%; z-index: 9999;">
        <div class="container-fluid" style="justify-content: space-between;">
           <a class="navbar-brand" href="index.php">
           <img src="img/UNIKLOH.svg" alt="Logo" width="90" height="24" class="d-inline-block align-text-top ms-5">
           </a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: end;">
              <ul class="navbar-nav">
                 <li class="nav-item ms-3">
                    <a class="nav-link active" aria-current="page" style="color: #E84242;" href="index.php">HOME</a>
                 </li>
                 <li class="nav-item ms-3">
                    <a class="nav-link" href="produk.php">PRODUK</a>
                 </li>
                 <li class="nav-item ms-3">
                    <a class="nav-link" href="blog.php">BLOG</a>
                 </li>
                 <li class="nav-item mx-3">
                    <a class="nav-link" href="about.html">TENTANG KAMI</a>
                 </li>
                 <li class="nav-item mx-3">
                    <span class="nav-link" href="">|</span>
                 </li>

                 <li class="nav-item mx-3 dropdown">
                  <a class="nav-link dropdown-toggle me-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     LOGIN
                     </a>
                     <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="login.php">Login</a></li>
                     <li><a class="dropdown-item" href="signup.php">Create Account</a></li>
                     </ul>
               </li>
              </ul>
           </div>
        </div>
     </nav>

     <!-- CONTAINER -->
     <div class="container-fluid container">
        <!-- HERO SECTION START -->
        <section class="hero row">
            <div class="hero-side left-side col-8">
                <img class="comp" src="img/component1.svg" alt="">
                <img class="hero-img" src="img/hero1.svg" alt="" >
            </div>
            <div class="hero-side right-side col-4">
                <img class="hero-img" src="img/hero2.svg" alt="">
                <img class="comp" src="img/component1.svg" alt="">
            </div>
        </section>
        <!-- HERO SECTION END -->

        <!-- PRODUK SECTION START -->
        <section class="product main">
            <h5 class="header">PRODUK TERBARU</h5>
            <div class="content-list" style="flex-wrap: wrap;">
                <?php
                    foreach ($products as $product) {
                ?>
                <div class="card" style="width: 15rem;">
                    <img src="img/<?= $product['gambar'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"><b><?= $product['nama'] ?></b></p>
                        <p class="card-text" style="display: flex; justify-content: space-between; font-size: .8em;"><span><?= $product['harga'] ?></span> <span><?= $product['jenis'] ?></span></p>
                        <p class="card-text"></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>
        <!-- PRODUK SECTION END -->
        <section class="product main">
            <h5 class="header">ARTIKEL TERBARU</h5>
            <div class="content-list">
            <?php
                foreach ($articles as $article) {
            ?>
            <a href="post_detail.php?id=<?=$article['id'] ?>" style="text-decoration: none;">
                <div class="card" style="width: 18rem; height: fit-content;">
                  <img src="img/<?= $article['gambar'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"><?= $article['judul'] ?></p>
                        <p class="card-text" style="display: flex; justify-content: space-between; font-size: .8em;"><span><?= $article['penulis'] ?></span> <span><?= $article['tanggal'] ?></span></p>
                    </div>
                </div>
            </a>
            <?php } ?>
            </div>
        </section>
        <!-- ARTIKEL SECTION START -->

        <!-- TENTANG SECTION START -->
        <section class="product main">
            <h5 class="header">TENTANG KAMI</h5>
            <p style="text-align: center;">Kami menawarkan koleksi pakaian yang beragam dan trendi yang selalu diperbarui sesuai dengan tren terbaru. Dengan kualitas produk yang tinggi dan layanan pelanggan yang responsif, kami memastikan setiap pelanggan memiliki pengalaman berbelanja yang memuaskan.</p>
        </section>
        <!-- TENTANG SECTION END -->

     </div>

     <footer>
            <p style="text-align: center;">© 2024 UNIKLOH. All Rights Reserved.</p>
     </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   </body>
</html>