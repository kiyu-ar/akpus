<nav class="crumbs">
  <ol>
    <li class="crumb"><a href="<?= base_url() ?>">Home</a></li>
    <li class="crumb"><a href="#">Informasi Koleksi</a></li>
    <li class="crumb">Data Pengadaan</li>
  </ol>
</nav>
<div>
  <div>
    <h4>Request Koleksi dari Web, Formulir, atau Wawancara</h4>
    <p>Pengunjung dapat melakukan request koleksi dengan mengimportkan file dalam bentuk excel, sebelumnya pengunjung diwajibkan untuk mendownload template format excel yang tersedia di bawah, lalu kemudian pengunjung dapat menguploadnya di bagian import file</p>
  </div>
  <a class="btn btn-success" href="<?php echo base_url('importexcel/download_template'); ?>" target="_blank">Download Format Excel</a>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Import File
  </button>
  <br>
  <?php
  if ($this->session->flashdata('message')) {
    echo $this->session->flashdata('message');
  }
  ?>
  <hr>
  <div>
    <h4>Rekapitulasi permintaan buku melalui surat ke Prodi</h4>
    <p>Berikut merupakan data permintaan buku yang ada melalui surat yang telah dikirimkan kepada prodi</p>
  </div>
  <?php if($akses == '0' || $akses == '1'){ ?>
    <a class="btn btn-primary" href="<?php echo base_url('importexcel/export_excel'); ?>" target="_blank">Export Excel</a>
  <?php }?>
  <br>
  <div style="overflow-x: auto;">
    <table id="themed">
      <thead>
        <tr style="background:#CCC">
          <th>No</th>
          <th>Nama Pengusul</th>
          <th>Fakultas</th>
          <th>Program Studi</th>
          <th>Judul Buku</th>
          <th>Nama Pengarang</th>
          <th>Penerbit</th>
          <th>Tahun Publikasi</th>
          <th>ISBN</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        foreach ($ab as $row) {
        ?><tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row->nama; ?></td>
            <td><?php echo $row->fakultas; ?></td>
            <td><?php echo $row->program_studi; ?></td>
            <td><?php echo $row->judul_buku; ?></td>
            <td><?php echo $row->nama_pengarang; ?></td>
            <td><?php echo $row->penerbit; ?></td>
            <td><?php echo $row->tahun_publikasi; ?></td>
            <td><?php echo $row->isbn; ?></td>
            <?php $i++ ?>
          </tr>
        <?php }
        ?>
      </tbody>
    </table>
  </div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Import File Excel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?php echo base_url('importexcel/import_excel') ?>" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label class="col-form-label text-md-left">Masukkan file yang akan diupload</label>
                    <input type="file" class="form-control" name="file" accept=".xls, .xlsx" required>
                    <div class="mt-1">
                      <span class="text-secondary">File yang harus diupload : .xls, xlsx</span>
                    </div>
                    <?= form_error('file', '<div class="text-danger">', '</div>') ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Upload</button>
      </div>
      </form>
    </div>
  </div>
</div>