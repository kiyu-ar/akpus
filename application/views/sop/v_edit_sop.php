<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color: #E1EEDD;">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">SOP</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit SOP</li>
        </ol>
    </nav>

    <?php foreach ($sop as $row) {?>
    <form action="<?php echo base_url().'sop/update_sop'; ?>" method="post">
        <div class="form-group">
            <label>Nomor SOP</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $row->id ?>">
            <input type="text" name="nomor" class="form-control" value="<?php echo $row->nomor ?>">
        </div>
        <div class="form-group">
            <label>Divisi</label>
            <select name="id_divisi" class="form-control"?>">
                <?php foreach($divisi as $div) { ?>
                    <option value="<?=$div->id?>" <?php if($row->id_divisi==$div->id) echo 'selected="selected"'; ?>><?php echo $div->divisi ?></option><?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Nama SOP</label>
            <input type="text" name="nama_sop" class="form-control" value="<?php echo $row->nama_sop ?>">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" value="<?php echo $row->deskripsi ?>">
        </div>
        <div class="form-group">
            <label>File(PDF/JPG/JPEG)</label>
            <input type="file" name="file" class="form-control" value="<?php echo $row->file ?>">
        </div>
        
        <a href="<?= base_url('sop/pengolahan')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php } ?>
</div>