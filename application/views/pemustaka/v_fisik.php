
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="background-color: #E1EEDD;">
        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Informasi Pemustaka</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Kunjungan Fisik</li>
    </ol>
</nav>
<div class="container">
    <div>
        <div>
            <h4 style="float: left;">Peminjaman per Prodi per Bulan</h4>
            <a id="export-sirkulasi-prodi" style="float: right;" class="btn btn-primary" href="#" target="_blank">Export Excel</a>
        </div>
        <p style="clear: both;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, fugiat praesentium ipsa repellat eaque quis doloremque neque doloribus dolorum maxime, esse maiores natus enim sint odit rem magni! Ipsa, in?</p>
        <form method="post" action="">
        <select name="id_fakultas" id="id_fakultas" class="custom-select">
            <option value="0">Fakultas</option>
            <?php foreach ($fakultas as $fak):?>
                <option value="<?= $fak->id_fakultas ?>"><?= $fak->fakultas ?></option>
            <?php endforeach ?>
        </select>
        <select name="id_prodi" id="id_prodi" class="custom-select" disabled>
            <option value="0">Prodi</option>
        </select>
        <button type="button" class="btn btn-primary" id="submit-sirkulasi">search</button>
        </form>
        <iframe class="jframe" id="iframe-sirkulasi" src="<?php echo base_url() ?>pemustaka/sirkulasi_prodi/0" frameborder="0"></iframe>
    </div>
    <hr>
    <div>
        <div>
            <h4 style="float: left;">Total Peminjaman per Bulan</h4>
            <a style="float: right;" class="btn btn-primary" href="<?php echo base_url('excel/export_excel_sirkulasi');?>" target="_blank">Export Excel</a>
        </div>
        <p style="clear: both;">Jumlah Total Peminjaman Buku per Bulan</p>
        <iframe class="jframe" src="<?php echo base_url() ?>pemustaka/sirkulasi_total" frameborder="0"></iframe>
    </div>
</div>