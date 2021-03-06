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
                  <h5 class="card-title text-bold">Menambah Sub Menu</h5>
                  <div class="card-text">

                    <form action="<?= base_url("/admin/input_subMenu") ?>" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Pilih Menu</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="id_page">
                          <?php foreach ($page as $p) : ?>
                            <option value="<?= $p->id_page ?>"><?= $p->judul ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" name="judul">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Isi Menu</label>
                        <textarea class="form-control" name="isi"></textarea>
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