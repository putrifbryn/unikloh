<?php
   require 'config/koneksi.php';
?>

<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>UNIKLOH | Blog</title>
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
                    <a class="nav-link" aria-current="page" href="index.php">HOME</a>
                 </li>
                 <li class="nav-item ms-3">
                    <a class="nav-link" href="produk.php">PRODUK</a>
                 </li>
                 <li class="nav-item ms-3">
                    <a class="nav-link" href="blog.php">BLOG</a>
                 </li>
                 <li class="nav-item mx-3">
                    <a class="nav-link active" style="color: #E84242;" href="about.php">TENTANG KAMI</a>
                 </li>
                 <li class="nav-item mx-3">
                    <span class="nav-link">|</span>
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
        <!-- PRODUK SECTION START -->
        <section class="product main">
            <h5 class="header">TENTANG KAMI</h5>
            <div class="sect" style="margin: 1rem 0;">
               <p><strong>Sejarah Kami</strong></p>
               <p>My Fashion Store didirikan pada tahun 2020 oleh sekelompok penggemar fashion yang bersemangat untuk membawa tren terbaru ke Indonesia. Dengan pengalaman lebih dari satu dekade di industri fashion, kami berkomitmen untuk memberikan produk berkualitas tinggi dengan harga terjangkau.</p>
            </div>
            <div class="sect" style="margin: 1rem 0;">
               <p><strong>Visi Kami</strong></p>
               <p>Menjadi toko baju terkemuka yang dikenal karena inovasi, kualitas, dan pelayanan pelanggan yang luar biasa.</p>
         
               <p><strong>Misi Kami</strong></p>
               <ul>
                  <li>Menyediakan produk fashion terbaru dan terbaik.</li>
                  <li>Memberikan pengalaman berbelanja yang mudah dan menyenangkan.</li>
                  <li>Mendukung fashion berkelanjutan dengan praktik yang ramah lingkungan.</li>
               </ul>
            </div>
            <div class="sect" style="margin: 1rem 0;">
               <p><strong>Nilai-Nilai Kami</strong></p>
               <ul>
                     <li>Integritas: Kami selalu mengutamakan kejujuran dan transparansi dalam setiap aspek bisnis kami.</li>
                     <li>Inovasi: Kami selalu mencari cara baru untuk meningkatkan produk dan layanan kami.</li>
                     <li>Pelayanan Pelanggan: Kepuasan pelanggan adalah prioritas utama kami.</li>
                     <li>Keberlanjutan: Kami berkomitmen untuk mengurangi dampak lingkungan dan mendukung fashion berkelanjutan.</li>
               </ul>
            </div>
            <div class="sect" style="margin: 1rem 0;">
               <p><strong>Keunggulan Kami</strong></p>
               <p>Kami menawarkan koleksi pakaian yang beragam dan trendi yang selalu diperbarui sesuai dengan tren terbaru. Dengan kualitas produk yang tinggi dan layanan pelanggan yang responsif, kami memastikan setiap pelanggan memiliki pengalaman berbelanja yang memuaskan.</p>
            </div>
        </section>
        <!-- PRODUK SECTION END -->
     </div>

     <footer>
            <p style="text-align: center;">© 2024 UNIKLOH. All Rights Reserved.</p>
     </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   </body>
</html>