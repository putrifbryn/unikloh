<?php
session_start();

require 'config/koneksi.php';

if(isset($_POST['login'])) {
	$username = $_POST['uname'];
	$password = $_POST['password'];

	$result = mysqli_query($conn, "SELECT * FROM akun WHERE username = '$username'");

	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		
		if ($password == $row['password']) {
			if ($row['role'] == "Admin") {
                echo "<script> alert ('Selamat datang admin'); </script>";
				$_SESSION['log_admin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;
				header("Location: admin-page/stok.php");
				exit();
			} else if ($row['role'] == "User") {
                echo "<script> alert ('Selamat datang user'); </script>";
				$_SESSION['log_user'] = true;
				$_SESSION['username'] = $username;
				header("Location: user-page/index.php");
				exit();
			}
		}
		
	}

    $error = true;
} 

if (isset($error)) {
    echo "<script>
        alert('Username atau password salah!');
    </script>";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UNIKLOH | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="styles/style.css">
</head>
  <body>
    <nav class="navbar navbar-expand-lg" style="background-color: #fff; position: fixed; top: 0; width: 100%; z-index: 9999;">
        <div class="container-fluid" style="justify-content: center;">
            <a class="navbar-brand" href="index.php">
                <img src="img/UNIKLOH.svg" alt="Logo" width="90" height="24" class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>

    <div class="container-fluid mt-5 container">
        <div class="row">
            <div class="col-6 main">
                
                <h4 class="header">LOGIN</h4>

                <form action="" method="post" autocomple="off">
                    
                    <div class="mb-3">
                        <label for="uname" class="form-label">Email</label>
                        <input type="email" class="form-control" id="uname" name="uname" placeholder="Masukkan email anda" style="background-color: #f5f5f5; border: none;" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="*****" style="background-color: #f5f5f5; border: none;" required>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <a href="signup.php"><input type="button" class="btn m-auto signup" value="SIGN UP"></a>
                        </div>
                        <div class="col-6">
                            <input type="submit" name="login" class="btn m-auto login" value="LOGIN">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6 side-img main">

            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
