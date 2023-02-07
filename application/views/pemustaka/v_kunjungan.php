<nav class="crumbs">
    <ol>
        <li class="crumb"><a href="<?= base_url() ?>">Home</a></li>
        <li class="crumb"><a href="#">Informasi Pemustaka</a></li>
        <li class="crumb">Data Kunjungan Fisik</li>
    </ol>
</nav>
<div>
    <button class="btn btn-primary" data-toggle="modal" data-target="#tambahkunjungan"><i class="fa fa-plus"></i>Tambah Kunjungan</button>
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
        <div style="overflow-x: auto;">
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
                                <button class="btn btn-danger" data-toggle="modal" data-target="#hapus_kunjungan" title="Hapus Kunjungan" id="<?php $row->id?>"><i class="fa fa-trash"></i></button>
                                <!-- <button class="btn btn-info" data-toggle="modal" data-target="#hapus" title="Edit Kunjungan"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#tambahkunjungan" title="Lihat Kunjungan"><i class="fa fa-eye"></i></button> -->
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kunjungan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url('pemustaka/tambah_kunjungan') ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="datetime-local" name="tanggal_kunjungan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama Instansi</label>
                        <input type="text" name="nama_instansi" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tujuan</label>
                        <input type="text" name="tujuan_kunjungan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Tamu</label>
                        <input type="number" name="tamu_kunjungan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Dokumentasi</label>
                        <input type="file" name="dokumentasi_kunjungan" class="form-control">
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

<!-- Modal Hapus Kunjungan -->
<div class="modal fade" id="hapus_kunjungan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Kunjungan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo site_url('pemustaka/hapus_kunjungan');?>">
            <div class="modal-body">
                <h4>Apakah anda yakin ingin menghapus data kunjungan ? <?php echo $row->id; ?></h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
