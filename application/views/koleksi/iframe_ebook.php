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
    <?php $buku=''; ?>
    <table id="themed">
        <tr>
            <th>No</th>
            <th>Nama Buku</th>
            <th>Tahun</th>
            <th>Link Buku</th>
            <?php if ($status == 'login'){ ?>
                <th colspan=2 style="width:80px">Aksi</th>
            <?php } ?>
        </tr>
    <?php $no = 1;
    foreach ($ebook as $row) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <?php if($row->nama_buku != $buku) {?>
            <td><?php echo $row->nama_buku ?></td>
            <?php $buku = $row->nama_buku; }else{?>
                <td> </td>
            <?php } ?>
            <td><?php echo $row->tahun ?></td>
            <td><a href="<?php echo $row->link_buku ?>"><?php echo $row->link_buku ?></a></td>
            <?php if ($status == 'login'){ ?>
                <td class="btnsq tombol-hapus" href="<?php echo base_url('koleksi/hapus_tabel/5/'.$row->id);?>"><div class="btn btn-danger btn-xm" data-toggle="tooltip" data-placement="top" title="Hapus E-Book"><i class="fa fa-trash"></i></div></td>
                <td class="btnsq"><div class="btn btn-primary btn-xm" data-toggle="modal" data-target="#edit<?php echo $row->id ?>" title="Edit E-Book"><i class="fa fa-edit"></i></button></td>
            <?php } ?>
        </tr>
    <?php endforeach; ?>
    </table>

    <div>
<?php
$i = 1;
foreach ($ebook as $row) : $i++ ?>
<div class="modal fade" id="edit<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><b>Edit E-Book</b> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url().'koleksi/edit_tabel/5' ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row->id ?>">
                    <div class="form-group">
                        <label>Nama Majalah</label>
                        <input type="text" name="nama_buku" class="form-control" value="<?php echo $row->nama_buku?>">
                    </div>
                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="text" name="tahun" class="form-control" value="<?php echo $row->tahun?>">
                    </div>
                    <div class="form-group">
                        <label>Link E-Book</label>
                        <input type="text" name="link_buku" class="form-control" value="<?php echo $row->link_buku?>">
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