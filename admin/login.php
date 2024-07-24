<?php

include_once("../helper/config.php");
include_once("../helper/function.php");

$login = cekSession();
if($login){
    redirect("index.php");
}

if (isset($_POST['login'])) {
    $u = post('username');
    $p = post('password');

    $logins = login($u, $p);
    if ($logins) {
        redirect('index.php');
    }else{
        redirect('login.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <title>Login Putri motor</title>
    <link rel="stylesheet" href="../../assets/css/quick-website.css" />
    <link rel="stylesheet" href="../../assets/libs/@fortawesome/fontawesome-free/css/all.min.css" />
</head>

<body class="bg-dark">
    <section class="slice py-5 bg-dark">
        <div class="container">
            <div class="row mt-2 justify-content-center">
                <div class="col-md-4">
                    <div style="max-width: 28rem;" class="card mb-0">
                        <div class="p-3">
                            <?= toastr_show() ?>
                        </div>
                        <div class="p-5">
                                <div class="mb-5 text-center">
                                    <h6 class="h3 mb-1">Login</h6>
                                    <p class="text-muted mb-0">Silahkan login terlebih dahulu</p>
                                </div>
                                <span class="clearfix"></span>
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label class="form-control-label">Username</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input type="text" name="username" class="form-control" id="input-username"
                                                placeholder="Administrator">
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <label class="form-control-label">Password</label>
                                            </div>
                                            <div class="mb-2">
                                                <a href="#" id="togglePassword"
                                                    class="small text-muted text-underline--dashed border-primary"
                                                    data-toggle="password-text" data-target="#input-password">Show
                                                    password</a>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                                            </div>
                                            <input type="password" id="password" name="password" class="form-control" id="input-password"
                                                placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit" name="login" class="btn btn-block btn-primary">Sign in</button></div>
                                </form>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core JS  -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/js/jquery.form.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/libs/svg-injector/dist/svg-injector.min.js"></script>
    <script src="../../assets/libs/feather-icons/dist/feather.min.js"></script>
    <script src="../../assets/js/style.js"></script>
    <!-- Quick JS -->
    <script src="/assets/js/quick-website.js"></script>
    <script>
    
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function() {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
        });

        setTimeout(function() {
            $('.alert').fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 5000);

        setTimeout(function() {
            $('.alert').fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 1500);
    </script>
    <!-- Feather Icons -->
</body>

</html>