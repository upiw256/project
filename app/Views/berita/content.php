<!-- Main content -->
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-10">
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
      </div>
      <!-- /.col-md-6 -->
      <div class="col-lg-2">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title m-0">{{widgets-kepsek}}</h5>
          </div>
          <div class="card-body">
            <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1735536cd79%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1735536cd79%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2299.4140625%22%20y%3D%2296.2578125%22%3EImage%20cap%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">

            <p class="card-text">{{Nama Kepala Sekolah}}</p>
            <p class="card-text">{{NIP Kepala Sekolah}}</p>
            <a href="#" class="btn btn-primary">Profil</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  <div class="p-3">
    <h5>Title</h5>
    <p>Sidebar content</p>
  </div>
</aside>
<!-- /.control-sidebar -->