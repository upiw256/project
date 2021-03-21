<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url() ?>/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/template/dist/js/adminlte.min.js"></script>

<script>
  function previewImg() {

    const gambar = document.querySelector('#gambar');
    const gambarlabel = document.querySelector('.custom-file-label');
    const imgPreveiw = document.querySelector('.img-preview');

    gambarlabel.textContent = gambar.files[0].name;

    const fileGambar = new FileReader();
    fileGambar.readAsDataURL(gambar.files[0]);

    fileGambar.onload = function(e) {
      imgPreveiw.src = e.target.result;
    }
  }
</script>
</body>

</html>