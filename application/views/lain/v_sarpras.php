<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Informasi Lain</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Sarana dan Prasarana</li>
        </ol>
    </nav>
    <?php if(($this->session->userdata('status')=='login')){ ?>
        <button class="btn btn-primary" style="margin-bottom : 10px; float:right" data-toggle="modal" data-target="#tambahsarpras" data-toggle="tooltip" data-placement="top" title="Tambah Data Sarpras"><i class="fa fa-plus"></i>Tambah Data</button>
    <?php } ?>
    <div class="col-md-12">
        <div class="div-card">
    <?php foreach ($sarpras as $row):?>
            <div class="row line">
                <div class="col-md-4" style="margin-bottom: 20px">
                    <label><?php echo $row->nama ?></label>
                    <input type="text" size="7" value="<?php echo $row->jumlah ?>">
                </div>
                <?php if($this->session->userdata('status')=="login"){ ?>
                <div class="col-md-6">
                    <textarea rows="1"><?php echo $row->deskripsi ?></textarea>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-warning btn-xm" data-toggle="modal" data-target="#edit<?php echo $row->id ?>" title="Edit Data"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger btn-xm tombol-hapus" href="<?php echo base_url('lain/hapus_sarpras/'.$row->id); ?>" title="Hapus Data"><i class="fa fa-trash"></i></button>
                </div>
                <?php }else{ ?>
                <div class="col-md-8">
                    <textarea rows="1"><?php echo $row->deskripsi ?></textarea>
                </div>
                <?php } ?>
            </div>
            
    <?php endforeach;?>
            </div>
        </div>

</div>
<?php if($this->session->userdata('status')=="login"){ ?>
<!-- Modal tambah Sarpras -->
<div class="modal fade" id="tambahsarpras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Sarpras</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'lain/tambah_sarpras'; ?>">
            <div class="form-group">
                <label>Nama Sarpras</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group">
                <label>Jumlah (masukkan besaran jumlah, contoh: buah, m, untuk  meter persegi tuliskan m'dan'sup2)</label>
                <input type="text" name="jumlah" class="form-control">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control">
            </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal Edit Sarpras -->
<?php
foreach ($sarpras as $row) :?>
<div class="modal fade" id="edit<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><b>Edit Sarpras</b> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url().'lain/edit_sarpras' ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row->id ?>">
                    <div class="form-group">
                        <label>Nama Sarana/Prasarana</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $row->nama?>">
                    </div>
                    <div class="form-group">
                        <label>Jumlah (masukkan besaran jumlah, contoh: buah, m, untuk  meter persegi tuliskan m'dan'sup2)</label>
                        <input type="text" name="jumlah" class="form-control" value="<?php echo $row->jumlah?>">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" value="<?php echo $row->deskripsi?>">
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
<?php endforeach; } ?>