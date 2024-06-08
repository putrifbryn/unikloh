<?php
session_start();

require 'config/koneksi.php';

if(isset($_POST['submit'])) {
    $username = $_POST['uname'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM akun WHERE username = '$username'");
    echo "<meta http-equiv='refresh' content='1;url=change_password.php'>";

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $update_success = false;
        
        if ($password == $row['password']) {
            echo "<script>alert('Tidak boleh menggunakan password yang sama');</script>";
        } else {
            $sql = "UPDATE akun SET password = '$password' WHERE username = '$username'";
            if (mysqli_query($conn, $sql)) {
                $update_success = true;
            }

            if ($row['role'] == "Admin") {
                if ($update_success) {
                    echo "<script>alert('Password berhasil diperbarui');</script>";
                    echo "<meta http-equiv='refresh' content='1;url=admin-page/stok.php'>";
                } else {
                    echo "<script>alert('Password gagal diperbarui');</script>";
                    echo "<meta http-equiv='refresh' content='1;url=change_password.php'>";
                }
            } else if ($row['role'] == "User") {
                if ($update_success) {
                    echo "<script>alert('Password berhasil diperbarui');</script>";
                    echo "<meta http-equiv='refresh' content='1;url=user-page/produk.php'>";
                } else {
                    echo "<script>alert('Password gagal diperbarui');</script>";
                    echo "<meta http-equiv='refresh' content='1;url=change_password.php'>";
                }
            }
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UNIKLOH | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #fff; position: fixed; top: 0; width: 100%; z-index: 9999;">
        <div class="container-fluid" style="justify-content: center;">
            <a class="navbar-brand" href="">
                <img src="img/UNIKLOH.svg" alt="Logo" width="90" height="24" class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>

    <div class="container-fluid mt-5 container">
        <div class="row">
            <div class="col-6 main">
                <h4 class="header">Change Password</h4>

                <form action="" method="post" autocomplete="off">
                    <div class="mb-3">
                        <label for="uname" class="form-label">Username</label>
                        <input type="text" class="form-control" id="uname" name="uname" placeholder="Masukkan username anda" style="background-color: #f5f5f5; border: none;" value="<?php echo $_SESSION['username']; ?>" required readonly>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="*****" style="background-color: #f5f5f5; border: none;" required>
                    </div>
                    <input type="submit" name="submit" class="btn m-auto login" value="UPDATE">
                </form>
            </div>
            <div class="col-6 side-img main"></div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
