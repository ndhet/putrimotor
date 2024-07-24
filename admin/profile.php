<?php

include_once("../helper/config.php");
include_once("../helper/function.php");

$login = cekSession();
if(!$login){
    redirect("login.php");
}

$user = getuser();

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $pwlama = $_POST['passwordlama'];
    $pwbaru = md5($_POST['passwordbaru']);

    if (md5($pwlama) == $user['password']) {
        $proses = changepw($username, $user['username'], $pwbaru);
        if ($proses) {
            echo "<script>alert('Session Telah berubah, Silahkan login lagi')</script>";
            session_unset();
            session_destroy();
            redirect('/admin');
        }else{
            echo "<script>alert('Mysql Error')</script>";
        }
    }else{
        echo "<script>alert('Password lama tidak benar')</script>";
    }
}
include("./layout/header.php");
include("./layout/navbar.php");

?>
<section class="slice py-5 bg-white">
    <div class="container">
        <form class="card" method="post">
            <div class="card-header fw-bold">
                Update Profile
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6 mb-2">
                        <label class="form-control-label">Username</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="username" value="<?= $user['username'] ?>">
                            </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-control-label">Password lama</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="passwordlama" placeholder="Masukan password lama">
                            </div>
                    </div>
                </div>
                <label class="form-control-label">Pasword baru</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="passwordbaru" placeholder="Masukan password baru">
                </div>
            </div>
            <div class="card-footer d-flex">
                <a href="/admin" class="btn btn-sm btn-secondary">Kembali</a>
                <input type="submit" class="btn btn-sm btn-success" value="Update Profile" name="submit">
            </div>
        </form>
    </div>
</section>