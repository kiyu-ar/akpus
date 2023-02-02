<div>
    <nav class="crumbs">
        <ol>
            <li class="crumb"><a href="<?=base_url()?>">Home</a></li>
            <li class="crumb"><a href="#">Pustakawan</a></li>
            <li class="crumb">Edit Staf</li>
        </ol>
    </nav>

<div>
    <?php foreach($nonpustakawan as $row): ?>
    <form action="<?php echo base_url().'pustakawan/update'; ?>" method="post">
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $row->id ?>">
            <input type="hidden" name="fungsional" class="form-control" value="-">
            <input type="text" name="nama" class="form-control" value="<?php echo $row->nama ?>">
        </div>
        <div class="form-group">
            <label>Pangkat/Gol. Ruang</label>
            <select name="pangkat" class="form-control">
                <option value="-" <?php echo ($row->pangkat == "-" ? "selected" : ""); ?>>-</option>
                <option value="4c" <?php echo ($row->pangkat == "4c" ? "selected" : ""); ?>>IV/c</option>
                <option value="4b" <?php echo ($row->pangkat == "4b" ? "selected" : ""); ?>>IV/b</option>
                <option value="4a" <?php echo ($row->pangkat == "4a" ? "selected" : ""); ?>>IV/a</option>
                <option value="3d" <?php echo ($row->pangkat == "3d" ? "selected" : ""); ?>>III/d</option>
                <option value="3c" <?php echo ($row->pangkat == "3c" ? "selected" : ""); ?>>III/c</option>
                <option value="3b" <?php echo ($row->pangkat == "3b" ? "selected" : ""); ?>>III/b</option>
                <option value="3a" <?php echo ($row->pangkat == "3a" ? "selected" : ""); ?>>III/a</option>
                <option value="2d" <?php echo ($row->pangkat == "2d" ? "selected" : ""); ?>>II/d</option>
            </select>
        </div>
        <div class="form-group">
            <label>Jabatan</label>
            <input type="text" name="jabatan" class="form-control" value="<?php echo $row->jabatan ?>">
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
                <option value="SMP/Sederajat" <?php echo ($row->pendidikan_tertinggi == "SMP/Sederajat" ? "selected" : ""); ?>>SMP/Sederajat</option>
                <option value="SD/Sederajat" <?php echo ($row->pendidikan_tertinggi == "SD/Sederajat" ? "selected" : ""); ?>>SD/Sederajat</option>
            </select>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="aktif" <?php echo ($row->status == "aktif" ? "selected" : ""); ?>>Aktif</option>
                <option value="tidak aktif/pensiun" <?php echo ($row->status == "tidak aktif/pensiun" ? "selected" : ""); ?>>Tidak Aktif/Pensiun</option>
            </select>
        </div>
        <a href="<?= base_url('pustakawan/daftar_staf')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php endforeach; ?>
</div>
</div>