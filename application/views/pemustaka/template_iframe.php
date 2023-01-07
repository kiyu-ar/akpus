<html>
<head>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
</head>
<div>
    <table>
        <tr>
            <th>No</th>
        </tr>
    <?php foreach ($var as $row) : ?>
        <tr>
            <td><?php echo $row->column ?></td>
        </tr>
    <?php endforeach; ?>
    </table>
</div>

</html>