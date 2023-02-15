<nav class="crumbs">
    <ol>
        <li class="crumb"><a href="<?= base_url() ?>">Home</a></li>
        <li class="crumb"><a href="#">Informasi Pemustaka</a></li>
        <li class="crumb">Data Kunjungan Fisik</li>
    </ol>
</nav>
<div class="container">
    <div class="flash-data" data-flashdata="<?php $this->session->flashdata('pesan') ?>">

    </div>
    <?php if ($this->session->flashdata('pesan')) :?>
        <?= $this->session->flashdata('flash'); ?>
    <?php endif; ?>
</div>
<div>
    <?php if($akses == '0' || $akses == '1'){ ?>
        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahkunjungan"><i class="fa fa-plus"></i>Tambah Kunjungan</button>
    <?php } ?>
    <div>
        <?php
        if ($this->session->flashdata('pesan')) {
            echo $this->session->flashdata('pesan');
        }
        ?>
    </div>
    <div>
        <h4>Daftar Kunjungan</h4>
        <?php 
        if($kunjungan == null){
            echo "<h3>Tidak ada data yang ditampilkan<h3>";
        }else{ ?>
        <div style="overflow-x: auto; overflow-y: auto;">
            <table id="themed">
                <thead>
                    <tr style="background:#CCC">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Instansi</th>
                        <th>Tujuan Kunjungan</th>
                        <th>Jumlah Tamu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($kunjungan as $row) {
                    ?><tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row->tanggal; ?></td>
                            <td><?php echo $row->instansi; ?></td>
                            <td><?php echo $row->tujuan; ?></td>
                            <td><?php echo $row->jumlah_tamu; ?></td>
                            <td> 
<<<<<<< HEAD
                                <div style="">
                                <?php if($akses == '0' || $akses == '1'){ ?>
                                    <a href="<?php echo base_url('pemustaka/hapus_kunjungan/'.$row->id) ?>" class="btn btn-danger btn-sm btn-block tombol-hapus" title="Hapus Kunjungan"><i class="fa fa-trash"></i></a>
                                    <a class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#hapus<?php echo $row->id?>" title="Edit Kunjungan"><i class="fa fa-edit"></i></a>
                                <?php } ?>
                                <a class="btn btn-warning btn-sm btn-block" data-toggle="modal" data-target="#dokumentasi<?php echo $row->id?>" title="Lihat Dokumentasi Kunjungan"><i class="fa fa-eye"></i></a>
                                </div>
=======
                                <a href="<?php echo base_url('pemustaka/hapus_kunjungan/'.$row->id) ?>" class="btn btn-danger btn-sm btn-xm tombol-hapus" title="Hapus Kunjungan"><i class="fa fa-trash"></i></a>
                                <a class="btn btn-info btn-sm btn-xm" data-toggle="modal" data-target="#hapus<?php echo $row->id?>" title="Edit Kunjungan"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-warning btn-sm btn-xm" data-toggle="modal" data-target="#dokumentasi<?php echo $row->id?>" title="Lihat Dokumentasi Kunjungan"><i class="fa fa-eye"></i></a>
>>>>>>> 28dc8dbb895e45c796719310d467b425cb93951f
                            </td>
                            <?php $i++ ?>
                        </tr>
                    <?php }}
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Kunjungan -->
<div class="modal fade" id="tambahkunjungan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><b>Tambah Kunjungan</b></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url('pemustaka/tambah_kunjungan') ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="datetime-local" name="tanggal_kunjungan" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Nama Instansi</label>
                        <input type="text" name="nama_instansi" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Tujuan</label>
                        <input type="text" name="tujuan_kunjungan" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Tamu</label>
                        <input type="number" name="tamu_kunjungan" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Dokumentasi</label>
                        <input type="file" name="dokumentasi_kunjungan" class="form-control" required="">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Modal Edit Kunjungan -->
<?php
$i = 1;
foreach ($kunjungan as $row) : $i++ ?>
<div class="modal fade" id="hapus<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><b>Edit Kunjungan</b> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url().'pemustaka/edit_kunjungan' ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row->id ?>">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="datetime-local" name="tanggal_kunjungan" class="form-control" value="<?php echo $row->tanggal?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Instansi</label>
                        <input type="text" name="nama_instansi" class="form-control" value="<?php echo $row->instansi?>">
                    </div>
                    <div class="form-group">
                        <label>Tujuan</label>
                        <input type="text" name="tujuan_kunjungan" class="form-control" value="<?php echo $row->tujuan?>">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Tamu</label>
                        <input type="number" name="tamu_kunjungan" class="form-control" value="<?php echo $row->jumlah_tamu?>">
                    </div>
                    <div class="form-group">
                        <label>Dokumentasi</label>
                        <input type="file" name="dokumentasi_kunjungan" class="form-control">
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

<!-- Modal Lihat Detail File Kunjungan -->
<div class="modal fade" id="dokumentasi<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><b>Dokumentasi Kunjungan</b></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="<?php echo base_url('/assets/files/' . $row->dokumentasi)?>" width="100%" height="500px"></iframe>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>