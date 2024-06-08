<?php
    require "../config/koneksi.php";
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: ../login.php");
        exit();
    }

    if (isset($_POST['submit'])) {
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $isi = $_POST['isi'];
        $tanggal = $_POST['tanggal'];

        // Handle file upload
        $photo = $_FILES['gambar']['name'];
        $source = $_FILES['gambar']['tmp_name'];
        $folder = '../img/' . $photo;

        if (move_uploaded_file($source, $folder)) {
            $sql = "INSERT INTO artikel (gambar, judul, penulis, isi, tanggal) VALUES ('$photo', '$judul', '$penulis', '$isi', '$tanggal')";

            if (mysqli_query($conn, $sql)) {
                echo "<script> alert('Artikel berhasil ditambahkan'); </script>";
                header("refresh:1; ../admin-page/post.php");
            } else {
                echo "<script> alert('Artikel gagal ditambahkan'); </script>";
            }
        } else {
            echo "<script> alert('Gagal mengupload gambar'); </script>";
        }
    }
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
    <nav class="navbar navbar-expand-lg" style="background-color: #fff; position: fixed; top: 0; width: 100%; z-index: 9999;">
        <div class="container-fluid" style="justify-content: space-between;">
           <a class="navbar-brand" href="../index.html">
           <img src="../img/UNIKLOH.svg" alt="Logo" width="90" height="24" class="d-inline-block align-text-top ms-5">
           </a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: end;">
              <ul class="navbar-nav">
                 <li class="nav-item mx-3">
                    <a class="nav-link" href="../admin-page/stok.php">ADMIN - STOK</a>
                 </li>
                 <li class="nav-item mx-3">
                    <span class="nav-link">|</span>
                 </li>
                 <li class="nav-item mx-3">
                    <a class="nav-link active" style="color: #E84242;" href="../admin-page/post.php">ADMIN - BLOG</a>
                 </li>
                 <li class="nav-item mx-3">
                    <span class="nav-link">|</span>
                 </li>

                 <li class="nav-item mx-3 dropdown">
                    <a class="nav-link dropdown-toggle me-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     <?php echo $_SESSION['username']; ?>
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
        <div class="col-6 mx-auto">
            <h5 style="padding: .5rem 0; border-bottom: 2px solid #4E4343; width: fit-content; font-weight: 700; margin-bottom: 2rem;">TAMBAH ARTIKEL</h5>
                <form id="gameForm" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id">
                    <div class="mb-3">
                        <div>
                            <img src="" style="width: 5rem" alt="" class="mb-3" style="widt: 5rem;">
                        </div>
                        <label for="gambar" class="form-label">Foto Produk</label>
                        <input type="file" accept=".jpg, .png" class="form-control" name="gambar" id="gambar">
                    </div>

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Artikel</label>
                        <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan judul artikel" required>
                    </div>

                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" class="form-control" name="penulis" id="penulis" placeholder="Masukkan penulis" value="<?php echo $_SESSION['username'] ?>" required readonly>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Masukkan tanggal upload" required>
                    </div>

                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi</label>
                        <textarea class="form-control" name="isi" id="isi" placeholder="Masukkan isi artikel" required></textarea>
                    </div>

                    <div class="row mb-5">
                        <div class="col-10"><a href="../admin-page/post.php" class="btn" style="border: 1px solid #893302; box-sizing: border-box; color: #893302;">Kembali</a></div>
                        <div class="col-2"><button type="submit" class="btn btn-warning" name="submit">SIMPAN</button></div>
                    </div>
                </form>
        </div>
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
