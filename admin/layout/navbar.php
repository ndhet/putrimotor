<!--Navbar-->
<nav class="navbar navbar-sticky navbar-expand-lg navbar-light bg-white p-3 shadow-sm">
    <div class="container">
      <!--Brand-->
      <a class="navbar-brand" href="/admin" style="color: black;">
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
            <a href="/admin" class="nav-link">Home</a>
          </li>
          <li class="nav-item dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
            <div class="dropdown-menu dropdown-menu">
              <a href="/admin/datamotor.php" class="dropdown-item">Data Motor</a>
              <a href="/admin/profile.php" class="dropdown-item">Profile</a>
              <a href="/admin/logout.php" class="dropdown-item">Logout</a>
            </div>
            
          </li>
        </ul>
      </div>
    </div>
  </nav>