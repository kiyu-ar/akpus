<div>
    <nav class="crumbs">
        <ol>
            <li class="crumb"><a href="#">Home</a></li>
            <li class="crumb"><a href="#">Informasi Lain</a></li>
            <li class="crumb">Data Kerja Sama</li>
        </ol>
    </nav>

    <?php if($this->session->userdata('status') == 'login'){  ?>
    <div style="float: left;">
        <button class="btn btn-primary" style="margin-bottom : 10px" data-toggle="modal" data-target="#tambahkerjasama"><i class="fa fa-plus"></i>Tambah Kerja sama</button>
    </div>
    <?php } ?>

    <div style="clear: both;">
        
        <?php $no = 1; $jenis=3; //var_dump();
                foreach ($kerjasama as $row):
                    if($jenis != $row->jenis){ 
                        if($jenis != 3){?></table> <hr> <?php }
                            if($row->jenis == 0){
                                echo "<h4>Internal</h4>";
                            }
                            else if($row->jenis == 1){
                                echo "<h4>Eksternal</h4>";
                            }   ?>
                    
        <table class="table" style="width: 60%">
            <tr>
                <th width="5%">No</th>
                <th>Instansi</th>
                <th width="20%">Tanggal Mulai</th>
                <th width="20%">Tanggal Selesai</th>
                <?php if($akses == '0' || $akses == '1'){ ?>
                <th colspan=2 width="10%">Aksi</th>
                <?php } ?>
            </tr>
            <?php $jenis = $row->jenis; $no = 1;} ?>
                <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row->instansi ?></td>
                <td><?php echo $row->tanggal_dari ?></td>
                <td><?php echo $row->tanggal_hingga ?></td>
                <?php if($akses == '0' || $akses == '1'){ ?>
                <td class="btnsq tombol-hapus" href="<?php echo base_url('lain/hapus_kerjasama/'.$row->id).'/'.$row->update_id; ?>"><div class="btn btn-danger btn-xm" data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></div></td>
                <td class="btnsq"><a class="btn btn-primary btn-xm" data-toggle="modal" data-target="#edit<?php echo $row->id?>" title="Edit Kerja Sama"><i class="fa fa-edit"></i></a></td>
                <?php } ?>
            </tr>
            <?php endforeach;?>
        </table>
    </div>

</div>
<?php if($this->session->userdata('status') == 'login'){  ?>
<!-- modal tambah Kerja Sama -->
<div class="modal fade" id="tambahkerjasama" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DATA SOP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('lain/tambah_kerjasama'); ?>
        <div class="form-group">
            <label>Instansi</label>
            <input type="text" name="instansi" class="form-control" placeholder="Nama Instansi">
        </div>
        <div class="form-group">
            <label>Jenis Kerja sama</label>
            <select name="jenis" class="form-control">
                <option>Pilih Jenis</option>
                <option value="0">Internal</option>
                <option value="1">Eksternal</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_dari" class="form-control">
        </div>
        <div class="form-group">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_hingga" class="form-control">
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Kunjungan -->
<?php
$i = 1;
foreach ($kerjasama as $row) : $i++ ?>
<div class="modal fade" id="edit<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><b>Edit Kunjungan</b> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url().'lain/edit_kerjasama' ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row->id ?>">
                    <div class="form-group">
                        <label>Nama Instansi</label>
                        <input type="text" name="nama_instansi" class="form-control" value="<?php echo $row->instansi?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="datetime" name="tanggal_mulai" class="form-control" value="<?php echo $row->tanggal_dari?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type="datetime" name="tanggal_selesai" class="form-control" value="<?php echo $row->tanggal_hingga?>">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" value="<?php echo $row->deskripsi?>">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary tombol-edit">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; }?>