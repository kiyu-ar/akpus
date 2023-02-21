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
            <th>Nama Koran</th>
            <?php if ($status == 'login'){ ?>
                <th colspan=2 style="width:80px">Aksi</th>
            <?php } ?>
        </tr>
    <?php $no = 1;
    foreach ($koran as $row) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $row->nama_koran ?></td>
            <?php if ($status == 'login'){ ?>
                <td class="btnsq tombol-hapus" href="<?php echo base_url('koleksi/hapus_tabel/3/'.$row->id);?>"><button class="btn btn-danger btn-xm" data-toggle="tooltip" data-placement="top" title="Hapus Koran"><i class="fa fa-trash"></i></button></td>
                <td class="btnsq"><button class="btn btn-primary btn-xm" data-toggle="modal" data-target="#edit<?php echo $row->id?>" title="Edit Koran"><i class="fa fa-edit"></i></button></td>
            <?php } ?>
        </tr>
    <?php endforeach; ?>
    </table>
    

<?php
foreach ($koran as $row) :?>
<div class="modal fade" id="edit<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><b>Edit Koran</b> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url().'koleksi/edit_tabel/3' ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row->id ?>">
                    <div class="form-group">
                        <label>Nama Koran</label>
                        <input type="text" name="nama_koran" class="form-control" value="<?php echo $row->nama_koran?>">
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

