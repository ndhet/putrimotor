<?php

include_once("./config.php");
session_start();


function motor(){
    global $mysqli;
    $sql = "SELECT * FROM motor";
    return $result = $mysqli->query($sql);
}

function updateMotor($id, $product, $merk, $type, $conditions, $price){
    global $mysqli;
    $sql = "UPDATE motor SET product='$product', merk='$merk', types='$type', conditions='$conditions', price='$price' WHERE id='$id'";
    return $mysqli->query($sql);
}

function updateMotorimg($id, $product, $merk, $type, $conditions, $price, $img){
    global $mysqli;
    $sql = "UPDATE motor SET product='$product', merk='$merk', types='$type', conditions='$conditions', price='$price', img='$img' WHERE id='$id'";
    return $mysqli->query($sql);
}
function getMotor($id){
    global $mysqli;
    $sql = "SELECT * FROM motor WHERE `id`='$id'";
    return $mysqli->query($sql);
}


function get($param){
    global $mysqli;
    $d = isset($_GET[$param]) ? $_GET[$param] : NULL;
    //$d = mysqli_real_escape_string($mysqli, $d);
    $d = htmlspecialchars($d);
    return $d;
}

function post($param){
    global $mysqli;
    $d = isset($_POST[$param]) ? $_POST[$param] : NULL;
    //$d = mysqli_real_escape_string($mysqli, $d);
    $d = htmlspecialchars($d);
    return $d;
}

function redirect($target){
    echo '
    <script>
    window.location = "'.$target.'";
    </script>
    ';
    exit;
}

function login($u, $p){
    global $mysqli;
    $p = md5($p);
    $sql = "SELECT * FROM user WHERE username='$u' AND password='$p'";
    $q = $mysqli->query($sql);

    
    if($q->num_rows){
        $_SESSION['login'] = true;
        $_SESSION['user'] = $u;
        return true;
    }else{
        toastr_set('error','Username atau Password salah !');
        return false;
    }
}

function changepw($userbaru, $username, $pwbaru){
    global $mysqli;
    $sql = "UPDATE user SET `password`='$pwbaru' , `username`='$userbaru' WHERE username='$username'";
    $q = $mysqli->query($sql);

    if ($q) {
        return true;
    }else{
        return false;
    }
}

function getuser(){
    global $mysqli;
    $user = $_SESSION['user'];
    $sql = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$user'");
    $data = mysqli_fetch_assoc($sql);
    return $data;
}

function cekSession(){
    $login = isset($_SESSION['login']) ? $_SESSION['login'] : false;
    if($login){
        return 1;
    }else{
        return 0;
    }
}

function toastr_set($status, $msg){
    $_SESSION['toastr'] = true;
    $_SESSION['toastr_status'] = $status;
    $_SESSION['toastr_msg'] = $msg;
}

function toastr_show(){
    $t = isset($_SESSION['toastr']) ? $_SESSION['toastr'] : null;
    $t_s = isset($_SESSION['toastr_status']) ? $_SESSION['toastr_status'] : null;
    $t_m = isset($_SESSION['toastr_msg']) ? $_SESSION['toastr_msg'] : null;
    if($t == true){
        if($t_s == "success"){
            echo '<div class="alert alert-important alert-success alert-dismissible" role="alert"><div class="d-flex"><div><svg xmlns="http://www.w3.org/2000/svg" class="d-flex me-3 icon alert-icon" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10"></svg></div><div>'.$t_m.'</div></div><a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a></div>';
        }

        if($t_s == "error"){
            echo '<div class="alert alert-important alert-danger alert-dismissible" role="alert"><div class="d-flex"><div><svg xmlns="http://www.w3.org/2000/svg" class="d-flex me-3 icon alert-icon icon-tabler-alert-triangle" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 9v4"></path><path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"></path><path d="M12 16h.01"></path></svg></div><div> '.$t_m.'</div></div><a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a></div>';
        }

        unset($_SESSION['toastr']);
        unset($_SESSION['toastr_status']);
        unset($_SESSION['toastr_msg']);
    }
}

function getSession(){
    global $mysqli;
    $user = $_SESSION['user'];
    $sql = "SELECT * FROM users WHERE username='$user'";
    $query = mysqli_query($mysqli, $sql);
    $result = mysqli_fetch_array($query);
    return $result['session'];
}


?>