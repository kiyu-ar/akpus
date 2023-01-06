<div>
    <?php foreach ($login as $log) {?>
    <form action="<?php echo base_url().'user/updatepassword'; ?>" method="post">
        <div class="form-group">
            <label>Password</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $log->id ?>">
            <input type="text" name="password" class="form-control">
        </div>

        <a href="<?= base_url('user')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php } ?>
</div>