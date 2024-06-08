<?php
    require "koneksi.php";

    $id = $_GET['id'];
    $hapus = mysqli_query($conn, "DELETE FROM artikel WHERE id = '$id'");

    if ($hapus) {
        echo "<script> alert('Artikel berhasil dihapus') </script>";
        header("refresh:1; ../admin-page/post.php");
    } else {
        echo "<script> alert('Artikel berhasil dihapus') </script>";
        header("refresh:1; ../admin-page/post.php");
    }
?>