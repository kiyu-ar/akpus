<div>
  <div style="float:left;">
    <button class="btn btn-primary" style="margin-bottom : 10px" data-toggle="modal" data-target="#tambahuser"><i class="fa fa-plus"></i>Tambah User</button>
  </div>
  <div style="float:right;">
  <form action="" method="GET" style="flex-direction: row; width:360px">
    <div class="form-group">
      <input type="text" class="search-right" name="keyword" placeholder="Cari User" value="<?= html_escape($keyword) ?>">
      <input type="submit" value="Cari" class="btn btn-primary" style="width: 32%;">
    </div>
	</form>
  </div>
    <table class="table"> 
        <tr>
            <th style="width:5%">NO</th>
            <th style="width:0%">USERNAME</th>
            <th>NAMA LENGKAP</th>
            <th style="width:20%">AKSES</th>
            <th colspan=3 style="width:80px">AKSI</th>
        </tr>
    <?php 
    $no = 1;
    foreach ($login as $log) : ?>
        <tr id="boostrap-override">
            <td><?php echo $no++?></td>
            <td><?php echo $log->username ?></td>
            <td><?php echo $log->nama ?></td>
            <td><?php if($log->akses == 1){echo "Admin";}
                      else if($log->akses == 2){echo "Operator";}?></td>
            <td class="btnsq" onclick="javascript: return confirm('Anda yakin?')"><?php echo anchor('user/hapus/'.$log->id, '<div class="btn btn-danger btn-xm" data-toggle="tooltip" data-placement="top" title="Hapus User"><i class="fa fa-trash"></i></div>') ?></td>
            <td class="btnsq"><?php echo anchor('user/edit/'.$log->id,'<div class="btn btn-primary btn-xm" data-toggle="tooltip" data-placement="top" title="Edit User"><i class="fa fa-edit"></i></div>') ?></td>
            <td class="btnsq"><?php echo anchor('user/editpassword/'.$log->id, '<div class="btn btn-warning btn-xm" data-toggle="tooltip" data-placement="top" title="Ganti Password"><i class="fa fa-cog"></i></div>') ?></td>
        </tr>
    <?php endforeach; ?>
    </table>
<!-- Modal -->
<div class="modal fade" id="tambahuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DATA USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'user/tambah'; ?>">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
            <label>Nama User</label>
            <input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label>Akses</label>
            <select name="akses" class="form-control">
                <?php if($this->session->userdata('akses')=='0') { ?> 
                  <option value=1>Admin</option> <?php } ?>
                <option value=2>Operator</option>
                <option value=3>User</option>
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