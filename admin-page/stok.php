<?php
   require "../config/koneksi.php";
   session_start();
   
   if (!isset($_SESSION['username'])) {
      header("Location: ../login.php");
      exit();
  }

   $datas = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC");
   $komens = mysqli_query($conn, "SELECT * FROM komen_artikel");
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>UNIKLOH | Admin Stok</title>
      <link
         href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
         rel="stylesheet"
         integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
         crossorigin="anonymous"
         />
      <!-- FONT -->
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link
         href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap"
         rel="stylesheet"
         />
      <!-- CSS -->
      <link rel="stylesheet" href="../styles/navbar.css" />
      <link rel="stylesheet" href="../styles/home.css" />
      <link rel="stylesheet" href="../styles/tables.css">
   </head>
   <body>
      <!-- NAV -->
      <nav
         class="navbar navbar-expand-lg"
         style="
         background-color: #fff;
         position: fixed;
         top: 0;
         width: 100%;
         z-index: 9999;
         "
         >
         <div class="container-fluid" style="justify-content: space-between">
            <a class="navbar-brand" href="stok.php">
            <img
               src="../img/UNIKLOH.svg"
               alt="Logo"
               width="90"
               height="24"
               class="d-inline-block align-text-top ms-5"
               />
            </a>
            <button
               class="navbar-toggler"
               type="button"
               data-bs-toggle="collapse"
               data-bs-target="#navbarNav"
               aria-controls="navbarNav"
               aria-expanded="false"
               aria-label="Toggle navigation"
               >
            <span class="navbar-toggler-icon"></span>
            </button>
            <div
               class="collapse navbar-collapse"
               id="navbarNav"
               style="justify-content: end"
               >
               <ul class="navbar-nav">
                  <li class="nav-item mx-3">
                     <a class="nav-link active" style="color: #e84242" href="stok.php"
                        >ADMIN - STOK</a
                        >
                  </li>
                  <li class="nav-item mx-3">
                     <span class="nav-link">|</span>
                  </li>
                  <li class="nav-item mx-3">
                     <a class="nav-link" href="post.php">ADMIN - BLOG</a>
                  </li>
                  <li class="nav-item mx-3">
                     <span class="nav-link">|</span>
                  </li>
                  <li class="nav-item mx-3 dropdown">
                     <a
                        class="nav-link dropdown-toggle me-5"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        >
                     <?php echo $_SESSION['username'] ?>
                     </a>
                     <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../change_password.php">Setting</a></li>
                        <li>
                           <a class="dropdown-item" href="../config/logout.php"
                              >Logout</a
                              >
                        </li>
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
            <div class="row">
               <div class="col-10">
                  <h5 class="header">LIST PRODUK</h5>
               </div>
               <div class="col-2"><a href="../config/create_stok.php" class="btn mb-4" style="display: flex; justify-content: center; color: #fff; background-color: #E84242;">Tambah</a></div>
            </div>
            <div class="content-list">
               <table class="table" style="margin-bottom: 3rem">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jenis</th>
                        <th colspan="2" style="text-align: center"></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $no = 0;
                        foreach ($datas as $data) {
                        $no++;
                        ?>
                     <tr>
                        <td><?= $no ?></td>
                        <td>
                           <?php
                              if($data['gambar'] == '') {
                           ?>                           
                              <img src="../img/no-image.png" style="width: 5rem" alt="" class="mb-3">
                           <?php                           
                              } else { 
                           ?>
                              <img src="../img/<?= $data['gambar'] ?>" style="width: 5rem" alt="" class="mb-3">
                           <?php
                              }
                           ?>
                        </td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['harga'] ?></td>
                        <td><?= $data['jenis'] ?></td>
                        <td>
                           <a href="../config/update_stok.php?id=<?=$data['id_produk'] ?>" class="btn" style="border: 1px solid #893302; box-sizing: border-box; color: #893302;">Edit</a>
                        </td>
                        <td><a href="../config/delete_stok.php?id=<?= $data['id_produk'] ?>" class="btn" style="background-color: #893302; color: #fff;">Hapus</a></td>
                     </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </section>
         <!-- PRODUK SECTION END -->
      </div>
      <footer>
         <p style="text-align: center">© 2024 UNIKLOH. All Rights Reserved.</p>
      </footer>
      <script
         src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
         crossorigin="anonymous"
         ></script>
   </body>
</html>