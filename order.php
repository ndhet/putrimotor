<?php

include_once('./helper/config.php');
include_once('./helper/function.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Putri Motor</title>
  <meta name="description" content="Showroom Motor Putri, Murah dan terpercaya" />
  <meta name="keywords" content="Showroom, Dealer motor" />
  <link rel="stylesheet" href="./assets/css/quick-website.css" />
  <link rel="stylesheet" href="./assets/libs/@fortawesome/fontawesome-free/css/all.min.css" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
  <!--Navbar-->
  <nav class="navbar navbar-sticky navbar-expand-lg navbar-light bg-white p-3 shadow-sm">
    <div class="container">
      <!--Brand-->
      <a class="navbar-brand" href="/" style="color: black;">
        <strong><i class="fa fa-motorcycle me-2"></i> Putri Motor</strong>
      </a>
      <!--Toggler-->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!--Collapse-->
      <div class="navbar-collapse collapse" id="navbarCollapse">
        <ul class="navbar-nav mt-4 mt-lg-0 ml-auto">
          <li class="nav-item">
            <a href="/" class="nav-link">Home</a>
          </li>
          <li class="nav-item dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
            <div class="dropdown-menu dropdown-menu-single">
              <a href="/order.php" class="dropdown-item">Order</a>
              <a href="/contact.php" class="dropdown-item">Contact</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <section class="slice py-5 bg-dark">
    <div class="container py-3">
      <h1 class="display-4 text-center text-white">Showroom Putri Motor</h1>
      <h4 class="display-5 text-center text-white">Jika Anda belum pernah memilikinya, Anda tidak akan pernah mengerti</h4>
      <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel" data-slide-to="0" class="active"></li>
          <li data-target="#carousel" data-slide-to="1"></li>
          <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner text-center">
          <div class="carousel-item active">
            <img class="img-fluid w-80" src="https://www.hondacengkareng.com/wp-content/uploads/2018/11/Honda-Scoopy-Stylish-Red-Smart-Key-1.png" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="img-fluid w-80" src="https://www.hondacengkareng.com/wp-content/uploads/2023/08/EM1-Intelligent-Matte-Black.png" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="img-fluid w-80" src="https://www.hondacengkareng.com/wp-content/uploads/2019/07/Honda-Genio-Radiant-Red-Black-CBS.png" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </section>
  <section class="slice slice-lg">
    <div class="container">
      <div class="row mb-5 justify-content-center text-center">
        <div class="col-lg-6">
        <div class="alert alert-modern alert-outline-danger" data-aos-once="true" data-aos="zoom-up">
          <span class="badge badge-danger badge-pill">
              News
          </span>
            <span class="alert-content">Motor disini terawat dan bergaransi .</span>
          </div>
          <h2 class="mt-2" data-aos-once="true" data-aos="zoom-in-right">Showroom Putri Motor</h2>
          <div class="mt-2" data-aos-once="true" data-aos="zoom-in-left">
            <p class="lead lh-180">List order yang tersedia di Showroom Putri Motor</p>
          </div>
        </div>
      </div>
      <!-- Card -->
      <div class="row mt-5">
        <?php $no = 1;
            $sql = "SELECT * FROM motor";
            $result = $mysqli->query($sql);
            while($data = $result->fetch_assoc()) {
          ?>
          <div class="col-md-4">
          <div class="card hover-translate-y-n10 hover-shadow-lg" data-aos-once="true" data-aos="zoom-in-up">
          <div class="card-body">
            <div class="m--1">
              <img alt="Image placeholder" src="./assets/img/motor/<?= $data["img"] ?>" class="card-img-top img-fluid img-center" style="height: 200px;">
            </div>
              <div class="row">
                <div class="col mt-4">
                  <table class="table">
                    <tr>
                      <td class="m-0">Product</td>
                      <td> : </td>
                      <td><b><?= $data['product'] ?></b></td>
                    </tr>
                    <tr>
                      <td>Merk</td>
                      <td> : </td>
                      <td><b><?= $data['merk'] ?></b></td>
                    </tr>
                    <tr>
                      <td>Type</td>
                      <td> : </td>
                      <td><b><?= $data['types'] ?></b></td>
                    </tr>
                    <tr>
                      <td>Condition</td>
                      <td> : </td>
                      <td><b><?= $data['conditions'] ?></b></td>
                    </tr>
                  </table>
                  <p class="h4 text-center text-danger">Rp. <?= $data['price']?></p>
                </div>
                <hr>
                <div class="col text-center">
                  <a href="https://api.whatsapp.com/send?phone=6285219307568&text=Assalamualaikum,%0ASaya mau order product%0A%0A> Product : <?= $data['product']?> %0A%0A> Merk : <?= $data['merk']?> %0A> Type : <?= $data['types']?>%0A> Kondisi : <?= $data['conditions']?>%0A%0AHarga : <?= $data['price']?>" class="btn bg-light-success rounded-pill btn-sm rounded text-white btn-icon">
                  BELI <i class="m-2 fa fa-shopping-cart text-white" width="80px"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <a href="https://api.whatsapp.com/send?phone=6285219307568&text=Hallo bos, Saya mau beli motor" class="float" target="_blank">
    <i class="fab fa-whatsapp my-float"></i>
  </a>
  <footer class="position-relative" id="footer-main">
    <div class="footer pt-lg-6 footer-dark bg-dark">
      <div class="container pt-4">
        <div class="row align-items-center justify-content-md-between pb-4">
          <div class="col-md-6">
            <div class="copyright text-sm font-weight-bold text-center text-md-left">
              &copy;
              <script>
                document.write(new Date().getFullYear())
              </script> <a href="https://putrimotor.me" class="font-weight-bold" target="_blank">Putri Motor</a>
            </div>
          </div>
          <div class="col-md-6">
            <ul class="nav justify-content-center justify-content-md-end mt-3 mt-md-0">
              <li class="nav-item">
                <a class="nav-link" href="/about.php">
                  About
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/contact.php">
                  Contact
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Core JS  -->
  <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="./assets/js/jquery.form.min.js"></script>
  <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/libs/svg-injector/dist/svg-injector.min.js"></script>
  <script src="./assets/libs/feather-icons/dist/feather.min.js"></script>
  <script src="./assets/libs/feather-icons/dist/feather.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <!-- Quick JS -->
  <script src="/assets/js/quick-website.js"></script>
  <script>
    feather.replace({
      'width': '1em',
      'height': '1em'
    })

    AOS.init();
  </script>
</body>
</html>
