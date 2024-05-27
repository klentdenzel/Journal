
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Monsterlite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Monster admin lite design, Monster admin lite dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="Monster Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Baylosis Blog</title>
    <link
      rel="canonical"
      href="https://www.wrappixel.com/templates/monster-admin-lite/"
    />
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="assets/images/book.png"
    />
    <!-- Custom CSS -->
    <link
      href="assets/plugins/chartist/dist/chartist.min.css"
      rel="stylesheet"
    />
    <!-- Custom CSS -->
    <link href="assets/css/style.min.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin6"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin6">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="users">
              <!-- Logo icon -->
              <b class="logo-icon">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img
                  src="assets/images/CMUJS.png"
                  alt="homepage"
                  class="dark-logo"
                />
              </b>
              <!--End Logo icon -->
              <!-- Logo text -->
              <span class="logo-text">
                <!-- dark Logo text -->
              </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <a
              class="
                nav-toggler
                waves-effect waves-light
                text-dark
                d-block d-md-none
              "
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
          >
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav me-auto mt-md-0">
              <!-- ============================================================== -->
              <!-- Search -->
              <!-- ============================================================== -->

              
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav">
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-center">
                <!-- Displaying the user's profile picture from session data -->
                
            </div>
            <div class="col-md-6 text-center">
                <!-- Displaying the username -->
                <h3><?php echo $this->session->userdata('username'); ?></h3>
            </div>
            <div class="col-md-3 text-right">
                <!-- Logout button -->
                <a href="<?php echo site_url('login/logout'); ?>" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</ul>

          </div>
        </nav>
      </header>

      <aside class="left-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav">
              <!-- User Profile-->
              <li class="sidebar-item">
                <!-- <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="#"
                  aria-expanded="false"
                  ><i
                    class="me-3 mdi mdi-view-dashboard fs-3"
                    aria-hidden="true"
                  ></i
                  ><span class="hide-menu">Dashboard</span></a
                >  -->
                <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="users"
                  aria-expanded="false"
                >
                  <img src="assets/images/user1.png" alt="homepage" />
                  <span class="hide-menu">Manage Users</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="authors"
                  aria-expanded="false"
                  ><img src="assets/images/user1.png" alt="homepage"/>
                  <span class="hide-menu">Manage Authors</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="volumes"
                  aria-expanded="false"
                  ><i class="me-3 mdi mdi-file fs-3" aria-hidden="true"></i
                  ><span class="hide-menu">Manage Volumes</span></a>
              </li>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="articles"
                  aria-expanded="false"
                  ><i class="me-3 mdi mdi-file fs-3" aria-hidden="true"></i
                  ><span class="hide-menu">Manage Articles</span></a>
              </li>
              <!-- <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="#"
                  aria-expanded="false"
                  ><i
                    class="me-3 mdi mdi-view-dashboard fs-3"
                    aria-hidden="true"
                  ></i
                  ><span class="hide-menu">My Profile</span></a
                >  -->
            </ul>
          </nav>

        </div>
      </aside>
          </div>
      </div>
    </div>


