<?php
    require "koneksi.php";

    $id = $_GET['id'];
    $hapus = mysqli_query($conn, "DELETE FROM produk WHERE id_produk = '$id'");

    if ($hapus) {
        echo "<script> alert('Data telah berhasil dihapus') </script>";
        header("refresh:1; ../admin-page/stok.php");
    } else {
        echo "<script> alert('Data gagal dihapus') </script>";
        header("refresh:1; ../admin-page/stok.php");
    }
?>