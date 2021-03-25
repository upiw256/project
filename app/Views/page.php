<?php
$this->extend('template/home');
$this->section('content');
if ($isi == null) {
	foreach ($isiSub as $i) :
?>
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container">
					<div class="row mb-0">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark"></h1>
						</div>
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-body">
									<h1 class="card-title text-bold"><?= $i->judul_sub_menu ?></h1>

									<p class="card-text">
										<?= $i->isi_sub_menu ?>
									</p>

									<a href="<?= base_url() ?>" class="card-link">Home</a>

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
	<?php
	endforeach;
}
foreach ($isi->getResult() as $i) :
	?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container">
				<div class="row mb-0">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark"></h1>
					</div>
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<h1 class="card-title text-bold"><?= $i->judul ?></h1>

								<p class="card-text">
									<?= $i->isi_page ?>
								</p>

								<a href="<?= base_url() ?>" class="card-link">Home</a>

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
<?php endforeach;
$this->endSection();
?>