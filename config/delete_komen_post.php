<?php
    require "koneksi.php";

    $id = $_GET['id'];
    $hapus = mysqli_query($conn, "DELETE FROM komen_artikel WHERE id = '$id'");

    if ($hapus) {
        echo "<script> alert('Komentar telah berhasil dihapus') </script>";
        header("refresh:1; ../admin-page/post_detail.php");
    } else {
        echo "<script> alert('Komentar gagal dihapus') </script>";
        header("refresh:1; ../admin-page/post_detail.php");
    }
?>