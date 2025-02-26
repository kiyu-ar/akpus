<html>
<head>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/sweetalert2-11.7.1/css/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
</head>
<body>
<div>
    <div>
    <table id="themed">
        <tr>
            <th>No</th>
            <th>Nama Majalah</th>
            <th>Tahun Ketersediaan</th>
            <?php if ($status == 'login'){ ?>
                <th colspan=2 style="width:80px">Aksi</th>
            <?php } ?>
        </tr>
    <?php $no = 1;
    foreach ($majalah as $row) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $row->nama_majalah ?></td>
            <td><?php echo $row->tahun_dari.' - '.$row->tahun_hingga ?></td>
            <?php if ($status == 'login'){ ?>
                <td class="btnsq tombol-hapus" href="<?php echo base_url('koleksi/hapus_tabel/4/'.$row->id)?>"><button class="btn btn-danger btn-xm" data-toggle="tooltip" data-placement="top" title="Hapus Majalah"><i class="fa fa-trash"></i></button></td>
                <td class="btnsq"><button class="btn btn-primary btn-xm" data-toggle="modal" data-target="#edit<?php echo $row->id ?>" title="Edit Majalah"><i class="fa fa-edit"></i></button></td>
                
            <?php } ?>
        </tr>
    <?php endforeach; ?>
    </table>

    <div>
<?php
foreach ($majalah as $row) :?>
<div class="modal fade" id="edit<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><b>Edit Majalah</b> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url().'koleksi/edit_tabel/4' ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row->id ?>">
                    <div class="form-group">
                        <label>Nama Majalah</label>
                        <input type="text" name="nama_majalah" class="form-control" value="<?php echo $row->nama_majalah?>">
                    </div>
                    <div class="form-group">
                        <label>Tahun Mulai Berlangganan</label>
                        <input type="text" name="tahun_dari" class="form-control" value="<?php echo $row->tahun_dari?>">
                    </div>
                    <div class="form-group">
                        <label>Tahun Selesai Berlangganan</label>
                        <input type="text" name="tahun_hingga" class="form-control" value="<?php echo $row->tahun_hingga?>">
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
</div>
