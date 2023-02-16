<nav class="crumbs">
        <ol>
            <li class="crumb"><a href="#">Home</a></li>
            <li class="crumb"><a href="#">Informasi Koleksi</a></li>
            <li class="crumb">Jenis Koleksi Cetak</li>
        </ol>
    </nav>

<button class="tablink cetak" onclick="openPage('buku', this, 'steelblue')" id="defaultOpen">Buku</button>
<button class="tablink cetak" onclick="openPage('referensi', this, 'steelblue')" >Referensi</button>
<button class="tablink cetak" onclick="openPage('ta', this, 'steelblue')">Tugas Akhir</button>
<button class="tablink cetak" onclick="openPage('prosiding', this, 'steelblue')">Prosiding</button>
<button class="tablink cetak" onclick="openPage('jurnal', this, 'steelblue')">Jurnal</button>
<button class="tablink cetak" onclick="openPage('koran', this, 'steelblue')">Koran</button>
<button class="tablink cetak" onclick="openPage('majalah', this, 'steelblue')">Majalah</button>

<div id="buku" class="tabcontent">
    <h3>Buku</h3>
    <p>Data buku cetak UPT Perpustakaan dan jumlah total buku dapat diakses melalui website UNSLA pada
        <a class="btn btn-custom" href="https://unsla.uns.ac.id/neounsla/index.php?title=&author=&subject=&location=0&colltype=Buku&gmd=0&year-from=&year-until=&searchtype=advance&search=search" target="_blank">Buku UNSLA</a>
    </p>
    <img class="static" src="<?php echo base_url().'assets/files/static/cet_buku.png' ?>"></img>
</div>

<div id="referensi" class="tabcontent">
    <h3>Referensi</h3>
    <p>Data referensi dapat diakses melalui website UNSLA pada 
        <a class="btn btn-custom" href="https://unsla.uns.ac.id/neounsla/index.php?title=&author=&subject=&location=0&colltype=Reference&gmd=0&year-from=&year-until=&searchtype=advance&search=search" target="_blank">Referensi UNSLA</a>
    </p>
    <img class="static" src="<?php echo base_url().'assets/files/static/cet_referensi.png' ?>" alt="">
</div>

<div id="ta" class="tabcontent">
  <h3>Laporan penelitian, Skrisi, Tesis, Disertasi</h3>
  <table class="table" style="width: 80%">
    <tr><td>Data Laporan Tugas Akhir oleh sekolah vokasi dapat diakses melalui website UNSLA pada</td>
        <td style="text-align: center;"><a class="btn btn-custom" href="https://unsla.uns.ac.id/neounsla/index.php?title=&author=&subject=&location=0&colltype=TA&gmd=0&year-from=&year-until=&searchtype=advance&search=search" target="_blank">Tugas Akhir UNSLA</a></td>
    </tr>
    <tr><td>Data Skripsi dapat diakses melalui website UNSLA pada</td>
        <td style="text-align: center;"><a class="btn btn-custom" href="https://unsla.uns.ac.id/neounsla/index.php?title=&author=&subject=&location=0&colltype=Skripsi&gmd=0&year-from=&year-until=&searchtype=advance&search=search" target="_blank">Skripsi UNSLA</a></td>
    </tr>
    <tr><td>Data Tesis dapat diakses melalui website UNSLA pada</td>
        <td style="text-align: center;"><a class="btn btn-custom" href="https://unsla.uns.ac.id/neounsla/index.php?title=&author=&subject=&location=0&colltype=Thesis&gmd=0&year-from=&year-until=&searchtype=advance&search=search" target="_blank">Tesis UNSLA</a></td>
    </tr>
    <tr><td>Data Disertasi dapat diakses melalui website UNSLA pada</td>
        <td style="text-align: center;"><a class="btn btn-custom" href="https://unsla.uns.ac.id/neounsla/index.php?title=&author=&subject=&location=0&colltype=Disertasi&gmd=0&year-from=&year-until=&searchtype=advance&search=search" target="_blank">TDisertasi UNSLA</a></td>
    </tr>
  </table>
</div>

<div id="prosiding" class="tabcontent">
<?php if(($this->session->userdata('status')=='login')){ ?>
    <div style="float:right"><a href="<?= base_url('tambah_prosiding')?>"><button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Data Prosiding">Edit Data</button></a></div>
    <?php } ?>
    <h3>Prosiding</h3>
    <p>Buku</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus ipsum inventore quas, enim pariatur consequatur adipisci laboriosam quo neque eos asperiores harum alias sequi perspiciatis? Totam necessitatibus veniam sunt nisi?</p> 
</div>

<div id="jurnal" class="tabcontent">
    <?php if(($this->session->userdata('status')=='login')){ ?>
    <div style="float:right"><a href="<?= base_url('tambah_jurnal')?>"><button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Data Jurnal">Edit Data</button></a></div>
    <?php } ?>
    <h3>Jurnal</h3>
    <p>Buku</p>
</div>

<div id="koran" class="tabcontent">
<h3>Koran</h3>
    <?php if(($this->session->userdata('status')=='login')){ ?>
        <button class="btn btn-primary" style="margin-bottom : 10px; float:right" data-toggle="modal" data-target="#tambahkoran" data-toggle="tooltip" data-placement="top" title="Tambah Data Koran"><i class="fa fa-plus"></i>Tambah Data</button>
    <?php } ?>
    <iframe class="hframe" src="<?php echo base_url() ?>koleksi/koran" frameborder="0"></iframe>
</div>

<div id="majalah" class="tabcontent">
<h3>Majalah</h3>
    <?php if(($this->session->userdata('status')=='login')){ ?>
        <button class="btn btn-primary" style="margin-bottom : 10px; float:right" data-toggle="modal" data-target="#tambahmajalah" data-toggle="tooltip" data-placement="top" title="Tambah Data Majalah"><i class="fa fa-plus"></i>Tambah Data</button>
    <?php } ?>
    <iframe class="hframe" src="<?php echo base_url() ?>koleksi/majalah" frameborder="0"></iframe>
</div>
<?php if($this->session->userdata('status')== 'login'){ ?>
<div class="modal fade" id="tambahkoran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DATA USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'koleksi/tambah_koran'; ?>">
            <div class="form-group">
                <label>Nama Koran</label>
                <input type="text" name="nama_koran" class="form-control">
            </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tambahmajalah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DATA USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'koleksi/tambah_majalah'; ?>">
        <div class="form-group">
            <label>Nama Majalah</label>
            <input type="text" name="nama_majalah" class="form-control">
        </div>
        <div class="form-group">
            <label>Tahun Dari</label>
            <input type="text" name="tahun_dari" class="form-control">
        </div>
        <div class="form-group">
            <label>Tahun Hingga</label>
            <input type="text" name="tahun_hingga" class="form-control">
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<?php } ?>