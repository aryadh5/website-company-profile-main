<?php 
session_start();
if(isset($_SESSION['admin_username'])!=''){
    header("location:index.php");
    exit();
}
include("../inc/inc_koneksi.php");

$username   = "";
$password   = "";
$err        = "";

if(isset($_POST['Login'])){
    $username       = $_POST['username'];
    $password       = $_POST['password'];

    if($username == '' or $password == ''){
        $err    = "Silakan masukkan semua isian";
    }else{
        $sql1   = "select * from admin where username = '$username'";
        $q1     = mysqli_query($koneksi,$sql1);
        $r1     = mysqli_fetch_array($q1);
        $n1     = mysqli_num_rows($q1);

        if($n1 < 1){
            $err = "Username tidak ditemukan";
        }elseif($r1['password'] != md5($password)){
            $err = "Password yang kamu masukkan tidak sesuai";
        }else{
            $_SESSION['admin_username']     = $username;
            header("location:index.php");
            exit();
        }
    }
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        body {
            width: 100%;
            max-width: 100%;
            margin: auto;
            padding: 15px;
            background-color: #f8f9fa;
        }
        
        h1 {
            margin-bottom: 20px;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
    </style>
    <title>Login Admin</title>
</head>
<body>
    <form action="" method="POST">
        
        <section class="vh-100" style="background-color: hsl(0, 0%, 96%)">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                    
                    <h3 class="mb-5">Login Admin</h3>

                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input name="username" type="username" id="username" class="form-control form-control-lg" placeholder="masukkan username" value="<?php echo $username?>" />
                    </div>

                    <div class="form-outline mb-4">
                        <label for="password" class="form-label" for="password">Password</label>
                        <input name="password" type="password" id="password" class="form-control form-control-lg" placeholder="masukkan password" />
                    </div>
                    <?php 
                    if($err){
                    ?>
                    <div class="alert alert-danger">
                        <?php echo $err ?>
                    </div>
                    <?php
                    }
                    ?>
                    <button class="btn btn-secondary btn-lg btn-block" type="button" onclick="window.location='../index.php';">Kembali</button>
                    <button name="Login" class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                </div>
            </div>
            </div>
        </div>
        </section>
    </form>
</body>
</html>
<?php include("inc_footer.php") ?>
