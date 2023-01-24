<div>
    <nav class="crumbs">
        <ol>
            <li class="crumb"><a href="<?=base_url()?>">Home</a></li>
            <li class="crumb"><a href="#">Pustakawan</a></li>
            <li class="crumb">Edit Pustakawan</li>
        </ol>
    </nav>

<div>
    <?php foreach($pustakawan as $row): ?>
    <form action="<?php echo base_url().'pustakawan/update'; ?>" method="post">
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $row->id ?>">
            <input type="text" name="nama" class="form-control" value="<?php echo $row->nama ?>">
        </div>
        <div class="form-group">
            <label>Pangkat/Gol. Ruang</label>
            <select name="pangkat" class="form-control">
                <option value="IV/c" <?php echo ($row->pangkat == "IV/c" ? "selected" : ""); ?>>IV/c</option>
                <option value="IV/b" <?php echo ($row->pangkat == "IV/b" ? "selected" : ""); ?>>IV/b</option>
                <option value="IV/a" <?php echo ($row->pangkat == "IV/a" ? "selected" : ""); ?>>IV/a</option>
                <option value="III/d" <?php echo ($row->pangkat == "III/d" ? "selected" : ""); ?>>III/d</option>
                <option value="III/c" <?php echo ($row->pangkat == "III/c" ? "selected" : ""); ?>>III/c</option>
                <option value="III/b" <?php echo ($row->pangkat == "III/b" ? "selected" : ""); ?>>III/b</option>
                <option value="III/a" <?php echo ($row->pangkat == "III/a" ? "selected" : ""); ?>>III/a</option>
                <option value="II/d" <?php echo ($row->pangkat == "II/d" ? "selected" : ""); ?>>II/d</option>
            </select>
        </div>
        <div class="form-group">
            <label>Jabatan Fungsional</label>
            <select name="fungsional" class="form-control">
                <option value="Pustakawan Madya" <?php echo ($row->fungsional == "Pustakawan Madya" ? "selected" : ""); ?>>Pustakawan Madya</option>
                <option value="Pustakawan Muda" <?php echo ($row->fungsional == "Pustakawan Muda" ? "selected" : ""); ?>>Pustakawan Muda</option>
                <option value="Pustakawan Pertama" <?php echo ($row->fungsional == "Pustakawan Pertama" ? "selected" : ""); ?>>Pustakawan Pertama</option>
                <option value="Pustakawan Penyelia" <?php echo ($row->fungsional == "Pustakawan Penyelia" ? "selected" : ""); ?>>Pustakawan Penyelia</option>
                <option value="Pustakawan Pelaksana Lanjutan" <?php echo ($row->fungsional == "Pustakawan Pelaksana Lanjutan" ? "selected" : ""); ?>>Pustakawan Pelaksana Lanjutan</option>
                <option value="Pustakawan Pelaksana" <?php echo ($row->fungsional == "Pustakawan Pelaksana" ? "selected" : ""); ?>>Pustakawan Pelaksana</option>
            </select>
        </div>
        <div class="form-group">
            <label>Pendidikan Perpustakaan</label>
            <input type="text" name="pendidikan" class="form-control" placeholder="Contoh : S1 Ilmu Perpustakaan" value="<?php echo $row->pendidikan ?>">
        </div>
        <div class="form-group">
            <label>Pendidikan Lain Terakhir</label>
            <input type="text" name="pendidikan_lain" class="form-control" placeholder="(isi jika pendidikan tertinggi selain perpustakaan)" value="<?php echo $row->pendidikan_lain ?>">
        </div>
        <div class="form-group">
            <label>Pendidikan Tertinggi</label>
            <select name="pendidikan_tertinggi" class="form-control">
                <option value="Doktor" <?php echo ($row->pendidikan_tertinggi == "Doktor" ? "selected" : ""); ?>>Doktor</option>
                <option value="Master" <?php echo ($row->pendidikan_tertinggi == "Master" ? "selected" : ""); ?>>Master</option>
                <option value="Sarjana" <?php echo ($row->pendidikan_tertinggi == "Sarjana" ? "selected" : ""); ?>>Sarjana</option>
                <option value="Diploma" <?php echo ($row->pendidikan_tertinggi == "Diploma" ? "selected" : ""); ?>>Diploma</option>
                <option value="SMA/Sederajat" <?php echo ($row->pendidikan_tertinggi == "SMA/Sederajat" ? "selected" : ""); ?>>SMA/Sederajat</option>
            </select>
        </div>
        <a href="<?= base_url('pustakawan/daftar_pustakawan')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php endforeach; ?>
</div>
</div>