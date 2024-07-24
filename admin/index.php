<?php

include_once("../helper/config.php");
include_once("../helper/function.php");

$login = cekSession();
if($login == 0){
    redirect("login.php");
}

include("./layout/header.php");
include("./layout/navbar.php");

?>

<section class="slice py-5 bg-white">
    <div class="container">
        <div class="mb-5">
        <h2 class="text-center mb-2">Tugas Kerja Peraktek</h2>
        </div>
        <div class="row mt-2">
            <div class="col-md-4">
                <div class="card">
                    <div class="d-flex p-5">
                        <div>
                            <img src="../assets/img/clients/160x160/img-1.png" alt="Mita" class="img-fluid img-center">
                        </div>
                        <div class="pl-4">
                            <h5 class="lh-130">NUR MITA AZIZAH</h5>
                            <p class="text-muted mb-0">
                                Fakultas Ilmu Komputer.
                            </p>
                            <p class="text-muted mb-0">
                                Universitas Pamulang.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="d-flex p-5">
                        <div>
                            <img src="../assets/img/clients/160x160/img-1.png" alt="Mita" class="img-fluid img-center">
                        </div>
                        <div class="pl-4">
                            <h5 class="lh-130">SYAHRUL</h5>
                            <p class="text-muted mb-0">
                                Fakultas Ilmu Komputer.
                            </p>
                            <p class="text-muted mb-0">
                                Universitas Pamulang.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="d-flex p-5">
                        <div>
                            <img src="../assets/img/clients/160x160/img-1.png" alt="Mita" class="img-fluid img-center">
                        </div>
                        <div class="pl-4">
                            <h5 class="lh-130">JANNIBATUR AIMAN</h5>
                            <p class="text-muted mb-0">
                                Fakultas Ilmu Komputer.
                            </p>
                            <p class="text-muted mb-0">
                                Universitas Pamulang.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include("./layout/footer.php");

?>