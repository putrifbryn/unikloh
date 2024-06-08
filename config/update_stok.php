<?php
require "../config/koneksi.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

$id = isset($_GET['id']) ? $_GET['id'] : null;
$x = null;

if ($id !== null) {
    $result = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id'"); 
    if ($result && mysqli_num_rows($result) > 0) {
        $x = mysqli_fetch_assoc($result);
    }
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nproduk = $_POST['nama'];
    $hproduk = $_POST['harga'];
    $jproduk = $_POST['jenis'];

    // Handle file upload
    $photo = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = '../img/' . $photo;

    if ($photo != "") {
        move_uploaded_file($source, $folder);
        $sql = "UPDATE produk SET gambar = '$photo', nama = '$nproduk', harga = '$hproduk', jenis = '$jproduk' WHERE id_produk = '$id'";
    } else {
        $sql = "UPDATE produk SET nama = '$nproduk', harga = '$hproduk', jenis = '$jproduk' WHERE id_produk = '$id'";
    }

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data Telah Berhasil diperbarui');</script>";
        header("refresh:1; ../admin-page/stok.php");
        exit();
    } else {
        echo "<script>alert('Data Gagal diperbarui');</script>";
        header("refresh:1; ../admin-page/stok.php");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>UNIKLOH | Admin Stok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="../styles/navbar.css" />
    <link rel="stylesheet" href="../styles/home.css" />
    <link rel="stylesheet" href="../styles/tables.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #fff; position: fixed; top: 0; width: 100%; z-index: 9999;">
        <div class="container-fluid" style="justify-content: space-between">
            <a class="navbar-brand" href="../index.html">
                <img src="../img/UNIKLOH.svg" alt="Logo" width="90" height="24" class="d-inline-block align-text-top ms-5" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: end">
                <ul class="navbar-nav">
                    <li class="nav-item mx-3"><a class="nav-link active" style="color: #e84242" href="../admin-page/stok.php">ADMIN - STOK</a></li>
                    <li class="nav-item mx-3"><span class="nav-link">|</span></li>
                    <li class="nav-item mx-3"><a class="nav-link" href="../admin-page/post.php">ADMIN - BLOG</a></li>
                    <li class="nav-item mx-3"><span class="nav-link">|</span></li>
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

    <div class="container-fluid container">
        <div class="col-6 mx-auto">
            <h5 style="padding: .5rem 0; border-bottom: 2px solid #4E4343; width: fit-content; font-weight: 700; margin-bottom: 2rem;">EDIT BARANG</h5>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $x['id_produk'] ?>">
                <div class="mb-3">
                    <div>
                        <img src="../img/<?= $x['gambar'] ?>" style="width: 5rem" alt="" class="mb-3">
                    </div>
                    <label for="gambar" class="form-label">Foto Produk</label>
                    <input type="file" accept=".jpg, .png" class="form-control" name="gambar" id="gambar" placeholder="Masukkan kode">
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama" value="<?= $x['nama'] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukkan harga" value="<?= $x['harga'] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="jenis" class="form-label">Jenis</label>
                    <select class="form-select" aria-label="Default select example" id="jenis" name="jenis" style="background-color: #f5f5f5; border: none;" required>
                        <option value="Pria" <?= ($x['jenis'] == 'Pria') ? 'selected' : '' ?>>Pria</option>
                        <option value="Wanita" <?= ($x['jenis'] == 'Wanita') ? 'selected' : '' ?>>Wanita</option>
                        <option value="Unisex" <?= ($x['jenis'] == 'Unisex') ? 'selected' : '' ?>>Unisex</option>
                    </select>
                </div>

                <div class="row mb-5">
                    <div class="col-10"><a href="../admin-page/stok.php" class="btn" style="border: 1px solid #893302; box-sizing: border-box; color: #893302;">Kembali</a></div>
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
