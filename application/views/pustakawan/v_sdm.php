    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Informasi Pustakawan/Staf</a></li>
            <li class="breadcrumb-item active" aria-active="page">Data Pengembangan SDM</li>
        </ol>
    </nav>

<div style="float:right;">
  <form action="" method="GET" style="flex-direction: row; width:360px">
      <div class="form-group">
        <input class="search-right" type="text" name="keyword" placeholder="Nama Kegiatan/Peserta" value="<?= html_escape($keyword) ?>">
        <input type="submit" value="Cari" class="btn btn-primary">
      </div>
  </form>
</div>
<?php if($this->session->userdata('status')=="login"){ ?>
<div style="float: left;">
  <button class="btn btn-primary" style="margin-bottom: 10px;" data-toggle="modal" data-target="#tambahpsdm"><i class="fa fa-plus"></i>Tambah PSDM</button>
  <button class="btn btn-success" style="margin-bottom: 10px;" data-toggle="modal" data-target="#tambahpsdmkepala"><i class="fa fa-plus"></i>Tambah PSDM Kepala</button>
</div>
<h4 style="clear:both;">Kepala Perpustakaan</h4>
<?php }else{ ?>
<h4>Kepala Perpustakaan</h4>
<?php } $a="0"; $nomor = 0;?>
<div>
<?php if(empty($psdm_kepala)){echo "<p style='color: red;'>Data Pengembangan SDM Kepala Perpustakaan Kosong</p>";} ?>
<?php foreach ($psdm_kepala as $row) : 
        if ($a != $row->jenis){$nomor=1; $a = $row->jenis;
            if ($a != "0"){?></table><?php }?>
        <h5>Pengembangan <?php echo $row->jenis; ?> </h5>
        <table class="table table-bordered"> 
        <tr>
            <th style="width:5%">NO</th>
            <th style="width:30%">Nama</th>
            <th style="">Peserta</th>
            <th style="width:20%">Tanggal</th>
            <?php if($this->session->userdata('status')=="login"){ ?>
                <th colspan=3 style="width:115px">AKSI</th>
            <?php } ?>
        </tr>
        <?php  }?>
      <tr>
            <td><?php echo $nomor++?></td>
            <td><?php echo $row->nama?></td>
            <td><?php echo $row->peserta?></td>
            <td><?php echo $row->tanggal_dari." - ".$row->tanggal_hingga ?></td>
            <?php if($this->session->userdata('status')=="login"){ ?>
                <td class="btnsq tombol-hapus" href="<?php echo base_url('pustakawan/hapus_psdm/1/'.$row->id)?>"><div class="btn btn-danger btn-xm" data-toggle="tooltip" data-placement="top" title="Hapus PSDM Kepala"><i class="fa fa-trash"></i></div></td>
                <td class="btnsq"><div class="btn btn-primary btn-xm" data-toggle="modal" data-target="#edit_kepala<?php echo $row->id ?>" title="Edit PSDM Kepala"><i class="fa fa-edit"></i></div></td>
                <td class="btnsq" title="Lihat file"><button type="button" class="btn btn-success btn-xm openfile" value="<?=$row->file?>" data-toggle="modal" data-target="#openFile"><i class="fa fa-eye"></i></button></td>
            <?php } ?>
      </tr>    
    <?php endforeach;?>
    </table>
</div>
<hr>

<h4>Pustakawan dan staf teknis</h4>
<?php $a="0"; $nomor = 0;?>
<div>
    <?php foreach ($psdm as $row) : 
        if ($a != $row->jenis){$nomor=1; $a = $row->jenis;
            if ($a != "0"){?></table><?php }?>
        <h5>Pengembangan <?php echo $row->jenis; ?> </h5>
        <table class="table table-bordered"> 
        <tr>
            <th style="width:5%">NO</th>
            <th style="width:30%">Nama</th>
            <th style="">Peserta</th>
            <th style="width:20%">Tanggal</th>
            <?php if($this->session->userdata('status')=="login"){ ?>
                <th colspan=3 style="width:115px">AKSI</th>
            <?php } ?>
        </tr>
        <?php  }?>
      <tr>
            <td><?php echo $nomor++?></td>
            <td><?php echo $row->nama?></td>
            <td><?php echo $row->peserta?></td>
            <td><?php echo $row->tanggal_dari." - ".$row->tanggal_hingga ?></td>
            <?php if($this->session->userdata('status')=="login"){ ?>
                <td class="btnsq tombol-hapus" href="<?php echo base_url('pustakawan/hapus_psdm/2/'.$row->id)?>"><div class="btn btn-danger btn-xm" data-toggle="tooltip" data-placement="top" title="Hapus PSDM"><i class="fa fa-trash"></i></div></td>
                <td class="btnsq"><button class="btn btn-primary btn-xm" data-toggle="modal" data-target="#edit<?php echo $row->id?>" title="Edit PSDM"><i class="fa fa-edit"></i></button></td>
                <td class="btnsq" title="Lihat file"><button type="button" class="btn btn-success btn-xm openfile" value="<?=$row->file?>" data-toggle="modal" data-target="#openFile"><i class="fa fa-eye"></i></button></td>
            <?php } ?>
      </tr>    
    <?php endforeach;?>
        </table>
        </div>

<!-- modal tambah PSDM Kepala -->
<div class="modal fade" id="tambahpsdmkepala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengembangan SDM Kepala</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('pustakawan/tambah_psdm/1'); ?>
        <div class="form-group">
            <label>Jenis PSDM</label>
            <select name="jenis" class="form-control"> 
                <option>Pilih Jenis PSDM</option>
                <option value="Jenjang Karir">Jenjang Karir</option>
                <option value="Bimbingan Teknis">Bimbingan Teknis</option>
                <option value="Seminar">Seminar</option>
                <option value="Diklat">Diklat</option>
                <option value="Sertifikasi">Sertifikasi</option>
                <option value="Studi Lanjut">Studi Lanjut</option>
            </select>
        </div>
        <div class="form-group">
            <label>Nama PSDM</label>
            <input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group">
            <label>Perserta</label>
            <input type="text" name="peserta" class="form-control">
        </div>
        <div class="form-group">
            <label>Tanggal Pelaksanaan</label>
            <input type="date" name="tanggal_dari" class="form-control" placeholder="Tanggal Dari">
            <input type="date" name="tanggal_hingga" class="form-control" placeholder="Tanggal Hingga">
        </div>
        <div class="form-group">
            <label>File (PDF/JPG/JPEG)</label>
            <input type="file" name="filePdf" class="form-control">
        </div>
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        <?php echo form_close(); ?>
        <hr style="margin-bottom:0; background-color:white;">
      </div>
    </div>
  </div>
</div>

<!-- modal tambah PSDM -->
<div class="modal fade" id="tambahpsdm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengembangan SDM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('pustakawan/tambah_psdm/2'); ?>
        <div class="form-group">
            <label>Jenis PSDM</label>
            <select name="jenis" class="form-control"> 
                <option>Pilih Jenis PSDM</option>
                <option value="Jenjang Karir">Jenjang Karir</option>
                <option value="Bimbingan Teknis">Bimbingan Teknis</option>
                <option value="Seminar">Seminar</option>
                <option value="Diklat">Diklat</option>
                <option value="Sertifikasi">Sertifikasi</option>
                <option value="Studi Lanjut">Studi Lanjut</option>
            </select>
        </div>
        <div class="form-group">
            <label>Nama PSDM</label>
            <input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group">
            <label>Perserta</label>
            <input type="text" name="peserta" class="form-control">
        </div>
        <div class="form-group">
            <label>Tanggal Pelaksanaan</label>
            <input type="date" name="tanggal_dari" class="form-control" placeholder="Tanggal Dari">
            <input type="date" name="tanggal_hingga" class="form-control" placeholder="Tanggal Hingga">
        </div>
        <div class="form-group">
            <label>File (PDF/JPG/JPEG)</label>
            <input type="file" name="filePdf" class="form-control">
        </div>
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        <?php echo form_close(); ?>
        <hr style="margin-bottom:0; background-color:white;">
      </div>
    </div>
  </div>
</div>
<!-- modal lihat file -->
<div class="modal" id="openFile">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <div class="modal-dialog" align="left">
        <!-- Modal body -->
        <div class="modal-body" style="width:100%; height:100%">
            <iframe id="myIframe" title="File Viewer" frameborder="0"></iframe>
        </div>
    </div>
</div>

<?php
foreach ($psdm_kepala as $row) :?>
<div class="modal fade" id="edit_kepala<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><b>Edit PSDM Kepala</b> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url().'pustakawan/edit_psdm/1' ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row->id ?>">
                    <input type="hidden" name="file_old" class="form-control" value="<?php echo $row->file ?>">
                    <div class="form-group">
                        <label>Jenis PSDM</label>
                        <select name="jenis" class="form-control"> 
                            <option <?php echo ($row->jenis == "Jenjang Karir" ? "selected" : "");?> value="Jenjang Karir">Jenjang Karir</option>
                            <option <?php echo ($row->jenis == "Bimbingan Tekis" ? "selected" : "");?> value="Bimbingan Teknis">Bimbingan Teknis</option>
                            <option <?php echo ($row->jenis == "Seminar" ? "selected" : "");?> value="Seminar">Seminar</option>
                            <option <?php echo ($row->jenis == "Diklat" ? "selected" : "");?> value="Diklat">Diklat</option>
                            <option <?php echo ($row->jenis == "Sertifikasi" ? "selected" : "");?> value="Sertifikasi">Sertifikasi</option>
                            <option <?php echo ($row->jenis == "Studi Lanjut" ? "selected" : "");?> value="Studi Lanjut">Studi Lanjut</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama PSDM</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $row->nama?>">
                    </div>
                    <div class="form-group">
                        <label>Peserta</label>
                        <input type="text" name="peserta" class="form-control" value="<?php echo $row->peserta?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pelaksanaan</label>
                        <input type="date" name="tanggal_dari" class="form-control" value="<?php echo $row->tanggal_dari?>">
                        <input type="date" name="tanggal_hingga" class="form-control" value="<?php echo $row->tanggal_hingga?>">
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" name="fileinput" class="form-control">
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
<?php endforeach; ?>

<?php
foreach ($psdm as $row) :?>
<div class="modal fade" id="edit<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><b>Edit PSDM</b> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url().'pustakawan/edit_psdm/2' ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row->id ?>">
                    <input type="hidden" name="file_old" class="form-control" value="<?php echo $row->file ?>">
                    <div class="form-group">
                        <label>Jenis PSDM</label>
                        <select name="jenis" class="form-control"> 
                            <option <?php echo ($row->jenis == "Jenjang Karir" ? "selected" : "");?> value="Jenjang Karir">Jenjang Karir</option>
                            <option <?php echo ($row->jenis == "Bimbingan Tekis" ? "selected" : "");?> value="Bimbingan Teknis">Bimbingan Teknis</option>
                            <option <?php echo ($row->jenis == "Seminar" ? "selected" : "");?> value="Seminar">Seminar</option>
                            <option <?php echo ($row->jenis == "Diklat" ? "selected" : "");?> value="Diklat">Diklat</option>
                            <option <?php echo ($row->jenis == "Sertifikasi" ? "selected" : "");?> value="Sertifikasi">Sertifikasi</option>
                            <option <?php echo ($row->jenis == "Studi Lanjut" ? "selected" : "");?> value="Studi Lanjut">Studi Lanjut</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama PSDM</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $row->nama?>">
                    </div>
                    <div class="form-group">
                        <label>Peserta</label>
                        <input type="text" name="peserta" class="form-control" value="<?php echo $row->peserta?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pelaksanaan</label>
                        <input type="date" name="tanggal_dari" class="form-control" value="<?php echo $row->tanggal_dari?>">
                        <input type="date" name="tanggal_hingga" class="form-control" value="<?php echo $row->tanggal_hingga?>">
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" name="fileinput" class="form-control">
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
<?php endforeach; ?>