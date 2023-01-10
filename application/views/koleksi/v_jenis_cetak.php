<div>
    <nav class="crumbs">
        <ol>
            <li class="crumb"><a href="#">Home</a></li>
            <li class="crumb"><a href="#">Informasi Koleksi</a></li>
            <li class="crumb">Jenis Koleksi Cetak</li>
        </ol>
    </nav>
    <a href="#buku"><button class="btn">Buku</button></a>
    <a href="#referensi"><button class="btn">Referensi</button></a>
    <a href="#ta"><button class="btn">Tugas Akhir, Skripsi, Tesis, Disertasi</button></a>
    <a href="#prosiding"><button class="btn">Prosiding</button></a>
    <a href="#jurnal"><button class="btn">Jurnal</button></a>
    <a href="#koran"><button class="btn">Koran dan Majalah</button></a>
<div id="buku">
    <h4>Buku : unsla</h4>
    <p>Data buku dapat diakses melalui website UNSLA pada
        <a href="https://unsla.uns.ac.id/neounsla/index.php?title=&author=&subject=&location=0&colltype=Buku&gmd=0&year-from=&year-until=&searchtype=advance&search=search" target="_blank">Buku UNSLA</a>
    </p>
</div>
<hr>
<div id="referensi">
    <h4>Referensi : unsla</h4>
    <p>Data referensi dapat diakses melalui website UNSLA pada 
        <a href="https://unsla.uns.ac.id/neounsla/index.php?title=&author=&subject=&location=0&colltype=Reference&gmd=0&year-from=&year-until=&searchtype=advance&search=search" target="_blank">Referensi UNSLA</a>
    </p>
</div>
<hr>
<div id="ta" class="anchor">
    <h4>Laporan Tugas Akhir</h4>
    <p>Data Laporan Tugas Akhir oleh sekolah vokasi dapat diakses melalui website UNSLA pada
        <a href="https://unsla.uns.ac.id/neounsla/index.php?title=&author=&subject=&location=0&colltype=TA&gmd=0&year-from=&year-until=&searchtype=advance&search=search" target="_blank">Tugas Akhir UNSLA</a>
    </p>
    <p>Data Skripsi dapat diakses melalui website UNSLA pada
        <a href="https://unsla.uns.ac.id/neounsla/index.php?title=&author=&subject=&location=0&colltype=Skripsi&gmd=0&year-from=&year-until=&searchtype=advance&search=search" target="_blank">Skripsi UNSLA</a>
    </p>
    <p>Data Tesis dapat diakses melalui website UNSLA pada
        <a href="https://unsla.uns.ac.id/neounsla/index.php?title=&author=&subject=&location=0&colltype=Thesis&gmd=0&year-from=&year-until=&searchtype=advance&search=search" target="_blank">Tesis UNSLA</a>
    </p>
    <p>Data Disertasi dapat diakses melalui website UNSLA pada
        <a href="https://unsla.uns.ac.id/neounsla/index.php?title=&author=&subject=&location=0&colltype=Disertasi&gmd=0&year-from=&year-until=&searchtype=advance&search=search" target="_blank">TDisertasi UNSLA</a>
    </p>
    
</div>
<hr>
<div id="prosiding" class="anchor">
    <?php if(($this->session->userdata('status')=='login')){ ?>
    <div style="float:right"><a href="<?= base_url('tambah_prosiding')?>"><button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Data Prosiding">Edit Data</button></a></div>
    <?php } ?>
    <h4>Prosiding : manual</h4>
    <p>Buku</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus ipsum inventore quas, enim pariatur consequatur adipisci laboriosam quo neque eos asperiores harum alias sequi perspiciatis? Totam necessitatibus veniam sunt nisi?</p> 
</div>
<hr>
<div id="jurnal" class="anchor">
    <?php if(($this->session->userdata('status')=='login')){ ?>
    <div style="float:right"><a href="<?= base_url('tambah_jurnal')?>"><button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Data Jurnal">Edit Data</button></a></div>
    <?php } ?>
    <h4>Jurnal : manual</h4>
    <p>Buku</p>
    
</div>
<hr>
<div id="koran" class="anchor">
    <h4>Koran dan Majalah : manual</h4>
    <?php if(($this->session->userdata('status')=='login')){ ?>
        <button class="btn btn-primary" style="margin-bottom : 10px; float:right" data-toggle="modal" data-target="#tambahkoran" data-toggle="tooltip" data-placement="top" title="Tambah Data Koran"><i class="fa fa-plus"></i>Tambah Data</button>
    <?php } ?>
    <p>Koran koran Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum, nam ratione accusamus veritatis assumenda ipsa tempora accusantium aliquid quasi in delectus nisi inventore libero eaque dolorum omnis asperiores modi aut.</p>
    <iframe class="jframe" src="<?php echo base_url() ?>koleksi/koran" frameborder="0"></iframe>
    <?php if(($this->session->userdata('status')=='login')){ ?>
        <button class="btn btn-primary" style="margin-bottom : 10px; float:right" data-toggle="modal" data-target="#tambahmajalah" data-toggle="tooltip" data-placement="top" title="Tambah Data Majalah"><i class="fa fa-plus"></i>Tambah Data</button>
    <?php } ?>
    <p>Majalah</p>
    <iframe class="jframe" src="<?php echo base_url() ?>koleksi/majalah" frameborder="0"></iframe>
    
</div>

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