<nav class="crumbs">
    <ol>
        <li class="crumb"><a href="<?=base_url()?>">Home</a></li>
        <li class="crumb"><a href="#">Informasi Pemustaka</a></li>
        <li class="crumb">Data Unggah Mandiri</li>
    </ol>
</nav>
<div>
    <div>
    <h4>Unggah Mandiri per Prodi</h4>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, fugiat praesentium ipsa repellat eaque quis doloremque neque doloribus dolorum maxime, esse maiores natus enim sint odit rem magni! Ipsa, in?</p>
    <form method="post" action="">
    <select name="id_fakultas" id="id_fakultas" class="custom-select">
        <option value="0">Fakultas</option>
        <?php foreach ($fakultas as $fak):?>
            <option value="<?= $fak->id_fakultas ?>"><?= $fak->fakultas ?></option>
        <?php endforeach ?>
    </select>

    <select name="id_prodi" id="id_prodi" class="custom-select">
        <option value="0">Prodi</option>
    </select>
    <button type="button" class="btn btn-primary" id="submit-mandiri">search</button>
   
    </form>
    <iframe class="jframe" id="iframe-mandiri" src="<?php echo base_url() ?>pemustaka/mandiri_prodi/0" frameborder="0"  style="min-height:100px"></iframe>
</div>
<hr>
    <div>
        <h4>Unggah Mandiri per Prodi</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, fugiat praesentium ipsa repellat eaque quis doloremque neque doloribus dolorum maxime, esse maiores natus enim sint odit rem magni! Ipsa, in?</p>
        <iframe class="jframe" src="<?php echo base_url() ?>pemustaka/mandiri_total" frameborder="0"></iframe>
    </div>
</div>