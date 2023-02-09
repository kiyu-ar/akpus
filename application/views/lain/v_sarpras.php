<div>
    <nav class="crumbs">
        <ol>
            <li class="crumb"><a href="#">Home</a></li>
            <li class="crumb"><a href="#">Informasi Lain</a></li>
            <li class="crumb">Data Sarana dan Prasarana</li>
        </ol>
    </nav>
    <div class="col-md-12">
        <div class="div-card">
    <?php foreach ($sarpras as $row):?>
                   
            <div class="row line">
                <div class="col-md-6">
                    <label style="float:left;"><?php echo $row->nama ?></label>
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