		<!-- LEFT SIDEBAR -->
		<div id="left-sidebar" class="sidebar" style="">
			<button type="button" class="btn btn-xs btn-link btn-toggle-fullwidth">
				<span class="sr-only">Toggle Fullwidth</span>
				<i class="fa fa-angle-left"></i>
			</button>
			<div class="sidebar-scroll">
				<div class="user-account">
					<?php if($this->session->userdata('status') != 'login'){ ?>
						<form action="<?= base_url('user/login')?>"><button class="btn login-button" type="submit">Login</button></form>
					<?php } else {?>
					<div class="dropdown">
						<a href="#" class="dropdown-toggle user-name" data-toggle="dropdown">Hello, <strong><?php echo $this->session->userdata('nama') ?></strong> <i class="fa fa-caret-down"></i></a>
						<ul class="dropdown-menu dropdown-menu-right account">
							<li><a href="#">My Profile</a></li>
							<li><a href="#">Messages</a></li>
							<li><a href="#">Settings</a></li>
							<li class="divider"></li>
							<li><a href="<?= base_url('user/logout')?>">Logout</a></li>
						</ul>
					</div>
					<?php } ?>
				</div>
				<nav id="left-sidebar-nav" class="sidebar-nav">
					<ul id="main-menu" class="metismenu">
						<?php if(($this->session->userdata('akses')=='0')||($this->session->userdata('akses') == '1')){ ?>
						<li id="user"><a href="<?= base_url('user')?>"><i class="lnr lnr-home"></i> <span>Kelola User</span></a></li>
						<?php } ?>
						<li id="home"><a href="<?= base_url()?>"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li class="">
							<a href="" class="has-arrow" aria-expanded="false"><i class="lnr lnr-book"></i> <span>INFORMASI KOLEKSI</span></a>
							<ul id="koleksi" aria-expanded="true">
								<li id ="pengadaan" class=""><a href="<?= base_url('koleksi/pengadaan')?>">Data Pengadaan</a></li>
								<li id ="jeniscetak"><a href="<?= base_url('koleksi/jeniscetak')?>">Jenis Koleksi Cetak</a></li>
								<li id ="jeniselektronik"><a href="<?= base_url('koleksi/jeniselektronik')?>">Jenis Koleksi Elektronik</a></li>
								<li id ="statistik"><a href="<?= base_url('koleksi/statistik')?>">Data Statistik</a></li>
								<li id ="metadata"><a href="<?= base_url('koleksi/metadata')?>">Metadata Export</a></li>
							</ul>
						</li>
						<li class="">
							<a href="" class="has-arrow" aria-expanded="false"><i class="lnr lnr-users"></i> <span>INFORMASI PEMUSTAKA</span></a>
							<ul id="pemustaka" aria-expanded="true">
								<li id ="keanggotaan"><a href="<?= base_url('pemustaka/keanggotaan')?>">Data Keanggotaan</a></li>
								<li id ="kunjungan"><a href="<?= base_url('pemustaka/kunjungan')?>">Data Kunjungan Fisik</a></li>
								<li id ="eresource"><a href="<?= base_url('pemustaka/eresource')?>">Data Akses E-Resources dan Virtual Visit</a></li>
								<li id ="sirkulasi"><a href="<?= base_url('pemustaka/sirkulasi')?>">Data Sirkulasi</a></li>
								<li id ="literasi"><a href="<?= base_url('pemustaka/literasi')?>">Data Literasi</a></li>
								<li id ="mandiri"><a href="<?= base_url('pemustaka/mandiri')?>">Data Unggah Mandiri</a></li>
							</ul>
						</li>
						<li class="">
							<a href="" class="has-arrow" aria-expanded="false"><i class="lnr lnr-chart-bars"></i> <span>INFORMASI PUSTAKAWAN/STAF</span></a>
							<ul id="pustakawan" aria-expanded="true">
								<li id ="pstatistik"><a href="<?= base_url('pustakawan/pstatistik')?>">Data Statistik</a></li>
								<li id ="sdm"><a href="<?= base_url('pustakawan/sdm')?>">Data Pengembangan SDM</a></li>
							</ul>
						</li>
						<li class="">
							<a href="" class="has-arrow" aria-expanded="false"><i class="lnr lnr-layers"></i> <span>INFORMASI LAIN</span></a>
							<ul id="lain" aria-expanded="true">
								<li id ="sarpras"><a href="<?= base_url('lain/sarpras')?>">Data Sarana dan Prasarana</a></li>
								<li id ="kuesioner"><a href="<?= base_url('lain/kuesioner')?>">Data Kuesioner</a></li>
								<li id ="promosi"><a href="<?= base_url('lain/promosi')?>">Data Promosi</a></li>
								<li id ="restools"><a href="<?= base_url('lain/restools')?>">Data Research Tools</a></li>
								<li id ="anggaran"><a href="<?= base_url('lain/anggaran')?>">Data Anggaran</a></li>
								<li id ="kerjasama"><a href="<?= base_url('lain/kerjasama')?>">Data Kerjasama</a></li>
								<li id ="penguat"><a href="<?= base_url('lain/penguat')?>">Komponen Penguat</a></li>
							</ul>
						</li>
						<li class="">
							<a href="#charts" class="has-arrow" aria-expanded="false"><i class="lnr lnr-chart-bars"></i> <span>INFORMASI SOP</span></a>
							<ul id="sop" aria-expanded="true">
								<li id ="pengolahan"><a href="<?= base_url('sop/pengolahan')?>">SOP Pengolahan</a></li>
								<li id ="lain"><a href="<?= base_url('sop/lain')?>">SOP Lain-lain</a></li>
							</ul>
						<!-- <li class=""><a href="notifications.html"><i class="lnr lnr-alarm"></i> <span>Notifications</span> <span class="badge bg-danger">15</span></a></li>
						<li class=""><a href="typography.html"><i class="lnr lnr-text-format"></i> <span>Typography</span></a></li> -->
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
                <!-- MAIN CONTENT -->
				
		<div id="main-content">
			<div class="container-fluid">