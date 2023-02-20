<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color: #E1EEDD;">
            <li class="breadcrumb-item "><a href="#">Home</a></li>
            <li class="breadcrumb-item "><a href="#">Informasi Pemustaka</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Akses E-Resources dan Virtual Visit</li>
        </ol>
    </nav>
    <?php if($this->session->userdata('status') == "login") {?>
    <button class="btn btn-primary" style="margin-bottom : 10px; float:right;" data-toggle="modal" data-target="#tambaheresource"><i class="fa fa-plus"></i>Tambah Data</button>
    <?php } ?>
    <table class="table table-hover" style="width:70%">
        <?php foreach($eresource as $row): ?> 
        <tr>
            <td style="padding-left: 60px">
                <h3><?php echo $row->nama; ?></h3>
                <div style="float:right">
                    <?php if($this->session->userdata('status') == "login"){ ?>
                    <button class="btn btn-warning btn-xm" data-toggle="modal" data-target="#edit<?php echo $row->id ?>" title="Edit Data"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger btn-xm tombol-hapus" href="<?php echo base_url('pemustaka/hapus_eresource/'.$row->id); ?>" title="Hapus Data"><i class="fa fa-trash"></i></button>
                    <?php } ?>
                </div>
                <p><?php echo $row->catatan; ?>
                </p>
                <img width="80%" src="<?php echo base_url().'assets/files/eresource/'.$row->file; ?>">
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

</div>

<!-- modal tambah E-resource -->
<div class="modal fade" id="tambaheresource" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DATA E-Resource</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('pemustaka/tambah_eresource'); ?>
        <div class="form-group">
            <label>Nama E-Resource</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama E-Resource">
        </div>
        <div class="form-group">
            <label>Catatan</label>
            <input type="text" name="catatan" class="form-control" placeholder="(as of Month Year)">
        </div>
        <div class="form-group">
            <label>File (PNG/JPG/JPEG)</label>
            <input type="file" name="fileinput" class="form-control">
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Kerjasama -->
<?php
$i = 1;
foreach ($eresource as $row) : $i++ ?>
<div class="modal fade" id="edit<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><b>Edit E-Resource</b> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url().'pemustaka/edit_eresource' ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row->id ?>">
                    <div class="form-group">
                        <label>Catatan</label>
                        <input type="text" name="catatan" class="form-control" value="<?php echo $row->catatan?>">
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" name="deskripsi" class="form-control" value="<?php echo $row->file?>">
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
<?php endforeach;?>>