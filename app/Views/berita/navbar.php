<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
        <a href="<?= base_url() ?>" class="navbar-brand">
          <img src="<?= base_url() ?>/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="<?= base_url() ?>" class="nav-link">Home</a>
            </li>
            <?php foreach ($sub as $n) :
              if ($n->sub == 'false') { ?>
                <li class="nav-item">
                  <a href="<?= base_url("/home/page/" . $n->slug) ?>" class="nav-link text-uppercase"><?= $n->judul ?></a>
                </li>
              <?php } else { ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-uppercase" href="<?= base_url("/home/page/" . $n->slug) ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $n->judul ?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?= base_url("/home/page/" . $n->slug_sub) ?>"><?= $n->judul_sub_menu ?></a>
                  </div>
                </li>
              <?php }
              ?>

            <?php endforeach ?>
          </ul>

          <!-- SEARCH FORM -->
          <form class="form-inline ml-0 ml-md-3">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Cari Berita" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-2 navbar navbar-expand-md navbar-light navbar-primary text-white ">
              <p class="m-0 text-uppercase text-break">
                Berita Terbaru
              </p>
            </div>
            <div class="col-10">
              <h1 class="m-0 text-dark">
                <marquee scrolldelay="100" class="navbar navbar-expand-md navbar-light navbar-secondary text-white">
                  <?php foreach ($berita as $b) : ?>
                    <img class="card-img-top" src="<?= base_url($b['icon']) ?>" style="width: 50px; height: 50px;" alt="Card image cap"> <?= $b['judul'] ?> |
                  <?php endforeach ?>
                </marquee>
              </h1>
            </div>
            <?php if (session()->getFlashdata('pesan')) :
            ?>
              <div class="alert alert-danger col-12" role="alert">
                <?php session()->getFlashdata('pesan')
                ?>
              </div>
            <?php endif
            ?>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->