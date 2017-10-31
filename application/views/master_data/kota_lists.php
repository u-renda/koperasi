<section role="main" class="content-body">
	<header class="page-header">
		<h2>Provinsi & Kota</h2>
	
		<div class="right-wrapper pull-right mr-xl">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo $this->config->item('link_home'); ?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Master Data</span></li>
				<li><span>Provinsi & Kota</span></li>
			</ol>
		</div>
	</header>
	<!-- start: page -->
	<div class="row" id="kota_lists_page" data-program="<?php echo $result->id_provinsi; ?>">
		<div class="col-md-6 col-lg-12 col-xl-6">
			<section class="panel">
				<div class="panel-body">
					<h4>Daftar kota di provinsi <?php echo $result->nama; ?></h4>
					<button type="button" class="mb-xl mt-xs mr-xs btn btn-primary">
						<i class="fa fa-plus"></i> Tambah Baru
					</button>
					<a type="button" class="mb-xl mt-xs mr-xs btn btn-default" href="<?php echo $this->config->item('link_provinsi_lists'); ?>">
						Kembali
					</a>
					<div id="multipleTable"></div>
				</div>
			</section>
		</div>
	</div>
