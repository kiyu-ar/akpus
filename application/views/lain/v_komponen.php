<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="#">Home</a></li>
            <li class="breadcrumb-item "><a href="#">Informasi Lain</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Komponen</li>
        </ol>
    </nav>
<?php if($this->session->userdata('status')=="login"){ ?>
<div style="float:left;">
  <button class="btn btn-primary" style="margin-bottom : 10px" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>Tambah Komponen</button>
  <button class="btn btn-success" style="margin-bottom : 10px" data-toggle="modal" data-target="#tambahjenis"><i class="fa fa-plus"></i>Tambah Jenis Komponen</button>
</div>
<?php } ?>
<?php $nomor = 1; $kolom=0; ?>
<div style="clear: both;">
        <?php foreach($komponen as $row): //var_dump($row);
            if($kolom != $row->jenis){ $nomor = 1; 
            if($kolom != 0){?></table> <hr> <?php } ?>
            <h4><?php echo $row->komponen; ?> </h4>
            <table class="table" style="width:80%">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <?php if($this->session->userdata('status')=="login"){?>
                    <th colspan=3>Aksi</th>
                <?php } ?>
            </tr>
            <?php $kolom=$row->jenis;} ?>
            <tr>
                <td><?php echo $nomor++ ?></td>
                <td><?php echo $row->nama ?></td>
                <td><?php echo $row->deskripsi ?></td>
                <?php if($this->session->userdata('status')=="login"){ ?>
                    <td class="btnsq tombol-hapus" href="<?php echo base_url('lain/hapus_komponen/'.$row->id)?>"><button class="btn btn-danger btn-xm" data-toggle="tooltip" data-placement="top" title="Hapus Komponen"><i class="fa fa-trash"></i></button></td>
                    <td class="btnsq"><button class="btn btn-warning btn-xm" data-toggle="modal" data-target="#edit<?php echo $row->id?>" title="Edit Komponen"><i class="fa fa-edit"></i></button></td>
                    <td class="btnsq"><button class="btn btn-success btn-xm" data-toggle="tooltip" data-placement="top" title="Lihat File"><i class="fa fa-eye"></i></button></td>
                <?php } ?>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php if($this->session->userdata('status')=="login"){ ?>
<!-- Modal tambah Jenis Komponen -->
<div class="modal fade" id="tambahjenis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Komponen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url().'lain/tambah_jenis_komponen'?>" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama Jenis Komponen</label>
            <input type="text" name="komponen" class="form-control" placeholder="Nama Jenis Komponen">
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal tambah Data Komponen -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Komponen Penguat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url().'lain/tambah_komponen'?>" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama Komponen Pendukung</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama Jenis Komponen">
        </div>
        <div>
            <label>Jenis Komponen Pendukung</label>
            <select name="jenis" class="form-control" >
                <option>Pilih Jenis Komponen</option>
                <?php foreach($jenis_komponen as $row_jenis): ?>
                    <option value="<?=$row_jenis->id?>"><?php echo $row_jenis->komponen?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi">
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
<?php foreach($komponen as $row): ?>
<!-- Modal Edit Data Komponen -->
<div class="modal fade" id="edit<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Komponen Penguat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url().'lain/tambah_komponen'?>" enctype="multipart/form-data">
      <input type="text" name="id" class="form-control" value="<?php echo $row->id ?>">
      <input type="text" name="file_old" class="form-control" value="<?php echo $row->file?>">
        <div class="form-group">
            <label>Nama Komponen Pendukung</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $row->nama ?>">
        </div>
        <div>
            <label>Jenis Komponen Pendukung</label>
            <select name="jenis" class="form-control" >
                <option>Pilih Jenis Komponen</option>
                <?php foreach($jenis_komponen as $row_jenis): ?>
                    <option value="<?=$row_jenis->id?>" <?php echo ($row_jenis->id == $row->jenis ? "selected" : ""); ?>><?php echo $row_jenis->komponen?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" value="<?php echo $row->deskripsi ?>">
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
<?php endforeach; } ?>
</div>