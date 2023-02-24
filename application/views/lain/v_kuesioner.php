<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="#">Home</a></li>
            <li class="breadcrumb-item "><a href="#">Informasi Lain</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Kuesioner</li>
        </ol>
    </nav>
    <div>
        <?php if($akses == '0' || $akses == '1'){ ?>
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahkuesioner"><i class="fa fa-plus"></i>Tambah Kuesioner</button>
            <?php
                if ($this->session->flashdata('pesan')) {
                 echo $this->session->flashdata('pesan');
            } ?>
        <?php } ?>
    </div>
    <div>
        <h4>Daftar Kunjungan</h4>
        <?php 
        if($kuesioner == null){
            echo "<h3>Tidak ada data yang ditampilkan<h3>";
        }else{ ?>
        <div style="overflow-x: auto; overflow-y: auto;">
            <table class="table">
                <thead>
                    <tr style="background:#CCC">
                        <th>No</th>
                        <th>Nama Kuesioner</th>
                        <th>Deskripsi</th>
                        <th colspan=3 width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($kuesioner as $row) {
                    ?><tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row->nama; ?></td>
                            <td><?php echo $row->deskripsi; ?></td> 
                                <div style="">
                                <?php if($akses == '0' || $akses == '1'){ ?>
                                    <td class="btnsq"><a href="<?php echo base_url('lain/hapus_kuesioner/'.$row->id) ?>" class="btn btn-danger btn-xm btn-block tombol-hapus" title="Hapus Kuesioner"><i class="fa fa-trash"></i></a></td>
                                    <td class="btnsq"><a class="btn btn-info btn-xm btn-block" data-toggle="modal" data-target="#edit<?php echo $row->id?>" title="Edit Kuesioner"><i class="fa fa-edit"></i></a></td>
                                <?php } ?>
                                <!-- <td class="btnsq"><a class="btn btn-warning btn-xm btn-block" data-toggle="modal" data-target="#bukti<?php echo $row->id?>" title="Lihat File Kuesioner"><i class="fa fa-eye"></i></a></td> -->
                                <td class="btnsq"><a href="<?php echo base_url('lain/cetak_file/'.$row->id) ?>" class="btn btn-success btn-xm btn-block" title="Download Kuesioner"><i class="fa fa-download"></i></a></td>
                                </div>
                            <?php $i++ ?>
                        </tr>
                    <?php }}
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<?php if($this->session->userdata('status')== 'login'){ ?>
<!-- Modal Tambah Kuesioner -->
<div class="modal fade" id="tambahkuesioner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="exampleModalLabel"><b>Tambah Kuesioner</b></h4>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url('lain/tambah_kuesioner') ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Kuesioner</label>
                        <input type="text" name="nama_kuesioner" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="description" name="deskripsi" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" name="file_kuesioner" class="form-control" required="">
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
<?php } ?>

<!-- Modal Edit Kuesioner -->
<?php
$i = 1;
foreach ($kuesioner as $row) : $i++; 
if($this->session->userdata('status')=='login'){?>
<div class="modal fade" id="edit<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h3 class="modal-title" id="exampleModalLabel"><b>Edit Kunjungan</b> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="exampleModalLabel"><b>Edit Kuesioner</b></h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url().'lain/edit_kuesioner' ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row->id ?>">
                    <div class="form-group">
                        <label>Nama Kuesioner</label>
                        <input type="text" name="nama_kuesioner" class="form-control" required="" value="<?php echo $row->nama?>">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" required="" value="<?php echo $row->deskripsi?>">
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" name="file_kuesioner" class="form-control" required="">
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
<?php } ?>

<!-- Modal Lihat Detail File Kuesioner -->
<!-- <div class="modal fade" id="bukti<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><b>File Kuesioner</b></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="<?php echo base_url('/assets/files/' . $row->file)?>" width="100%" height="500px"></iframe>
            </div>
        </div>
    </div>
</div> -->
<?php endforeach;?>