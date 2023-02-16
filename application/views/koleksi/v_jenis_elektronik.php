
<button class="tablink elektronik" onclick="openPage('buku', this, 'steelblue')" id="defaultOpen">Buku</button>
<button class="tablink elektronik" onclick="openPage('jurnal', this, 'steelblue')" >Jurnal</button>
<button class="tablink elektronik" onclick="openPage('prosiding', this, 'steelblue')">Prosiding</button>
<button class="tablink elektronik" onclick="openPage('ta', this, 'steelblue')">Tugas Akhir</button>

<div id="buku" class="tabcontent">
    <h3>Buku</h3>
    <?php if(($this->session->userdata('status')=='login')){ ?>
        <button class="btn btn-primary" style="margin-bottom : 10px; float:right" data-toggle="modal" data-target="#tambahebook" data-toggle="tooltip" data-placement="top" title="Tambah Data E-book"><i class="fa fa-plus"></i>Tambah Data</button>
    <?php } ?>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum, nam ratione accusamus veritatis assumenda ipsa tempora accusantium aliquid quasi in delectus nisi inventore libero eaque dolorum omnis asperiores modi aut.</p>
    <iframe class="hframe" src="<?php echo base_url() ?>koleksi/ebook" frameborder="0"></iframe>
</div>

<div id="jurnal" class="tabcontent">
    <h3>Jurnal</h3>
    <?php if(($this->session->userdata('status')=='login')){ ?>
        <button class="btn btn-primary" style="margin-bottom : 10px; float:right" data-toggle="modal" data-target="#tambahejournal" data-toggle="tooltip" data-placement="top" title="Tambah Data E-jurnal"><i class="fa fa-plus"></i>Tambah Data</button>
    <?php } ?>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum, nam ratione accusamus veritatis assumenda ipsa tempora accusantium aliquid quasi in delectus nisi inventore libero eaque dolorum omnis asperiores modi aut.</p>
    <iframe class="hframe" src="<?php echo base_url() ?>koleksi/ejournal" frameborder="0"></iframe>
</div>

<div id="prosiding" class="tabcontent">
    <h3>Prosiding</h3>
    <p>Data Prosiding dapat diakses melalui website Digilib pada
    <a class="btn btn-custom" href="https://digilib.uns.ac.id/dokumen/search?q=&jd=10283" target="_blank">Prosiding Digilib</a>
    </p>
    <img class="static" src="<?php echo base_url().'assets/files/static/ele_prosiding.png'?>">
</div>

<div id="ta" class="tabcontent">
<h3>Laporan penelitian, Skrisi, Tesis, Disertasi</h3>
  <table class="table" style="width: 80%">
    <tr><td>Data Laporan Tugas Akhir oleh sekolah vokasi dapat diakses melalui website Digilib pada</td>
        <td style="text-align: center;"><a class="btn btn-custom" href="https://digilib.uns.ac.id/dokumen/search?q=&jd=1.1254" target="_blank">Tugas Akhir Digilib</a></td>
    </tr>
    <tr><td>Data Skripsi dapat diakses melalui website Digilib pada</td>
        <td style="text-align: center;"><a class="btn btn-custom" href="https://digilib.uns.ac.id/dokumen/search?q=&jd=261" target="_blank">Skripsi Digilib</a></td>
    </tr>
    <tr><td>Data Tesis dapat diakses melalui website Digilib pada</td>
        <td style="text-align: center;"><a class="btn btn-custom" href="https://digilib.uns.ac.id/dokumen/search?q=&jd=494" target="_blank">Tesis Digilib</a></td>
    </tr>
    <tr><td>Data Disertasi dapat diakses melalui website Digilib pada</td>
        <td style="text-align: center;"><a class="btn btn-custom" href="https://digilib.uns.ac.id/dokumen/search?q=&jd=10189" target="_blank">Disertasi Digilib</a></td>
    </tr>
  <table>
</div>


<!-- modal -->
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