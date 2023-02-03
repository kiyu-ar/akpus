<div>
    <nav class="crumbs">
        <ol>
            <li class="crumb"><a href="<?=base_url()?>">Home</a></li>
            <li class="crumb"><a href="#">Pustakawan</a></li>
            <li class="crumb">Data Pengembangan SDM</li>
        </ol>
    </nav>
<div>

<div>
    <h5>Kepala Perpustakaan</h5>
    <hr>
    <h5>Pustakawan dan staf teknis</h5>
</div>


<?php $a="0"; $nomor = 0;?>
<div style="float:left;">
  <button class="btn btn-primary" style="margin-bottom : 10px" data-toggle="modal" data-target="#tambahpsdm"><i class="fa fa-plus"></i>Tambah PSDM</button>
</div>
<div style="float:right;">
  <form action="" method="GET" style="flex-direction: row; width:360px">
      <div class="form-group">
        <input class="search-right" type="text" name="keyword" placeholder="Nama Kegiatan/Peserta" value="<?= html_escape($keyword) ?>">
        <input type="submit" value="Cari" class="btn btn-primary">
      </div>
  </form>
</div>
<div style="clear:both;">
    <?php foreach ($psdm as $row) : 
        if ($a != $row->jenis){$nomor=1; $a = $row->jenis;
            if ($a != "0"){?></table><?php }?>
        <h4>Pengembangan <?php echo $row->jenis; ?> </h4>
        <table class="table table-bordered"> 
        <tr>
            <th style="width:5%">NO</th>
            <th style="width:30%">Nama</th>
            <th style="">Peserta</th>
            <th style="width:20%">Tanggal</th>
            <th colspan=3 style="width:115px">AKSI</th>
        </tr>
        <?php  }?>
      <tr>
          <td><?php echo $nomor++?></td>
          <td><?php echo $row->nama?></td>
          <td><?php echo $row->peserta?></td>
          <td><?php echo $row->tanggal_dari." - ".$row->tanggal_hingga ?></td>
          <td class="btnsq" onclick="javascript: return confirm('Anda yakin?')"><?php echo anchor('pustakawan/hapus_psdm/'.$row->id, '<div class="btn btn-danger btn-xm" data-toggle="tooltip" data-placement="top" title="Hapus PSDM"><i class="fa fa-trash"></i></div>') ?></td>
          <td class="btnsq"><?php echo anchor('pustakawan/edit_psdm/'.$row->id,'<div class="btn btn-primary btn-xm" data-toggle="tooltip" data-placement="top" title="Edit PSDM"><i class="fa fa-edit"></i></div>') ?></td>
          <td class="btnsq" title="Lihat file"><button type="button" class="btn btn-success btn-xm openfile" value="<?=$row->file?>" data-toggle="modal" data-target="#openFile"><i class="fa fa-eye"></i></button></td>
      </tr>    
    <?php endforeach;?>
        </table>
        </div>

<!-- modal tambah SOP -->
<div class="modal fade" id="tambahpsdm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DATA Pengembangan SDM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('pustakawan/tambah_psdm'); ?>
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