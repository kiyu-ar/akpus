<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color: #E1EEDD;">
            <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Informasi SOP</a></li>
            <li class="breadcrumb-item active" aria-current="page">SOP Pengolahan</li>
        </ol>
    </nav>
<div>
<?php $kolom=0;
if($this->session->userdata('status')=="login"){ ?>
<div style="float:left;">
  <button class="btn btn-primary" style="margin-bottom : 10px" data-toggle="modal" data-target="#tambahsop"><i class="fa fa-plus"></i>Tambah SOP</button>
  <button class="btn btn-success" style="margin-bottom : 10px" data-toggle="modal" data-target="#tambahdivisi"><i class="fa fa-plus"></i>Tambah Divisi</button>
</div>
<?php } ?>
<div style="float:right;">
  <form action="" method="GET" style="flex-direction: row; width:360px">
      <div class="form-group">
        <input class="search-right" type="text" name="keyword" placeholder="SOP/Deskripsi/Divisi" value="<?= html_escape($keyword) ?>">
        <input type="submit" value="Cari" class="btn btn-primary">
      </div>
  </form>
</div>
<div >
    <?php foreach ($sop as $row) : ?>
      <?php 
        if($kolom != $row->id_divisi){ 
        if($kolom != 0){?></table> <hr> <?php } ?>
        <h4>Divisi <?php echo $row->divisi; ?> </h4>
        <table class="table table-bordered"> 
        <tr>
            <th style="width:5%">NO</th>
            <th style="width:30%">Nama SOP</th>
            <th style="">Deskripsi</th>
            <?php if($this->session->userdata('status')=="login"){ ?>
              <th colspan=3 style="width:115px">AKSI</th>
            <?php } ?>
        </tr>
      <?php $kolom = $row->id_divisi; }?>
      <tr>
          <td><?php echo $row->nomor?></td>
          <td><?php echo $row->nama_sop?></td>
          <td><?php echo $row->deskripsi?></td>
          <?php if($this->session->userdata('status')=="login"){ ?>
            <td class="btnsq tombol-hapus" href="<?php echo base_url('sop/hapus_sop/'.$row->id); ?>"><div class="btn btn-danger btn-xm" data-toggle="tooltip" data-placement="top" title="Hapus SOP"><i class="fa fa-trash"></i></div></td>
            <td class="btnsq"><button class="btn btn-primary btn-xm" data-toggle="modal" data-target="#edit<?php echo $row->id?>" title="Edit User"><i class="fa fa-edit"></i></button></td>
            <td class="btnsq"><button class="btn btn-success btn-xm" data-toggle="modal" data-target="#file<?php echo $row->id ?>"><i class="fa fa-eye"></i></button></td>
          <?php } ?>
      </tr>
    <?php endforeach;?>
      </table>
</div>
          
<?php if($this->session->userdata('status')=="login"){ ?>
<!-- Modal tambah Divisi -->
<div class="modal fade" id="tambahdivisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Divisi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url().'sop/tambah_divisi'?>" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama Divisi SOP</label>
            <input type="text" name="divisi" class="form-control" placeholder="Nama Divisi SOP">
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal tambah SOP -->
<div class="modal fade" id="tambahsop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah SOP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url().'sop/tambah_sop'?>" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nomor SOP</label>
            <input type="text" name="nomor" class="form-control" placeholder="Nama SOP">
        </div>
        <div class="form-group">
            <label>Nama SOP</label>
            <input type="text" name="nama_sop" class="form-control" placeholder="Nama SOP">
        </div>
        <div class="form-group">
            <label>Jenis Promosi</label>
            <select name="id_divisi" class="form-control">
                <option>Pilih Jenis</option>
                <?php foreach($divisi as $row_div): ?>
                <option value="<?=$row_div->id?>"><?php echo $row_div->divisi ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control">
        </div>
        <div class="form-group">
            <label>File</label>
            <input type="file" name="file" class="form-control">
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Edit SOP -->
<?php
foreach ($sop as $row) : ?>
<div class="modal fade" id="edit<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><b>Edit SOP</b> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url().'sop/edit_sop'?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row->id?>">
                    <input type="hidden" name="file_old" class="form-control" value="<?php echo $row->file?>">
                    <div class="form-group">
                        <label>Nomor SOP</label>
                        <input type="text" name="nomor" class="form-control" value="<?php echo $row->nomor?>">
                    </div>
                    <div class="form-group">
                      <label>Nama SOP</label>
                      <input type="text" name="nama_sop" class="form-control" value="<?php echo $row->nama_sop?>">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" value="<?php echo $row->deskripsi?>">
                    </div>
                    <div class="form-group">
                        <label>File(PDF/JPG/JPEG)</label>
                        <input type="file" name="file" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Lihat Detail File SOP -->
<div class="modal fade" id="file<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><b>Dokumentasi Kunjungan</b></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="<?php echo base_url('/assets/files/sop/' . $row->file)?>" width="100%" height="500px"></iframe>
            </div>
        </div>
    </div>
</div>
<?php endforeach;}?>