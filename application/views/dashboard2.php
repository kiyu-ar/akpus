<html>
    <head>
    <title>NAMA WEBSITE</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta http-equiv="refresh" content="120">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
    </head>
    <body>
        <h4>xyz</h4>
        <div>
        <div class="dashboard-section">
            <div class="panel-cont">
				<div class="row justify-content-between">
						<!-- <div class="col-md-3"> -->
							<!-- TRAFFIC SOURCES -->
							<!-- <div class="panel-content"> -->
								<!-- <h2 class="heading"><i class="fa fa-square"></i> Traffic Sources</h2> -->
								<!-- <div id="demo-pie-chart" class="ct-chart"></div> -->
								<!-- <h1>35</h1> -->
							<!-- </div> -->
							<!-- END TRAFFIC SOURCES -->
						<!-- </div> -->
						<div class="col-md-2">
							<!-- TRAFFIC SOURCES -->
							<div class="panel-content">
								<h2 class="heading"><i class="fa fa-square"></i>Peminjam terbanyak bulan ini</h2>
								<ul class="list-unstyled list-referrals">
									<li>
										<p><span class="value"><?php echo $jumlah_top[0]?></span><span class="text-muted"><?php echo $prodi_top[0]?></span></p>
										<div class="progress progress-xs progress-transparent custom-color-blue">
											<div class="progress-bar" data-transitiongoal="<?php echo $jumlah_top[0]?>"></div>
										</div>
									</li>
									<li>
										<p><span class="value"><?php echo $jumlah_top[1]?></span><span class="text-muted"><?php echo $prodi_top[1]?></span></p>
										<div class="progress progress-xs progress-transparent custom-color-purple">
											<div class="progress-bar" data-transitiongoal="<?php echo $jumlah_top[1]?>"></div>
										</div>
									</li>
									<li>
										<p><span class="value"><?php echo $jumlah_top[2]?></span><span class="text-muted"><?php echo $prodi_top[2]?></span></p>
										<div class="progress progress-xs progress-transparent custom-color-green">
											<div class="progress-bar" data-transitiongoal="<?php echo $jumlah_top[2]?>"></div>
										</div>
									</li>
									<li>
										<p><span class="value"><?php echo $jumlah_top[3]?></span><span class="text-muted"><?php echo $prodi_top[3]?></span></p>
										<div class="progress progress-xs progress-transparent custom-color-yellow">
											<div class="progress-bar" data-transitiongoal="<?php echo $jumlah_top[3]?>"></div>
										</div>
									</li>
									<li>
										<p><span class="value"><?php echo $jumlah_top[4]?></span><span class="text-muted"><?php echo $prodi_top[4]?></span></p>
										<div class="progress progress-xs progress-transparent custom-color-red">
											<div class="progress-bar" data-transitiongoal="<?php echo $jumlah_top[4]?>"></div>
										</div>
									</li>
								</ul>
							</div>
							<!-- END TRAFFIC SOURCES -->
						</div>
						<div class="col-md-2">
							<!-- REFERRALS -->
							<div class="panel-content">
								<h2 class="heading"><i class="fa fa-square"></i>Prodi dengan peminjaman terbanyak Bulan ini</h2>
								<ul class="list-unstyled list-referrals">
									<li>
										<p><span class="value"><?php echo $jumlah_top[0]?></span><span class="text-muted"><?php echo $prodi_top[0]?></span></p>
										<div class="progress progress-xs progress-transparent custom-color-blue">
											<div class="progress-bar" data-transitiongoal="<?php echo $jumlah_top[0]?>"></div>
										</div>
									</li>
									<li>
										<p><span class="value"><?php echo $jumlah_top[1]?></span><span class="text-muted"><?php echo $prodi_top[1]?></span></p>
										<div class="progress progress-xs progress-transparent custom-color-purple">
											<div class="progress-bar" data-transitiongoal="<?php echo $jumlah_top[1]?>"></div>
										</div>
									</li>
									<li>
										<p><span class="value"><?php echo $jumlah_top[2]?></span><span class="text-muted"><?php echo $prodi_top[2]?></span></p>
										<div class="progress progress-xs progress-transparent custom-color-green">
											<div class="progress-bar" data-transitiongoal="<?php echo $jumlah_top[2]?>"></div>
										</div>
									</li>
									<li>
										<p><span class="value"><?php echo $jumlah_top[3]?></span><span class="text-muted"><?php echo $prodi_top[3]?></span></p>
										<div class="progress progress-xs progress-transparent custom-color-yellow">
											<div class="progress-bar" data-transitiongoal="<?php echo $jumlah_top[3]?>"></div>
										</div>
									</li>
									<li>
										<p><span class="value"><?php echo $jumlah_top[4]?></span><span class="text-muted"><?php echo $prodi_top[4]?></span></p>
										<div class="progress progress-xs progress-transparent custom-color-red">
											<div class="progress-bar" data-transitiongoal="<?php echo $jumlah_top[4]?>"></div>
										</div>
									</li>
								</ul>
							</div>
							<!-- END REFERRALS -->
						</div>
						<div class="col-md-2">
							<!-- TRAFFIC SOURCES -->
							<div class="panel-content">
								<h2 class="heading"><i class="fa fa-square"></i>Pengunjung terbanyak Bulan ini</h2>
								<!-- <div id="demo-pie-chart" class="ct-chart"></div> -->
								<h1>35</h1>
							</div>
							<!-- END TRAFFIC SOURCES -->
						</div>
						<div class="col-md-2">
							<div class="panel-content">
								<!-- BROWSERS -->
								<h2 class="heading"><i class="fa fa-square"></i>Prodi dengan kunjungan terbanyak Bulan ini</h2>
								<div class="table-responsive">
									<table class="table no-margin">
										<thead>
											<tr>
												<th>Browsers</th>
												<th>Sessions</th>
												<th>% Sessions</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Chrome</td>
												<td>1,756</td>
												<td>23%</td>
											</tr>
											<tr>
												<td>Firefox</td>
												<td>1,379</td>
												<td>14%</td>
											</tr>
											<tr>
												<td>Safari</td>
												<td>1,100</td>
												<td>17%</td>
											</tr>
											<tr>
												<td>Edge</td>
												<td>982</td>
												<td>25%</td>
											</tr>
											<tr>
												<td>Opera</td>
												<td>967</td>
												<td>19%</td>
											</tr>
											<tr>
												<td>IE</td>
												<td>896</td>
												<td>12%</td>
											</tr>
											<tr>
												<td>Android Browser</td>
												<td>752</td>
												<td>27%</td>
											</tr>
										</tbody>
									</table>
								</div>
								<!-- END BROWSERS -->
							</div>
						</div>--
					</div>
				</div>
				</div>
        </div>
    </body>
    <footer>
        <script>

        </script>
    </footer>
</html>