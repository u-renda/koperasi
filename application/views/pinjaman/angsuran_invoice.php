<section role="main" class="content-body">
	<header class="page-header">
		<h2>Bukti Pembayaran Angsuran</h2>
	
		<div class="right-wrapper pull-right mr-xl">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo $this->config->item('link_home'); ?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Pinjaman</span></li>
				<li><span>Bukti Pembayaran Angsuran</span></li>
			</ol>
		</div>
	</header>

	<!-- start: page -->

	<section class="panel">
		<div class="panel-body">
			<div class="invoice">
				<header class="clearfix">
					<div class="row">
						<div class="col-sm-6 mt-md">
							<h2 class="h2 mt-none mb-sm text-dark text-bold">BUKTI PEMBAYARAN</h2>
							<h4 class="h4 m-none text-dark text-bold"><?php echo '#'.$angsuran->no_angsuran; ?></h4>
						</div>
						<div class="col-sm-6 text-right mt-md mb-md">
							<address class="ib mr-xlg">
								<?php echo $this->config->item('title'); ?>
								<br/>
								<?php echo $this->config->item('alamat'); ?>
								<br/>
								<?php echo 'Telp:'.$this->config->item('telp'); ?>
							</address>
							<div class="ib">
								<img src="<?php echo base_url('assets/images').'/logo.png'; ?>" alt="<?php echo $this->config->item('title'); ?>" />
							</div>
						</div>
					</div>
				</header>
				<div class="bill-info mb-sm">
					<div class="row">
						<div class="col-md-6">
							<div class="bill-data text-dark">
								<p class="mb-none">
									<span class="h5 mb-xs text-semibold">No. Angsuran:</span>
									<span class="value"><?php echo $angsuran->no_angsuran; ?></span>
								</p>
								<p class="mb-none">
									<span class="h5 mb-xs text-semibold">No. Anggota:</span>
									<span class="value"><?php echo $anggota->no_anggota; ?></span>
								</p>
								<p class="mb-none">
									<span class="h5 mb-xs text-semibold">Diterima Dari:</span>
									<span class="value"><?php echo $anggota->nama; ?></span>
								</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="bill-data text-right">
								<p class="mb-none">
									<span class="text-dark">Pembayaran ke:</span>
									<span class="value"><?php echo $angsuran->angsuran_ke; ?></span>
								</p>
								<p class="mb-none">
									<span class="text-dark">Tanggal:</span>
									<span class="value"><?php echo date('d M Y', strtotime($angsuran->tgl_angsuran)); ?></span>
								</p>
							</div>
						</div>
					</div>
				</div>
			
				<div class="table-responsive">
					<table class="table invoice-items">
						<thead>
							<tr class="h4 text-dark">
								<th id="cell-desc" class="text-semibold">Keterangan</th>
								<th id="cell-price" class="text-center text-semibold"></th>
								<th id="cell-total" class="text-center text-semibold"></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Pinjaman Pokok</td>
								<td class="text-center"><?php echo 'Rp '.number_format($angsuran->pokok, 0, ',', '.'); ?></td>
								<td class="text-center"></td>
							</tr>
							<tr>
								<td>Bunga</td>
								<td class="text-center"><?php echo 'Rp '.number_format($angsuran->pokok, 0, ',', '.'); ?></td>
								<td class="text-center"></td>
							</tr>
						</tbody>
					</table>
				</div>
			
				<div class="invoice-summary">
					<div class="row">
						<div class="col-sm-5 col-sm-offset-7">
							<table class="table h5 text-dark">
								<tbody>
									<tr class="b-top-none h4">
										<td colspan="2">Jumlah Angsuran</td>
										<td class="text-left"><?php echo 'Rp '.number_format($angsuran->jumlah_angsuran, 0, ',', '.'); ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="text-right mr-lg">
				<a href="<?php echo $this->config->item('link_angsuran_print').'?id_angsuran='.$angsuran->id_angsuran; ?>" target="_blank" class="btn btn-primary ml-sm"><i class="fa fa-print"></i> Print</a>
			</div>
		</div>
	</section>
