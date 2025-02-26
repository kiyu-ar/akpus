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
  <?php //var_dump($top); //echo $jumlah_top[1] ?>
<div>
<h1 class="sr-only">Dashboard</h1>
				<!-- WEBSITE ANALYTICS -->
				<div class="dashboard-section">
				<div class="section-heading clearfix">
						<h2 class="section-title"><i class="fa fa-pie-chart"></i> Statistik UPT Perpustakaan</h2>
					</div>
					<div class="panel-cont">
						<div class="row">
							<div class="col-md-3 col-sm-6">
								<div class="number-chart">
									<div class="mini-stat">
										<div id="number-chart1" class="inlinesparkline">23,65,89,32,67,38,63,12,34,22</div>
										<p class="text-muted"><i class="fa fa-caret-up text-success"></i> 19% compared to last week</p>
									</div>
									<div class="number"><span>$22,500</span> <span>EARNINGS</span></div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="number-chart">
									<div class="mini-stat">
										<div id="number-chart2" class="inlinesparkline">77,44,10,80,88,87,19,59,83,88</div>
										<p class="text-muted"><i class="fa fa-caret-up text-success"></i> 24% compared to last week</p>
									</div>
									<div class="number"><span>245</span> <span>SALES</span></div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="number-chart">
									<div class="mini-stat">
										<div id="number-chart3" class="inlinesparkline">99,86,31,72,62,94,50,18,74,18</div>
										<p class="text-muted"><i class="fa fa-caret-up text-success"></i> 44% compared to last week</p>
									</div>
									<div class="number"><span>561,724</span> <span>VISITS</span></div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="number-chart">
									<div class="mini-stat">
										<div id="number-chart4" class="inlinesparkline">1000,44,70,21,86,54,90,25,83,42</div>
										<p class="text-muted"><i class="fa fa-caret-down text-danger"></i> 6% compared to last week</p>
									</div>
									<div class="number"><span>372,500</span> <span>LIKES</span></div>
								</div>
							</div>
						</div>
					</div>
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
						<div class="col-md-3">
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
						<div class="col-md-3">
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
						<div class="col-md-3">
							<!-- TRAFFIC SOURCES -->
							<div class="panel-content">
								<h2 class="heading"><i class="fa fa-square"></i>Pengunjung terbanyak Bulan ini</h2>
								<!-- <div id="demo-pie-chart" class="ct-chart"></div> -->
								<h1>35</h1>
							</div>
							<!-- END TRAFFIC SOURCES -->
						</div>
						<div class="col-md-3">
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
						</div>
					</div>
				</div>
				</div>
				<!-- END WEBSITE ANALYTICS -->
				<!-- SALES SUMMARY -->
				<div class="dashboard-section">
					<div class="section-heading clearfix">
						<h2 class="section-title"><i class="fa fa-shopping-basket"></i> Sales Summary</h2>
						<a href="#" class="right">View Sales Reports</a>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="panel-content">
								<h3 class="heading"><i class="fa fa-square"></i> Today</h3>
								<ul class="list-unstyled list-justify large-number">
									<li class="clearfix">Earnings <span>$215</span></li>
									<li class="clearfix">Sales <span>47</span></li>
								</ul>
							</div>
						</div>
						<div class="col-md-9">
							<div class="panel-content">
								<h3 class="heading"><i class="fa fa-square"></i> Sales Performance</h3>
								<div class="row">
									<div class="col-md-6">
										<table class="table">
											<thead>
												<tr>
													<th>&nbsp;</th>
													<th>Last Week</th>
													<th>This Week</th>
													<th>Change</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th>Earnings</th>
													<td>$2752</td>
													<td><span class="text-info">$3854</span></td>
													<td><span class="text-success">40.04%</span></td>
												</tr>
												<tr>
													<th>Sales</th>
													<td>243</td>
													<td>
														<div class="text-info">322</div>
													</td>
													<td><span class="text-success">32.51%</span></td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="col-md-6">
										<div id="chart-sales-performance">Loading ...</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="panel-content">
								<h3 class="heading"><i class="fa fa-square"></i> Recent Purchases</h3>
								<div class="table-responsive">
									<table class="table table-striped no-margin">
										<thead>
											<tr>
												<th>Order No.</th>
												<th>Name</th>
												<th>Amount</th>
												<th>Date &amp; Time</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><a href="#">763648</a></td>
												<td>Steve</td>
												<td>$122</td>
												<td>Oct 21, 2016</td>
												<td><span class="label label-success">COMPLETED</span></td>
											</tr>
											<tr>
												<td><a href="#">763649</a></td>
												<td>Amber</td>
												<td>$62</td>
												<td>Oct 21, 2016</td>
												<td><span class="label label-warning">PENDING</span></td>
											</tr>
											<tr>
												<td><a href="#">763650</a></td>
												<td>Michael</td>
												<td>$34</td>
												<td>Oct 18, 2016</td>
												<td><span class="label label-danger">FAILED</span></td>
											</tr>
											<tr>
												<td><a href="#">763651</a></td>
												<td>Roger</td>
												<td>$186</td>
												<td>Oct 17, 2016</td>
												<td><span class="label label-success">SUCCESS</span></td>
											</tr>
											<tr>
												<td><a href="#">763652</a></td>
												<td>Smith</td>
												<td>$362</td>
												<td>Oct 16, 2016</td>
												<td><span class="label label-success">SUCCESS</span></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="panel-content">
								<h3 class="heading"><i class="fa fa-square"></i> Top Products</h3>
								<div id="chart-top-products" class="chartist"></div>
							</div>
						</div>
					</div>
				</div>
				<!-- END SALES SUMMARY -->
				<!-- CAMPAIGN -->
				<div class="dashboard-section">
					<div class="section-heading clearfix">
						<h2 class="section-title"><i class="fa fa-flag-checkered"></i> Campaign</h2>
						<a href="#" class="right">View All Campaigns</a>
					</div>
					<div class="panel-content">
						<div class="row margin-bottom-15">
							<div class="col-md-8 col-sm-7 left">
								<div id="demo-line-chart" class="ct-chart"></div>
							</div>
							<div class="col-md-4 col-sm-5 right">
								<div class="row margin-bottom-30">
									<div class="col-xs-4">
										<p class="text-right text-larger"><span class="text-muted">Impression</span>
											<br><strong>32,743</strong></p>
									</div>
									<div class="col-xs-4">
										<p class="text-right text-larger"><span class="text-muted">Clicks</span>
											<br><strong>1423</strong></p>
									</div>
									<div class="col-xs-4">
										<p class="text-right text-larger"><span class="text-muted">CTR</span>
											<br><strong>4,34%</strong></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<p class="text-right text-larger"><span class="text-muted">Cost</span>
											<br><strong>$42.69</strong></p>
									</div>
									<div class="col-xs-4">
										<p class="text-right text-larger"><span class="text-muted">CPC</span>
											<br><strong>$0,03</strong></p>
									</div>
									<div class="col-xs-4">
										<p class="text-right text-larger"><span class="text-muted">Budget</span>
											<br><strong>$200</strong></p>
									</div>
								</div>
							</div>
						</div>
						<div class="action-buttons">
							<a href="#" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Budget</a> <a href="#" class="btn btn-default"><i class="fa fa-file-text-o"></i> View Campaign Details</a>
						</div>
					</div>
				</div>
				<!-- END CAMPAIGN -->
				<!-- SOCIAL -->
				<div class="dashboard-section no-margin">
					<div class="section-heading clearfix">
						<h2 class="section-title"><i class="fa fa-user-circle"></i> Social <span class="section-subtitle">(7 days report)</span></h2>
						<a href="#" class="right">View Social Reports</a>
					</div>
					<div class="panel-content">
						<div class="row">
							<div class="col-md-3 col-sm-6">
								<p class="metric-inline"><i class="fa fa-thumbs-o-up"></i> +636 <span>LIKES</span></p>
							</div>
							<div class="col-md-3 col-sm-6">
								<p class="metric-inline"><i class="fa fa-reply-all"></i> +528 <span>FOLLOWERS</span></p>
							</div>
							<div class="col-md-3 col-sm-6">
								<p class="metric-inline"><i class="fa fa-envelope-o"></i> +1065 <span>SUBSCRIBERS</span></p>
							</div>
							<div class="col-md-3 col-sm-6">
								<p class="metric-inline"><i class="fa fa-user-circle-o"></i> +201 <span>USERS</span></p>
							</div>
						</div>
					</div>
				</div>
</div>