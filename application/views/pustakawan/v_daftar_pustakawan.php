<div>
    <div style="float:left;">
        <button class="btn btn-primary" style="margin-bottom : 10px" data-toggle="modal" data-target="#tambahpustakawan"><i class="fa fa-plus"></i>Tambah Pustakawan</button>
    </div>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama Pustakawan</th>
            <th>Pangkat</th>
            <th>Jabatan Fungsional</th>
            <th>Pendidikan Perpustakaan Terakhir</th>
            <th>Pendidikan Lain Terakhir</th>
            <?php if ($akses == '0' || $akses == '1') {?>
                <th colspan=2>Aksi</th>
            <?php } ?>
        </tr>
        
         <?php $no = 1;
        foreach($pustakawan as $row): ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row->nama ?></td>
                <td><?php echo $row->pangkat ?></td>
                <td><?php echo $row->fungsional ?></td>
                <td><?php echo $row->pendidikan ?></td>
                <td><?php echo $row->pendidikan_lain ?></td>
                <?php if($akses == '0' || $akses == '1'){ ?>
                    <td class="btnsq" onclick="javascript: return confirm('Anda yakin?')"><?php echo anchor('pustakawan/hapus/'.$row->id, '<div class="btn btn-danger btn-xm" data-toggle="tooltip" data-placement="top" title="Hapus User"><i class="fa fa-trash"></i></div>') ?></td>
                    <td class="btnsq"><?php echo anchor('pustakawan/edit/'.$row->id,'<div class="btn btn-primary btn-xm" data-toggle="tooltip" data-placement="top" title="Edit User"><i class="fa fa-edit"></i></div>') ?></td>
                <?php } ?>
            </tr>
            <?php endforeach; ?> 
    </table>
<!-- MODAL TAMBAH PUSTAKAWAN -->
    <div class="modal fade" id="tambahpustakawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DATA USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'pustakawan/tambah'; ?>">
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" placeholder="Nama lengkap beserta gelar" class="form-control">
        </div>
        <div class="form-group">
            <label>Pangkat/Gol. Ruang</label>
            <select name="pangkat" class="form-control">
                <option>Pilih Pangkat</option>
                <option value="IV/c">IV/c</option>
                <option value="IV/b">IV/b</option>
                <option value="IV/a">IV/a</option>
                <option value="III/d">III/d</option>
                <option value="III/c">III/c</option>
                <option value="III/b">III/b</option>
                <option value="III/a">III/a</option>
                <option value="II/d">II/d</option>
            </select>
        </div>
        <div class="form-group">
            <label>Jabatan Fungsional</label>
            <select name="fungsional" class="form-control">
                <option>Pilih Jabatan</option>
                <option value="Pustakawan Madya">Pustakawan Madya</option>
                <option value="Pustakawan Muda">Pustakawan Muda</option>
                <option value="Pustakawan Pertama">Pustakawan Pertama</option>
                <option value="Pustakawan Penyelia">Pustakawan Penyelia</option>
                <option value="Pustakawan Pelaksana Lanjutan">Pustakawan Pelaksana Lanjutan</option>
                <option value="Pustakawan Pelaksana">Pustakawan Pelaksana</option>
            </select>
        </div>
        <div class="form-group">
            <label>Pendidikan Perpustakaan </label>
            <input type="text" name="pendidikan" placeholder="contoh : D3 Perpustakaan" class="form-control">
        </div>
        <div class="form-group">
            <label>Pendidikan Lain Terakhir </label>
            <input type="text" name="pendidikan_lain" placeholder="(isi jika pendidikan tertinggi selain perpustakaan)" class="form-control">
        </div>
        <div class="form-group">
            <label>Pendidikan Tertinggi </label>
            <select name="pendidikan_tertinggi" class="form-control">
                <option>Pilih Pendidikan Tertinggi</option>
                <option value="Doktor">Doktor</option>
                <option value="Master">Master</option>
                <option value="Sarjana">Sarjana</option>
                <option value="Diploma">Diploma</option>
                <option value="SMA/Sederajat">SMA/Sederajat</option>
            </select>
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

</div>