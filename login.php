<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    

    <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-primary text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <p class="text-white-50 mb-5">Please enter your login and password!</p>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typeEmailX">Masukkan username</label>
                    <input type="email" " id="typeEmailX" class="form-control form-control-lg" name="username" />
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typePasswordX">Password</label>
                    <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password" />
                </div>

                <input type="submit" class="btn btn-outline-light btn-lg px-5" name="login">

                </div>

                <div>
                <p class="mb-0">Gaada akun?  <a href="register.php" class="text-white-50 fw-bold">Buat Akun</a>
                </p>
                </div>

            </div>
            </div>
        </div>
        </div>
    </div>
    </section>

</body>
<?php

$conn = mysqli_connect("localhost", "root","","dabase_project");

if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
    
if (isset($_POST["login"]) === 1) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($config, "SELECT from tb_user where username = '$username' AND password = '$password'");

    if
        (mysqli_num_rows($result) === 1){

            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) {
                header("location:homepage.html");
                exit;
            }
            else {
                echo"password salah";
            }
            
        };

};

?>