<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color: #E1EEDD;">
            <li class="breadcrumb-item "><a href="#">Home</a></li>
            <li class="breadcrumb-item "><a href="#">Informasi Lain</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Promosi</li>
        </ol>
    </nav>

    <?php if($this->session->userdata('status') == 'login'){  ?>
        <button class="btn btn-primary" style="margin-bottom : 10px" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>Tambah Promosi</button>
    <?php } ?>

    <div>
        <table class="table">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Deskripsi</th>
                <th>Tanggal Pelaksanaan</th>
                <?php $nomor = 1;
                if($this->session->userdata('status')=="login"){ ?>
                    <th colspan="3">Aksi</th>
                <?php } ?>
            </tr>
            <?php foreach($promosi as $row): ?>
                <tr>
                    <td><?php echo $nomor++ ?></td>
                    <td><?php echo $row->nama ?></td>
                    <td><?php echo $row->jenis ?></td>
                    <td><?php echo $row->deskripsi ?></td>
                    <td><?php echo $row->tanggal_dari.' - '.$row->tanggal_hingga ?></td>
                    <?php if ($this->session->userdata('status')=="login"){ ?>
                        <td class="btnsq tombol-hapus" href="<?php echo base_url('lain/hapus_promosi/'.$row->id)?>"><div class="btn btn-danger btn-xm" data-toggle="tooltip" data-placement="top" title="Hapus Promosi"><i class="fa fa-trash"></i></div></td>
                        <td class="btnsq"><button class="btn btn-warning btn-xm" data-toggle="modal" data-target="#edit<?php echo $row->id?>" title="Edit Promosi"><i class="fa fa-edit"></i></button></td>
                        <td class="btnsq"><button class="btn btn-success btn-xm" title="Lihat file"><i class="fa fa-eye"></i></button></td>
                    <?php } ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

<?php if($this->session->userdata('status')=="login"){ ?>
<!-- Modal tambah Promosi -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Promosi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('lain/tambah_promosi'); ?>
        <div class="form-group">
            <label>Nama Promosi</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama Promosi">
        </div>
        <div class="form-group">
            <label>Jenis Kerja sama</label>
            <select name="jenis" class="form-control">
                <option>Pilih Jenis</option>
                <?php ?>
                <option value="0">Internal</option>
                <option value="1">Eksternal</option>
            </select>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control">
        </div>
        <div class="form-group">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_dari" class="form-control">
        </div>
        <div class="form-group">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_hingga" class="form-control">
        </div>
        <div class="form-group">
            <label>File</label>
            <input type="file" name="file" class="form-control">
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>




<?php }?>
</div>