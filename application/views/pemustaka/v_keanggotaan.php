<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="background-color: #E1EEDD;">
        <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Informasi Pemustaka</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Keanggotaan</li>
    </ol>
</nav>
<div>
    <div>
        <h4>Keanggotaan Secara Luring</h4>
        <p><?php foreach($aktif_m as $key=>$value): ?></p>
        <p>Banyak anggota yang <span class="label label-success">aktif</span> yaitu <td><span class="label label-success"><?php echo $value ?></span></td></p> 
        <?php endforeach; ?>
    </div>
    <hr>
    <div>
        <h4>Keanggotaan Secara Daring</h4>
        <p>Buku</p>
        <p>Jurnal</p>
    </div>
    <hr>
    <div>
        <h4>Persentase Mahasiswa Sebagai Anggota Perpustakaan</h4>
        <p>Buku</p>
        <p>Jurnal</p>
    </div>
    <hr>
    <div>
        <h4>Persentase Dosen dan Tenaga Pendidikan Sebagai Anggota Perpustakaan</h4>
        <p>Buku</p>
        <p>Jurnal</p>
    </div>
</div>