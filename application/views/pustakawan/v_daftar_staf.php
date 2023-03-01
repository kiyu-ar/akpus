<div>
    <?php if ($this->session->userdata('status')== "login") {?>
    <div style="float:left;">
        <button class="btn btn-primary" style="margin-bottom : 10px" data-toggle="modal" data-target="#tambahpustakawan"><i class="fa fa-plus"></i>Tambah Pustakawan</button>
        <button class="btn btn-success" style="margin-bottom : 10px" data-toggle="modal" data-target="#tambahnonpustakawan"><i class="fa fa-plus"></i>Tambah Non-pustakawan</button>
    </div>
    <?php } ?>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama Pegawai</th>
            <th>Pangkat</th>
            <th>Jabatan</th>
            <th>Jabatan Fungsional</th>
            <th>Pendidikan Tertinggi</th>
            <?php if ($this->session->userdata('status')== "login") {?>
                <th colspan=2>Aksi</th>
            <?php } ?>
        </tr>
        
         <?php $no = 1;
        foreach($staf as $row): ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row->nama ?></td>
                <td><?php if ($row->pangkat == "4c") {echo "IV/c";}
                          else if ($row->pangkat == "4b") {echo "IV/b";}
                          else if ($row->pangkat == "4a") {echo "IV/a";}
                          else if ($row->pangkat == "3d") {echo "III/d";}
                          else if ($row->pangkat == "3c") {echo "III/c";}
                          else if ($row->pangkat == "3b") {echo "III/b";}
                          else if ($row->pangkat == "3a") {echo "III/a";}
                          else if ($row->pangkat == "2d") {echo "II/d";}
                          else echo $row->pangkat ?></td>
                <td><?php echo $row->jabatan ?></td>
                <td><?php echo $row->fungsional ?></td>              
                <td><?php echo $row->pendidikan_tertinggi ?></td>
                <?php if($akses == '0' || $akses == '1'){ ?>
                    <td class="btnsq tombol-hapus" href="<?php echo base_url('pustakawan/hapus/'.$row->id)?>"><div class="btn btn-danger btn-xm" data-toggle="tooltip" data-placement="top" title="Hapus Staf"><i class="fa fa-trash"></i></div></td>
                    <?php if ($row->jabatan == "pustakawan"){?>
                        <td class="btnsq"><a class="btn btn-primary btn-xm" data-toggle="modal" data-target="#edit<?php echo $row->id ?>" title="Edit Pustakawan"><i class="fa fa-edit"></i></div></td>
                    <?php } else { ?>
                        <td class="btnsq"><a class="btn btn-primary btn-xm" data-toggle="modal" data-target="#edit_non<?php echo $row->id ?>" title="Edit Non-pustakawan"><i class="fa fa-edit"></i></div></td>
                <?php }} ?>
            </tr>
            <?php endforeach; ?> 
    </table>
<?php if($this->session->userdata('status')=="login"){ ?>
<!-- MODAL TAMBAH PUSTAKAWAN -->
    <div class="modal fade" id="tambahpustakawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DATA PUSTAKAWAN</h5>
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
                <option value="4c">IV/c</option>
                <option value="4b">IV/b</option>
                <option value="4a">IV/a</option>
                <option value="3d">III/d</option>
                <option value="3c">III/c</option>
                <option value="3b">III/b</option>
                <option value="3a">III/a</option>
                <option value="2d">II/d</option>
            </select>
        </div>
        <div class="form-group">
            <label>Jabatan Fungsional</label>
            <select name="fungsional" class="form-control">
                <option>Pilih Jabatan</option>
                <option value="Pustakawan Madya">Pustakawan Utama</option>
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
<!-- MODAL TAMBAH NON-PUSTAKAWAN -->
<div class="modal fade" id="tambahnonpustakawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DATA NON-PUSTAKAWAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'pustakawan/tambah_non'; ?>">
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" placeholder="Nama lengkap beserta gelar" class="form-control">
        </div>
        <div class="form-group">
            <label>Pangkat/Gol. Ruang</label>
            <select name="pangkat" class="form-control">
                <option>Pilih Pangkat</option>
                <option value="-">-</option>
                <option value="4c">IV/c</option>
                <option value="4b">IV/b</option>
                <option value="4a">IV/a</option>
                <option value="3d">III/d</option>
                <option value="3c">III/c</option>
                <option value="3b">III/b</option>
                <option value="3a">III/a</option>
                <option value="2d">II/d</option>
            </select>
        </div>
        <div class="form-group">
            <label>Jabatan</label>
            <input type="text" name="jabatan" placeholder="Nama Jabatan" class="form-control">
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
                <option value="SMP/Sederajat">SMP/Sederajat</option>
                <option value="SD/Sederajat">SD/Sederajat</option>
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

<?php
$i = 1;
foreach ($staf as $row) : $i++; 
if($row->jabatan == "pustakawan"){?>
<!-- MODAL EDIT PUSTAKAWAN -->
<div class="modal fade" id="edit<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><b>Edit Pustakawan</b> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url().'pustakawan/edit_staf' ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row->id ?>">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="hidden" name="jabatan" class="form-control" value="pustakawan">
                        <input type="text" name="nama" class="form-control" value="<?php echo $row->nama ?>">
                    </div>
                    <div class="form-group">
                        <label>Pangkat/Gol. Ruang</label>
                        <select name="pangkat" class="form-control">
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
                        <label>Jabatan Fungsional</label>
                        <select name="fungsional" class="form-control">
                            <option value="Pustakawan Utama" <?php echo ($row->fungsional == "Pustakawan Utama" ? "selected" : ""); ?>>Pustakawan Utama</option>
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
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="aktif" <?php echo ($row->status == "aktif" ? "selected" : ""); ?>>Aktif</option>
                            <option value="tidak aktif/pensiun" <?php echo ($row->status == "tidak aktif/pensiun" ? "selected" : ""); ?>>Tidak Aktif/Pensiun</option>
                        </select>
                    </div>
                </div>    
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php } else{?>
<!-- MODAL EDIT NON-PUSTAKAWAN -->
<div class="modal fade" id="edit_non<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><b>Edit Non-Pustakawan</b> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url().'pustakawan/edit_staf' ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row->id ?>">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
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
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php } endforeach; }?>