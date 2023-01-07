<html>
<head>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
</head>
<div>
    <table id="themed">
        <tr>
            <th>No</th>
            <th>Nama Majalah</th>
            <th>Tahun Ketersediaan</th>
        </tr>
    <?php $no = 1;
    foreach ($majalah as $row) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $row->nama_majalah ?></td>
            <td><?php echo $row->tahun_tersedia ?></td>
        </tr>
    <?php endforeach; ?>
    </table>
</div>

</html>