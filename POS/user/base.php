<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
      <div class="container-fluid">
        <!-- Offcanvas Triggrer -->
        <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
          <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
        </button>
        <!-- Offcanvas Triggrer -->
        <a class="navbar-brand fw-bold me-auto" href="admin_dashboard.php">LJ MOTORGEAR TRADING</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <form class="d-flex ms-auto">
            <a class="btn btn-secondary rounded-pill me-2" style="background: #252836;" href="../admin/admin_pos.php" role="button">POS</a>
            <div class="input-group my-3 my-lg-0 ">
              <input type="text" class="form-control rounded-pill" placeholder="Search" aria-describedby="button-addon2">
              <button class="btn rounded-pill" type="button" id="button-addon2"><i class="biz bi-search"></i></i></button>
            </div>
          </form>
          <a type="button" class="nav-link text-white position-relative me-2">
            <i class="bi bi-bell"></i>
            <span class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger">
              1
            </span>
          </a>
          <ul class="navbar-nav mb-2 mb-lg-0 me-2">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              
                  <img src="../assets/images/Avatar.png" alt="" width="25" height="20" class="d-inline-block align-text-top">
            
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark " aria-labelledby="navbarDropdown">

                <li>
                  <hr class="dropdown-divider" style="height:3px; color:white;">
                </li>
                <li><a class="dropdown-item" href="">
                    <span class="me-1"><i class="bi bi-person-fill"></i></span>
                    <span>Profile</span></a></li>
                <li><a class="dropdown-item" href="">
                    <span class="me-1"><i class="bi bi-gear-fill"></i></span>
                    <span>Setting</span></a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item logout" name="logout" onclick="out();">
                    <span class="me-1"> <i class="bi bi-box-arrow-right"></i> </span>
                    <span>Log out</span></a></li>

              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar Header -->

    <!-- Side bar offcanvas-->
    <div class="offcanvas-header">
      <div class="offcanvas offcanvas-start text-white sidebar-nav bg-dark" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-body p-0">
          <nav class="navbar-dark">
            <ul class="navbar-nav">
              <img src="../assets/images/Avatar.png" alt="" width="100" height="100" class="rounded mx-auto d-block mt-3">

              <!--digital clock start-->
              <div class="d-flex justify-content-center">

                <body onload="initClock()">
                  <div class="datetime text-center">
                    <div class="date text-light fs-6">
                      <span id="dayname">Day</span>,
                      <span id="month">Month</span>
                      <span id="daynum">00</span>,
                      <span id="year">Year</span>
                    </div>
                    <div class="time text-light">
                      <span id="hour">00</span>:
                      <span id="minutes">00</span>:
                      <span id="seconds">00</span>
                      <span id="period">AM</span>
                    </div>
                  </div>
              </div>
              <!--digital clock end-->
              
              <li>
                <hr class="dropdown-divider mt-2">
                </hr>
            
                    <div class="list-group" id="list-tab" role="tablist">
                      <a class="list-group-item list-group-item-action bg-dark text-white" id="list-home-list" data-bs-toggle="list" onclick="window.location.href='../admin_page.php'" role="tab" aria-controls="list-home">
                        <span class="me-2"><i class="bi bi-speedometer"></i></i></span>
                        <span>Dashboard</span>
                      </a>
                      <a class="list-group-item list-group-item-action bg-dark text-white" id="list-profile-list" data-bs-toggle="list" onclick="window.location.href=''" role="tab" aria-controls="list-profile">
                        <span class="me-2"><i class="bi bi-calculator"></i></span>
                        <span>Point of Sale</span>
                      </a>
                      <a class="list-group-item list-group-item-action bg-dark text-white" id="list-messages-list" data-bs-toggle="list" onclick="window.location.href='./customer/customer_list.php'" role="tab" aria-controls="list-messages">
                        <span class="me-2"><i class="bi bi-people"></i></span>
                        <span>Customers</span>
                      </a>
                      <a class="list-group-item list-group-item-action bg-dark text-white" id="list-settings-list" data-bs-toggle="list" onclick="window.location.href='../product/product.php'" role="tab" aria-controls="list-settings">
                        <span class="me-2"><i class="bi bi-archive"></i></span>
                        <span>Products</span>
                      </a>
                      <a class="list-group-item list-group-item-action bg-dark text-white" id="list-settings-list" data-bs-toggle="list" onclick="window.location.href=''" role="tab" aria-controls="list-settings">
                        <span class="me-2"><i class="bi bi-ui-checks-grid"></i></span>
                        <span>Category</span>
                      </a>
                      <a class="list-group-item list-group-item-action bg-dark text-white" id="list-settings-list" data-bs-toggle="list" onclick="window.location.href=''" role="tab" aria-controls="list-settings">
                        <span class="me-2"><i class="bi bi-layers-fill"></i></span>
                        <span>Stocks</span>
                      </a>
                      <a class="list-group-item list-group-item-action bg-dark text-white" id="list-settings-list" data-bs-toggle="list" onclick="window.location.href=''" role="tab" aria-controls="list-settings">
                        <span class="me-2"><i class="bi bi-graph-up"></i></span>
                        <span>Daily Sales</span>
                      </a>

                      <a class="list-group-item list-group-item-action bg-dark text-white" id="list-settings-list" data-bs-toggle="list" onclick="window.location.href=''" role="tab" aria-controls="list-settings">
                        <span class="me-2"><i class="bi bi-clipboard-data"></i></span>
                        <span>Sales Report</span>
                      </a>
                      <a class="list-group-item list-group-item-action bg-dark text-white" id="list-settings-list" data-bs-toggle="list" onclick="window.location.href=''" role="tab" aria-controls="list-settings">
                        <span class="me-2"><i class="bi bi-arrow-return-left"></i></span>
                        <span>Sales Return</span>
                      </a>
                      <a class="list-group-item list-group-item-action bg-dark text-white" id="list-settings-list" data-bs-toggle="list" onclick="window.location.href=''" role="tab" aria-controls="list-settings">
                      <span class="me-2"><i class="bi bi-graph-up"></i></span>
                          <span>Suppliers</span>
                      </a>
                      <a class="list-group-item list-group-item-action bg-dark  active text-white" id="list-settings-list" data-bs-toggle="list" onclick="window.location.href='./user/user.php'" role="tab" aria-controls="list-settings">
                        <span class="me-2"><i class="bi bi-sliders"></i></span>
                        <span>User Management</span>
                      </a>
                    </div>
              </li>
            </ul>
            
        </div>
      </div>