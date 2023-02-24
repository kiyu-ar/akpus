<div>
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Informasi Pustakawan/Staf</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Statistik Pegawai</li>
        </ol>
    </nav>
    <form style="float: right;" action="<?php echo base_url().'pustakawan/daftar_staf'; ?>"><button type="submit" class="btn btn-primary"  style="margin-top:30px">Daftar Staf</button></form>
    <h5 class="custom">Jumlah pustakawan menurut pendidikan perpustakaan</h5>
    <?php //var_dump($tabel1); ?>
        <table class="table table-bordered" style="width:500px">
            <tr style="background-color: gray; color:white;"><?php foreach($tabel1 as $key=>$value): ?>
                <th><?php echo $key ?></th>
                <?php endforeach; ?>
            </tr>
            <tr><?php foreach($tabel1 as $value): ?>
                    <td><?php echo $value ?></td>
                <?php endforeach; ?>
            </tr>
        </table>
    <hr>
    <div class="container">
        <div>
            <canvas id="myChart" width="600" height="400">
            </canvas>
        </div>
    </div>
    <div class="row" style="margin:10px">
        <h5 class="custom">Jumlah pustakawan menurut jabatan fungsional, kepangkatan, dan pendidikan 
            (Termasuk pendidikan non perpustakaan)</h5>
        <div class="col-md-4 div-col">
            <b>Menurut Jabatan Fungsional</b>
            <table class="table table-bordered" style="width:500px">
            <?php foreach($tabel2 as $key=>$value): ?>
            <tr>
                <td><?php echo $key ?></td>
                <td><?php echo $value ?></td>
            </tr>
            <?php endforeach; ?>
            </table>
        </div>
        <div class="col-md-4 div-col">
            <b>Menurut Kepangkatan</b>
            <table class="table table-bordered" style="width:500px">
            <?php foreach($tabel3 as $key=>$value): ?>
            <tr>
                <td><?php echo $key ?></td>
                <td><?php echo $value ?></td>
            </tr>
            <?php endforeach; ?>
            </table>
        </div>
        <div class="col-md-4 div-col">
            <b>Menurut Pendidikan</b>
            <table class="table table-bordered" style="width:500px">
            <?php foreach($tabel4 as $key=>$value): ?>
            <tr>
                <td><?php echo $key ?></td>
                <td><?php echo $value ?></td>
            </tr>
            <?php endforeach; ?>
            </table>
        </div>
    </div>
    <hr>
    
        <h5>Jumlah Staf Perpustakaan</h5>
    
    <hr>
    <h5>Jumlah pengembangan SDM perpustakaan yang diikuti</h5>
</div>