<?= $this->extend('template/home'); ?>
<?= $this->section('content') ?>
<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->

<!-- /.content-header -->
<!-- Main content -->
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <?php foreach ($berita as $b) : ?>
          <div class="card">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="<?= base_url($b['icon']) ?>" class="card-img">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $b['judul'] ?></h5>
                  <p class="card-text"><small class="text-muted"><?= $b['tgl_buat'] ?></small></p>
                  <p class="card-text"><?= substr($b['isi'], 0, 100) . "...." ?></p>
                  <a href="/home/berita/<?= $b['id_post'] ?>" class="btn btn-primary">Baca selengkapnya</a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
        <?= $pager->links('berita', 'berita_pagination') ?>
      </div>

      <!-- /.col-md-6 -->
      <div class="col-lg-3">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title m-0">Profil Kepala Sekolah</h5>
          </div>
          <div class="card-body">
            <?php foreach ($kepsek as $k) : ?>
              <img class="card-img-top" src="<?= base_url($k['foto']) ?>" alt="Card image cap">
              <p class="card-text"><?= $k['nama_kepsek'] ?></p>
              <p class="card-text"><?= $k['nip'] ?></p>
            <?php endforeach ?>
            <a href="#" class="btn btn-primary">Profil</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<!-- /.content-wrapper -->
<?= $this->endSection() ?>