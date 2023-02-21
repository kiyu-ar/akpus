<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color: #E1EEDD;">
            <li class="breadcrumb-item "><a href="#">Home</a></li>
            <li class="breadcrumb-item "><a href="#">Informasi Lain</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Anggaran</li>
        </ol>
    </nav>

    <?php if($akses == '0' || $akses == '1'){ ?>
        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahanggaran"><i class="fa fa-plus"></i>Tambah Anggaran</button>
    <?php } ?>

    <div>
        <?php $no = 1; $jenis=3;
                foreach ($anggaran as $row):
                    if($jenis != $row->jenis){ 
                        if($jenis != 3){?></table> <hr> <?php }
                            if($row->jenis == 0){
                                echo "<h4>Internal</h4>";
                            }
                            else if($row->jenis == 1){
                                echo "<h4>Eksternal</h4>";
                            }   ?>
                    
        <table class="table" style="width:60%">
            <tr>
                <th width="5%">No</th>
                <th>Asal</th>
                <th width="35%">Jumlah</th>
                <?php if($akses == '0' || $akses == '1'){ ?>
                <th colspan=2 width="10%">Aksi</th>
                <?php } ?>
            </tr>
            <?php $jenis = $row->jenis; $no = 1;} ?>
                <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row->asal ?></td>
                <td>Rp<?php echo number_format($row->nominal,2,',','.') ?></td>
                <?php if($akses == '0' || $akses == '1'){ ?>
                <td class="btnsq"><a href="<?php echo base_url('lain/hapus_anggaran/'.$row->id) ?>" class="btn btn-danger btn-xm tombol-hapus" title="Hapus Anggaran"><i class="fa fa-trash"></i></a></td>
                <td class="btnsq"><a class="btn btn-info btn-xm btn-block" data-toggle="modal" data-target="#edit<?php echo $row->id?>" title="Edit Anggaran"><i class="fa fa-edit"></i></a></td>
                <?php } ?>
            </tr>
            <?php endforeach;?>
        </table>
    </div>

</div>

<!-- Modal Tambah Anggaran -->
<div class="modal fade" id="tambahanggaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><b>Tambah Anggaran</b></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url('lain/tambah_anggaran') ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Asal Anggaran</label>
                        <input type="text" name="asal" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Anggaran</label>
                        <input type="number" name="nominal" class="form-control" required="numeric" pattern="[0-9]+">
                    </div>
                    <div class="form-group">
                        <label>Jenis Anggaran</label><br>
                        <input type="radio" id="0" name="jenis_anggaran" required="" value="0">
                        <label for="0">Internal</label><br>
                        <input type="radio" id="1" name="jenis_anggaran" required="" value="1">
                        <label for="1">Eksternal</label>  
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


<!-- Modal Edit Anggaran -->
<?php
$i = 1;
foreach ($anggaran as $row) : $i++ ?>
<div class="modal fade" id="edit<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel"><b>Edit Anggaran</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url('lain/edit_anggaran') ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Asal Anggaran</label>
                            <input type="text" name="asal" class="form-control" required="" value="<?php echo $row->asal?>">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Anggaran</label>
                            <input type="number" name="nominal" class="form-control" required="numeric" pattern="[0-9]+" value="<?php echo $row->nominal?>">
                        </div>
                        <div class="form-group">
                            <label>Jenis Anggaran</label><br>
                            <input type="radio" id="0" name="jenis_anggaran" required="" value="0" <?php if($row->jenis=='0') echo 'checked'?>>
                            <label for="0">Internal</label><br>
                            <input type="radio" id="1" name="jenis_anggaran" required="" value="1" <?php if($row->jenis=='1') echo 'checked'?>>
                            <label for="1">Eksternal</label>  
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