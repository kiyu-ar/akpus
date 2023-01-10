<html>
<head>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
</head>
<div>
    <table id="themed">
        <tr>
            <th>No</th>
            <th>Nama Jurnal</th>
            <th>Link Jurnal</th>
            <?php if ($status == 'login'){ ?>
                <th colspan=2 style="width:80px">Aksi</th>
            <?php } ?>
        </tr>
    <?php $no = 1;
    foreach ($ejournal as $row) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $row->nama_jurnal ?></td>
            <td><a href="<?php echo $row->link_jurnal ?>"><?php echo $row->link_jurnal ?></a></td>
            <?php if ($status == 'login'){ ?>
                <td class="btnsq" onclick="javascript: return confirm('Anda yakin?')"><?php echo anchor('koleksi/hapus_tabel/6/'.$row->id, '<div class="btn btn-danger btn-xm" data-toggle="tooltip" data-placement="top" title="Hapus Jurnal"><i class="fa fa-trash"></i></div>') ?></td>
                <td class="btnsq"><?php echo anchor('koleksi/edit_tabel/'.$row->id,'<div class="btn btn-primary btn-xm" data-toggle="tooltip" data-placement="top" title="Edit Jurnal"><i class="fa fa-edit"></i></div>') ?></td>
            <?php } ?>
        </tr>
    <?php endforeach; ?>
    </table>
</div>

</html>