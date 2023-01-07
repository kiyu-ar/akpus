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
            <th>Nama Koran</th>
        </tr>
    <?php $no = 1;
    foreach ($koran as $row) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $row->nama_koran ?></td>
        </tr>
    <?php endforeach; ?>
    </table>
</div>

</html>