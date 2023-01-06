<html>
<head>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
</head>
<div>
<?php 
    if(empty($mandiri_p)){
        echo "<h4 style='background:cyan'>pilih fakultas dan prodi<h4>";
    }else{?>
        <table id="customers"> 
        <tr>
            <th>Tahun</th>
            <th>Januari</th>
            <th>Februari</th>
            <th>Maret</th>
            <th>April</th>
            <th>Mei</th>
            <th>Juni</th>
            <th>Juli</th>
            <th>Agustus</th>
            <th>September</th>
            <th>Oktober</th>
            <th>November</th>
            <th>Desember</th>
            <th>Total</th>
        </tr>
    <?php
        foreach ($mandiri_p as $row) : ?>
            <tr>
                <td><?php echo $row->tahun ?></td>
                <td><?php echo $row->januari ?></td>
                <td><?php echo $row->februari ?></td>
                <td><?php echo $row->maret ?></td>
                <td><?php echo $row->april ?></td>
                <td><?php echo $row->mei ?></td>
                <td><?php echo $row->juni ?></td>
                <td><?php echo $row->juli ?></td>
                <td><?php echo $row->agustus ?></td>
                <td><?php echo $row->september ?></td>
                <td><?php echo $row->oktober ?></td>
                <td><?php echo $row->november ?></td>
                <td><?php echo $row->desember ?></td>
                <td><?php echo $row->total ?></td>
            </tr>
        <?php endforeach; 
    }?>

</table>
</div>
</html>