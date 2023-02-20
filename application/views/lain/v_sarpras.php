<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color: #E1EEDD;">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Informasi Lain</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Sarana dan Prasarana</li>
        </ol>
    </nav>
    <div class="col-md-12">
        <div class="div-card">
    <?php foreach ($sarpras as $row):?>
                   
            <div class="row line">
                <div class="col-md-6">
                    <label><?php echo $row->nama ?></label>
                    <input type="text" size="7" value="<?php echo $row->jumlah ?>">
                </div>
                <div class="col-md-6">
                    <textarea rows="1"><?php echo $row->deskripsi ?></textarea>
                </div>
            </div>
            
    <?php endforeach;?>
            </div>
        </div>

</div>