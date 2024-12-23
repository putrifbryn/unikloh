<?php
require "config/koneksi.php";

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    $datas = mysqli_query($conn, "SELECT * FROM artikel WHERE id = '$id'");
    $komens = mysqli_query($conn, "SELECT * FROM komen_artikel WHERE id_artikel = '$id'");
} else {
    header("Location: post.php");
    exit();
}

?>

<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>UNIKLOH | Detail Post</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <!-- FONT -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
      <!-- CSS -->
      <link rel="stylesheet" href="styles/navbar.css">
      <link rel="stylesheet" href="styles/home.css">
      <link rel="stylesheet" href="styles/tables.css">
      <link rel="stylesheet" href="styles/artikel.css">
   </head>
   <body>
      <!-- NAV -->
      <nav class="navbar navbar-expand-lg" style="background-color: #fff; position: fixed; top: 0; width: 100%; z-index: 9999;">
        <div class="container-fluid" style="justify-content: space-between;">
           <a class="navbar-brand" href="../index.php">
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
                    <a class="nav-link active" style="color: #E84242;" href="blog.php">BLOG</a>
                 </li>
                 <li class="nav-item mx-3">
                    <a class="nav-link" href="about.php">TENTANG KAMI</a>
                 </li>
                 <li class="nav-item mx-3">
                    <span class="nav-link" href="">|</span>
                 </li>
                 <li class="nav-item mx-3 dropdown">
                  <a class="nav-link dropdown-toggle me-5" href="login.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
     <div class="container-fluid container" style="width: 80%; margin-top: 80px;">
        <section class="artikel">
            <?php
                if ($datas && mysqli_num_rows($datas) > 0) { 
                    while ($data = mysqli_fetch_assoc($datas)) {
            ?>
                <h2 class="header-artikel"><?= $data['judul']; ?></h2>
                <p style="text-align: center; margin: 0; margin-top: .5rem;"><?= $data['tanggal']; ?> • <?= $data['penulis']; ?></p>
                <img class="gambar-artikel" src="img/<?= $data['gambar']; ?>" alt="<?= $data['judul']; ?>">
                <p><?= nl2br($data['isi']); ?></p>
            <?php 
                    }
                } else {
                    echo "<p>Artikel tidak ditemukan.</p>";
                }
            ?>
        </section>

        <!-- KOMENTAR SECTION -->
        <section class="komen">
        <h5 class="komen-header">KOMENTAR</h5>
        <div class="mb-3">

        <?php
            if ($komens && mysqli_num_rows($komens) > 0) {
                while ($komen = mysqli_fetch_assoc($komens)) {
                    $username = $komen['username'];
                    $result = mysqli_query($conn, "SELECT role FROM akun WHERE username = '$username'");
                    
                    if ($result && mysqli_num_rows($result) === 1) {
                        $row = mysqli_fetch_assoc($result);
                        $role = $row['role'];
        ?>
            <div class="komen-sect" style="box-sizing: border-box; padding: .5rem 0;">
                <b>
                    <?php if ($role == "Admin") { ?>
                        <span style="background-color: #E84242; color: #fff; font-size: .8em; box-sizing: border-box; padding: .2rem .5rem; margin-right: .5rem; border-radius: 3px;">Admin</span>
                    <?php } ?>
                    <?= $komen['username'] ?>
                </b>
                <p style="margin-top: 1rem;"><?= nl2br($komen['isi']); ?></p>
                <p style="font-size: .8em;"><?= $komen['tanggal']; ?></p>
            </div>
        <?php 
                    }
                }
            } else {
                echo "<p>Belum ada komentar.</p>";
            }
        ?>
        <h6 style="text-align: center;">Login untuk dapat memberikan komentar</h6>
        </section>
     </div>

     <footer>
            <p style="text-align: center;">© 2024 UNIKLOH. All Rights Reserved.</p>
     </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hc
