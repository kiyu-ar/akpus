<div>
    <nav class="crumbs">
        <ol>
            <li class="crumb"><a href="#">Home</a></li>
            <li class="crumb"><a href="#">Informasi Lain</a></li>
            <li class="crumb">Data Anggaran</li>
        </ol>
    </nav>

    <div>
        <?php $no = 1; $jenis=3;
                foreach ($anggaran as $row):
                    if($jenis != $row->jenis){ 
                        if($jenis != 3){?></table> <hr> <?php }
                            if($row->jenis == 0){
                                echo "<h4>Internal</h4>";
                            }
                            else if($row->jenis == 1){
                                echo "<h4>Eksternal</h4>";
                            }   ?>
                    
        <table class="table">
            <tr>
                <th>No</th>
                <th>Asal</th>
                <th>Jumlah</th>
                <?php if($akses == '0' || $akses == '1'){ ?>
                <th colspan=2>Aksi</th>
                <?php } ?>
            </tr>
            <?php $jenis = $row->jenis; $no = 1;} ?>
                <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row->asal ?></td>
                <td>Rp<?php echo number_format($row->nominal,2,',','.') ?></td>
                <?php if($akses == '0' || $akses == '1'){ ?>
                <td class="btnsq" onclick="javascript: return confirm('Anda yakin?')"><?php echo anchor('koleksi/hapus_tabel/3/'.$row->id, '<div class="btn btn-danger btn-xm" data-toggle="tooltip" data-placement="top" title="Hapus User"><i class="fa fa-trash"></i></div>') ?></td>
                <td class="btnsq"><?php echo anchor('koleksi/edit_tabel/'.$row->id,'<div class="btn btn-primary btn-xm" data-toggle="tooltip" data-placement="top" title="Edit User"><i class="fa fa-edit"></i></div>') ?></td>
                <?php } ?>
            </tr>
            <?php endforeach;?>
        </table>
    </div>

</div>