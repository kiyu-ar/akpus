<div>
    <nav class="crumbs">
        <ol>
            <li class="crumb"><a href="<?=base_url()?>">Home</a></li>
            <li class="crumb"><a href="#">Informasi SOP</a></li>
            <li class="crumb">SOP Pengolahan</li>
        </ol>
    </nav>
<div>
<?php $a=0; ?>
<div style="float:left;">
  <button class="btn btn-primary" style="margin-bottom : 10px" data-toggle="modal" data-target="#tambahdivisi"><i class="fa fa-plus"></i>Tambah Divisi</button>
  <button class="btn btn-primary" style="margin-bottom : 10px" data-toggle="modal" data-target="#tambahsop"><i class="fa fa-plus"></i>Tambah SOP</button>
</div>
<div style="float:right;">
  <form action="" method="GET" style="flex-direction: row; width:360px">
      <div class="form-group">
        <input class="search-right" type="text" name="keyword" placeholder="SOP/Deskripsi/Divisi" value="<?= html_escape($keyword) ?>">
        <input type="submit" value="Cari" class="btn btn-primary">
      </div>
  </form>
</div>
<div style="clear:both;">
    <?php foreach ($sop as $row) : ?>
      <?php 
        if($a != $row->id_divisi){ 
        if($a != 0){?></table> <hr> <?php } ?>
        <h4>Divisi <?php echo $row->divisi; ?> </h4>
        <table class="table table-bordered"> 
        <tr>
            <th style="width:5%">NO</th>
            <th style="width:30%">Nama SOP</th>
            <th style="">Deskripsi</th>
            <th colspan=3 style="width:115px">AKSI</th>
        </tr>
      <?php $a=$row->id_divisi; }?>
      <tr>
          <td><?php echo $row->nomor?></td>
          <td><?php echo $row->nama_sop?></td>
          <td><?php echo $row->deskripsi?></td>
          <td class="btnsq" onclick="javascript: return confirm('Anda yakin?')"><?php echo anchor('sop/hapus_sop/'.$row->id, '<div class="btn btn-danger btn-xm" data-toggle="tooltip" data-placement="top" title="Hapus User"><i class="fa fa-trash"></i></div>') ?></td>
          <td class="btnsq"><?php echo anchor('sop/edit_sop/'.$row->id,'<div class="btn btn-primary btn-xm" data-toggle="tooltip" data-placement="top" title="Edit User"><i class="fa fa-edit"></i></div>') ?></td>
          <td class="btnsq" title="Lihat file"><button type="button" class="btn btn-success btn-xm openfile" value="<?=$row->file?>" data-toggle="modal" data-target="#openFile"><i class="fa fa-eye"></i></button></td>
          <!-- <div data-demo-html="true" data-demo-css="true" data-demo-js="#map-script">
    			<a href="#popupMap<?php echo $row->id?>" data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline">Open Map</a> -->

    			<!-- <div data-role="popup" id="#popupMap<?php echo $row->id?>" data-overlay-theme="a" data-theme="a" data-corners="false" data-tolerance="15,15">
    				<a href="#" data-rel="back" class="ui-btn ui-btn-b ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
    				<iframe src="map.html" width="480" height="320" seamless=""></iframe>
    			</div>
          </div> -->

      </tr>
    <?php endforeach;?>
      </table>
</div>
          <!-- <iframe style="width: 500px; height:500px" src="<?=base_url('assets/files/A_Comparative_Study_of_Classifier_Based_Mispronunciation_Detection_System_for_Confusing_Arabic_Phoneme_Pairs2.pdf#toolbar=0') ?>" title="File Viewer" frameborder="0"></iframe> -->

<!-- modal tambah SOP -->
<div class="modal fade" id="tambahsop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DATA SOP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('sop/tambah_pengolahan'); ?>
        <div class="form-group">
            <label>Divisi</label>
            <select name="id_divisi" class="form-control"> 
              <option value="0">Divisi</option>
              <?php foreach ($divisi as $div):?>
              <option value="<?= $div->id ?>"><?= $div->divisi ?></option>
        <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label>Nomor</label>
            <input type="text" name="nomor" class="form-control">
        </div>
        <div class="form-group">
            <label>Nama SOP</label>
            <input type="text" name="namaSop" class="form-control">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control">
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
<!-- modal tambah divisi -->
<div class="modal fade" id="tambahdivisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DATA SOP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url().'sop/tambah_divisi'; ?>">
        <div class="form-group">
            <label>Divisi</label>
            <input type="text" name="newdiv" class="form-control">
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