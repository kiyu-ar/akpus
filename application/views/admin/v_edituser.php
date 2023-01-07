<div>
    <nav class="crumbs">
        <ol>
            <li class="crumb"><a href="<?=base_url()?>">Home</a></li>
            <li class="crumb"><a href="<?=base_url('user') ?>">Kelola User</a></li>
            <li class="crumb">Edit User</li>
        </ol>
    </nav>
<div>
    <?php foreach ($login as $log) {?>
    <form action="<?php echo base_url().'user/update'; ?>" method="post">
        <div class="form-group">
            <label>Username</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $log->id ?>">
            <input type="text" name="username" class="form-control" value="<?php echo $log->username ?>">
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $log->nama ?>">
        </div>
        <div class="form-group">
            <label>Akses</label>
            <select name="akses" class="form-control"?>">
                <?php if($this->session->userdata('akses')=='0') { ?>
                    <option value="1" <?php echo ($log->akses == 1 ? "selected" : ""); ?>>Admin</option><?php } ?>
                <option value="2" <?php echo ($log->akses == 2 ? "selected" : ""); ?>>Operator</option>
            </select>
        </div>

        <a href="<?= base_url('user')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php } ?>
</div>