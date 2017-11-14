<section role="main" class="content-body">
	<header class="page-header">
		<h2>Daftar Angsuran</h2>
	
		<div class="right-wrapper pull-right mr-xl">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo $this->config->item('link_home'); ?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Pinjaman</span></li>
				<li><span>Daftar Angsuran</span></li>
			</ol>
		</div>
	</header>
	<!-- start: page -->
	<div class="row" id="angsuran_lists_page">
		<div class="col-md-6 col-lg-12 col-xl-6">
			<section class="panel">
				<div class="panel-body">
					<form role="form" class="form-horizontal mb-xl mt-xs mr-xs" id="form_lists">
                        <div class="form-body">
							<div class="row">
								<div class="col-md-3">
									<select class="form-control" name="status" id="status">
										<option value="">-- All Status --</option>
										<?php
										foreach ($code_angsuran_status as $key => $val)
										{
											if ($status == $key)
											{
												echo '<option value="'.$key.'"'.set_select('status', $key, TRUE).'>'.$val.'</option>';
											}
											else
											{
												echo '<option value="'.$key.'"'.set_select('status', $key).'>'.$val.'</option>';
											}
										} ?>
									</select>
								</div>
                                <div class="col-sm-1">
                                    <input type="submit" class="btn btn-primary" value="Submit" />
                                </div>
							</div>
						</div>
					</form>
					<div id="multipleTable"></div>
				</div>
			</section>
		</div>
	</div>
