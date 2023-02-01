<div>
    <nav class="crumbs">
        <ol>
            <li class="crumb"><a href="#">Home</a></li>
            <li class="crumb"><a href="#">Informasi Koleksi</a></li>
            <li class="crumb">Jenis Koleksi Elektronik</li>
        </ol>
    </nav>
    <a href="#buku"><button class="btn">Buku</button></a>
    <a href="#jurnal"><button class="btn">Jurnal</button></a>
    <a href="#prosiding"><button class="btn">Prosiding</button></a>
    <a href="#ta"><button class="btn">Laporan penelitian, Skrisi, Tesis, Disertasi</button></a>
    
 
<div id="buku">
    <h4>Buku : link langganan</h4>
    <?php if(($this->session->userdata('status')=='login')){ ?>
        <button class="btn btn-primary" style="margin-bottom : 10px; float:right" data-toggle="modal" data-target="#tambahebook" data-toggle="tooltip" data-placement="top" title="Tambah Data E-book"><i class="fa fa-plus"></i>Tambah Data</button>
    <?php } ?>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum, nam ratione accusamus veritatis assumenda ipsa tempora accusantium aliquid quasi in delectus nisi inventore libero eaque dolorum omnis asperiores modi aut.</p>
    <iframe class="jframe" src="<?php echo base_url() ?>koleksi/ebook" frameborder="0"></iframe>
</div>
<hr>
<div id="jurnal">
    <h4>Jurnal : online</h4>
    <?php if(($this->session->userdata('status')=='login')){ ?>
        <button class="btn btn-primary" style="margin-bottom : 10px; float:right" data-toggle="modal" data-target="#tambahejournal" data-toggle="tooltip" data-placement="top" title="Tambah Data E-jurnal"><i class="fa fa-plus"></i>Tambah Data</button>
    <?php } ?>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum, nam ratione accusamus veritatis assumenda ipsa tempora accusantium aliquid quasi in delectus nisi inventore libero eaque dolorum omnis asperiores modi aut.</p>
    <iframe class="jframe" src="<?php echo base_url() ?>koleksi/ejournal" frameborder="0"></iframe>
</div>
<hr>
<div id="prosiding">
    <h4>Prosiding : digilib</h4>
    <p>Data Prosiding dapat diakses melalui website Digilib pada
    <a href="https://digilib.uns.ac.id/dokumen/search?q=&jd=10283" target="_blank">Prosiding Digilib</a>
    </p>
</div>
<hr>
<div id="ta">
    <h4>Laporan penelitian, Skrisi, Tesis, Disertasi</h4>
    <p>Data Laporan Tugas Akhir oleh sekolah vokasi dapat diakses melalui website Digilib pada
        <a href="https://digilib.uns.ac.id/dokumen/search?q=&jd=1.1254" target="_blank">Tugas Akhir Digilib</a>
    </p>
    <p>Data Skripsi dapat diakses melalui website Digilib pada
        <a href="https://digilib.uns.ac.id/dokumen/search?q=&jd=261" target="_blank">Skripsi Digilib</a>
    </p>
    <p>Data Tesis dapat diakses melalui website Digilib pada
        <a href="https://digilib.uns.ac.id/dokumen/search?q=&jd=494" target="_blank">Tesis Digilib</a>
    </p>
    <p>Data Disertasi dapat diakses melalui website Digilib pada
        <a href="https://digilib.uns.ac.id/dokumen/search?q=&jd=10189" target="_blank">Disertasi Digilib</a>
    </p>
    
</div>

<div class="modal fade" id="tambahebook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DATA USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'koleksi/tambah_ebook'; ?>">
            <div class="form-group">
                <label>Nama E-Book</label>
                <input type="text" name="nama_ebook" class="form-control">
            </div>
            <div class="form-group">
                <label>Tahun</label>
                <input type="text" name="tahun" class="form-control">
            </div>
            <div class="form-group">
                <label>Link E-Book</label>
                <input type="text" name="link_ebook" class="form-control">
            </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tambahejournal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DATA USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'koleksi/tambah_ejournal'; ?>">
            <div class="form-group">
                <label>Nama E-journal</label>
                <input type="text" name="nama_ejournal" class="form-control">
            </div>
            <div class="form-group">
                <label>Link E-journal</label>
                <input type="text" name="link_ejournal" class="form-control">
            </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

</div>