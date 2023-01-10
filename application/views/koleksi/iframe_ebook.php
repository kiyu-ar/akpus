<html>
<head>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
</head>
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
                <td class="btnsq" onclick="javascript: return confirm('Anda yakin?')"><?php echo anchor('koleksi/hapus_tabel/5/'.$row->id, '<div class="btn btn-danger btn-xm" data-toggle="tooltip" data-placement="top" title="Hapus User"><i class="fa fa-trash"></i></div>') ?></td>
                <td class="btnsq"><?php echo anchor('koleksi/edit_tabel/'.$row->id,'<div class="btn btn-primary btn-xm" data-toggle="tooltip" data-placement="top" title="Edit User"><i class="fa fa-edit"></i></div>') ?></td>
            <?php } ?>
        </tr>
    <?php endforeach; ?>
    </table>
</div>

</html>