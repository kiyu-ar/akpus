<nav class="crumbs">
        <ol>
            <li class="crumb"><a href="<?=base_url()?>">Home</a></li>
            <li class="crumb"><a href="#">Informasi Pemustaka</a></li>
            <li class="crumb">Data Sirkulasi</li>
        </ol>
    </nav>
<div>
    <div>
    <h4>Peminjaman per Prodi per Bulan per Tahun</h4>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, fugiat praesentium ipsa repellat eaque quis doloremque neque doloribus dolorum maxime, esse maiores natus enim sint odit rem magni! Ipsa, in?</p>
    <form method="post" action="">
    <select name="id_fakultas" id="id_fakultas" class="custom-select">
        <option value="0">Fakultas</option>
        <?php foreach ($fakultas as $fak):?>
            <option value="<?= $fak->id_fakultas ?>"><?= $fak->fakultas ?></option>
        <?php endforeach ?>
    </select>

    <select name="id_prodi" id="id_prodi" class="custom-select">
        <option value="0">Prodi</option>
    </select>
    <button type="button" class="btn btn-primary" id="submit-sirkulasi">search</button>
    </form>
    <iframe class="jframe" id="iframe-sirkulasi" src="<?php echo base_url() ?>pemustaka/sirkulasi_prodi/0" frameborder="0"></iframe>
    </div>
    <hr>
    <div>
        <h4>Total Peminjaman per Bulan</h4>
        <p>Jumlah Total Peminjaman Buku per Bulan</p>
        <a class="btn btn-primary" href="<?php echo base_url('importexcel/export_excel_sirkulasi');?>" target="_blank">Export Excel</a>
        <br><br>
        <iframe class="jframe" src="<?php echo base_url() ?>pemustaka/sirkulasi_total" frameborder="0"></iframe>
    </div>
</div>