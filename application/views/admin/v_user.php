<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kelola User</li>
        </ol>
    </nav>
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
    foreach ($login as $row) : ?>
        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $row->username ?></td>
            <td><?php echo $row->nama ?></td>
            <td><?php if($row->akses == 1){echo "Admin";}
                      else if($row->akses == 2){echo "Operator";}?></td>
            <td class="btnsq tombol-hapus" href="<?php echo base_url('user/hapus/'.$row->id);?>"><div class="btn btn-danger btn-xm" data-toggle="tooltip" data-placement="top" title="Hapus User"><i class="fa fa-trash"></i></div></td>
            <td class="btnsq"><button class="btn btn-primary btn-xm" data-toggle="modal" data-target="#edit<?php echo $row->id?>" title="Edit User"><i class="fa fa-edit"></i></button></td>
            <td class="btnsq"><button class="btn btn-warning btn-xm" data-toggle="modal" data-target="#edit_pass<?php echo $row->id ?>" title="Ganti Password"><i class="fa fa-cog"></i></button></td>
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

<?php foreach($login as $row): ?>
<!-- MODAL EDIT USER -->
<div class="modal fade" id="edit<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><b>Edit User</b> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url().'user/edit' ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row->id ?>">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $row->username ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $row->nama ?>">
                    </div>
                    <div class="form-group">
                        <label>Akses</label>
                        <select name="akses" class="form-control"?>">
                            <?php if($this->session->userdata('akses')=='0') { ?>
                                <option value="1" <?php echo ($row->akses == 1 ? "selected" : ""); ?>>Admin</option><?php } ?>
                            <option value="2" <?php echo ($row->akses == 2 ? "selected" : ""); ?>>Operator</option>
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
<!-- MODAL EDIT PASSWORD -->
<div class="modal fade" id="edit_pass<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><b>Edit Password</b> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url().'user/editpassword' ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row->id ?>">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control">
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
<?php endforeach; ?>

</div>

