    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title text-bold">Menambah Berita</h5>
                  <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                      <?= session()->getFlashdata('pesan') ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php endif ?>

                  <div class="card-text">

                    <form action="<?= base_url("/admin/input_berita") ?>" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" name="judul">
                      </div>
                      <div class="form-group">
                        <label for="isi">Isi Berita</label>
                        <textarea class="form-control" name="isi"></textarea>
                      </div>
                      <label for="gambar">upload gambar</label>
                      <div class="form-group">
                        <div class="custom-file col-sm-8">
                          <input type="file" name="gambar" class="custom-file-input" id="gambar" required onchange="previewImg();">
                          <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                          <?php if (session()->getFlashdata('pesan')) : ?>
                            <small class="text-danger">
                              *<?= session()->getFlashdata('pesan') ?>
                            </small>
                          <?php endif ?>

                        </div>
                        <div class="col-sm-4 mt-3">
                          <img src="https://www.astralife.co.id/beta/wp-content/uploads/2019/11/default-img.png" alt="img" class="img-thumbnail img-preview">
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary ">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- /.control-sidebar -->