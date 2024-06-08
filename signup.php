<?php
    require 'config/koneksi.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UNIKLOH | Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="styles/style.css">

    <style>
        .main {
            box-sizing: border-box;
            padding: 2.3rem 0;
        }
    </style>
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
                
                <h4 class="header">SIGNUP</h4>

                <form action="" method="post" autocomple="off">
                    <div class="mb-3">
                        <label for="fname" class="form-label">Full Name <span>*</span></label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your full name here" style="background-color: #f5f5f5; border: none;" required>
                    </div>
                    <div class="mb-3">
                        <label for="uname" class="form-label">Username <span>*</span></label>
                        <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter your username here" style="background-color: #f5f5f5; border: none;" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role <span>*</span></label>
                        <select class="form-select" aria-label="Default select example" id="role" name="roles" style="background-color: #f5f5f5; border: none;" required>
                            <option value="User">User</option>
                            <option value="Admin">Admin</option>
                          </select>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password <span>*</span></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="*****" style="background-color: #f5f5f5; border: none;" required>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <a href="login.php"><input type="button" class="btn m-auto signup" value="LOGIN"></a>
                        </div>
                        <div class="col-6">
                            <input type="submit" class="btn m-auto login" name="signup" value="SIGN UP">
                        </div>
                    </div>
                </form>

                <?php
                    if(isset($_POST['signup'])) {
                        $fname = $_POST['fname'];
                        $uname = $_POST['uname'];
                        $role = $_POST['roles'];
                        $password = $_POST['password'];

                        $result = mysqli_query($conn, "SELECT username FROM akun WHERE username = '$uname'");

                        if (mysqli_fetch_assoc($result)) {
                            echo "<script> alert ('Username sudah terdaftar'); </script>";
                            header("refresh:1; signup.php");
                            return false;
                        } else {
                            $sql = "INSERT INTO akun(id, username, nama, password, role) VALUES ('', '$uname', '$fname', '$password', '$role')";

                            if (mysqli_query($conn, $sql)) {
                                echo "<script> alert ('Akun berhasil dibuat'); </script>";
                                header("refresh:1; login.php");
                            } else {
                                echo "<script> alert ('Akun gagal dibuat') </script>";
                                header("refresh:1; login.php");
                            }
                        }
                    }
                ?>
            </div>
            <div class="col-6 side-img main">
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
