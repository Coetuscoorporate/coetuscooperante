
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>Ruang Hijrah</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/ruanghijrah/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/ruanghijrah/css/flaticon.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/ruanghijrah/css/themify-icons.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/ruanghijrah/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/ruanghijrah/vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/ruanghijrah/css/style.css" />
  </head>

  <body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
      <div class="main_menu">
        <div class="search_input" id="search_input_box">
          <div class="container">
            <form class="d-flex justify-content-between" method="" action="">
              <input
                type="text"
                class="form-control"
                id="search_input"
                placeholder="Search Here"
              />
              <button type="submit" class="btn"></button>
              <span
                class="ti-close"
                id="close_search"
                title="Close Search"
              ></span>
            </form>
          </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="index.html"
              ><img src="<?php echo base_url() ?>assets/ruanghijrah/img/logo.png" alt=""
            /></a>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon-bar"></span> <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div
              class="collapse navbar-collapse offset"
              id="navbarSupportedContent"
            >
              <ul class="nav navbar-nav menu_nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url('mentee/dashboard') ?>">Home</a>
                </li>
               
                
                <li class="nav-item submenu dropdown">
                  <a
                    href="#"
                    class="nav-link dropdown-toggle"
                    data-toggle="dropdown"
                    role="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                    >Account</a
                  >
                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('mentee/myaccount') ?>">My Account</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('mentee/myaccount/Jadwal_mentoring') ?>">Jawal Mentoring</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('mentee/myaccount/materi') ?>">Materi</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('mentee/auth/logout') ?>">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span></a>
                    </li>
                  </ul>
                </li>
                
                <li class="nav-item">
                  <a href="#" class="nav-link search" id="search">
                    <i class="ti-search"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!--================ End Header Menu Area =================-->

    