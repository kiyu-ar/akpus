<div>
<nav class="crumbs">
        <ol>
            <li class="crumb"><a href="#">Home</a></li>
            <li class="crumb"><a href="#">Informasi Koleksi</a></li>
            <li class="crumb">Jenis Koleksi Cetak</li>
        </ol>
    </nav>
    <form action="<?php echo base_url().'pustakawan/daftar_staf'; ?>"><button type="submit" class="btn btn-primary"  style="margin-top:30px">Daftar Staf</button></form>
    <h5>Jumlah pustakawan menurut pendidikan perpustakaan</h5>
    <?php //var_dump($tabel1); ?>
        <table class="table table-bordered" style="width:500px">
            <tr><?php foreach($tabel1 as $key=>$value): ?>
                <th><?php echo $key ?></th>
                <?php endforeach; ?>
            </tr>
            <tr><?php foreach($tabel1 as $value): ?>
                    <td><?php echo $value ?></td>
                <?php endforeach; ?>
            </tr>
        </table>
    <hr>
    <div class="row" style="margin:10px">
        <h5>Jumlah pustakawan menurut jabatan fungsional, kepangkatan, dan pendidikan <br>
            (Termasuk pendidikan non perpustakaan)</h5>
        <div class="col-md-4 div-col">
            <p>Menurut Jabatan Fungsional</p>
            <table class="table table-bordered" style="width:500px">
            <?php foreach($tabel2 as $key=>$value): ?>
            <tr>
                <th><?php echo $key ?></th>
                <td><?php echo $value ?></td>
            </tr>
            <?php endforeach; ?>
            </table>
        </div>
        <div class="col-md-4 div-col">
            <p>Menurut Kepangkatan</p>
            <table class="table table-bordered" style="width:500px">
            <?php foreach($tabel3 as $key=>$value): ?>
            <tr>
                <th><?php echo $key ?></th>
                <td><?php echo $value ?></td>
            </tr>
            <?php endforeach; ?>
            </table>
        </div>
        <div class="col-md-4 div-col">
            <p>Menurut Pendidikan</p>
            <table class="table table-bordered" style="width:500px">
            <?php foreach($tabel4 as $key=>$value): ?>
            <tr>
                <th><?php echo $key ?></th>
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