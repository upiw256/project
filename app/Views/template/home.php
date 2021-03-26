<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>SMAN 1 Margaasih</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Tiny editor -->
  <script src="https://cdn.tiny.cloud/1/rwzcvil7jualfcar7ft042v1qya7xb2wf0u1ei9wjshan8t7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea'
    });
  </script>
</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-dark navbar-primary">
      <div class="container">
        <a href="<?= base_url() ?>" class="navbar-brand">
          <span class="brand-text font-weight-light"><b>SMAN 1 MARGAASIH</b></span>
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
          </ul>

          <!-- SEARCH FORM -->
        </div>
      </div>
      <form class="form-inline mr-4 d-flex justify-content-end" action="" method="post">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar " type="search" placeholder="Cari Berita" aria-label="Search" name="berita">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
    </nav>
    <!-- /.navbar -->
    <div class="content-wrapper">
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
                  <?php foreach ($all as $b) : ?>
                    <a href="/home/berita/<?= $b['id_post'] ?>" class="text-light">
                      <img class="card-img-top" src="<?= base_url($b['icon']) ?>" style="width: 50px; height: 50px;" alt="Card image cap"> <?= $b['judul'] ?> |
                    </a>
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
      <?= $this->renderSection('content'); ?>
    </div>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->


    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="<?= base_url() ?>/template/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>/template/dist/js/adminlte.min.js"></script>
</body>

</html>