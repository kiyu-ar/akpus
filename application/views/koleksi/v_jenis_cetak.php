<div>
    <nav class="crumbs">
        <ol>
            <li class="crumb"><a href="#">Home</a></li>
            <li class="crumb"><a href="#">Informasi Koleksi</a></li>
            <li class="crumb">Jenis Koleksi Cetak</li>
        </ol>
    </nav>
    <a href="#buku"><button class="btn">Buku</button></a>
    <a href="#referensi"><button class="btn">Referensi</button></a>
    <a href="#ta"><button class="btn">Tugas Akhir, Skripsi, Tesis, Disertasi</button></a>
    <a href="#prosiding"><button class="btn">Prosiding</button></a>
    <a href="#jurnal"><button class="btn">Jurnal</button></a>
    <a href="#koran"><button class="btn">Koran dan Majalah</button></a>
<div id="buku">
    <h4>Buku : unsla</h4>
    <p>Data buku dapat diakses melalui website UNSLA pada
        <a href="https://unsla.uns.ac.id/neounsla/index.php?title=&author=&subject=&location=0&colltype=Buku&gmd=0&year-from=&year-until=&searchtype=advance&search=search" target="_blank">Buku UNSLA</a>
    </p>
</div>
<hr>
<div id="referensi">
    <h4>Referensi : unsla</h4>
    <p>Data referensi dapat diakses melalui website UNSLA pada 
        <a href="https://unsla.uns.ac.id/neounsla/index.php?title=&author=&subject=&location=0&colltype=Reference&gmd=0&year-from=&year-until=&searchtype=advance&search=search" target="_blank">Referensi UNSLA</a>
    </p>
</div>
<hr>
<div id="ta" class="anchor">
    <h4>Laporan tugas akhir : unsla</h4>
    <p>Data Laporan Tugas Akhir dapat diakses melalui website UNSLA pada
        <a href="https://unsla.uns.ac.id/neounsla/index.php?title=&author=&subject=&location=0&colltype=TA&gmd=0&year-from=&year-until=&searchtype=advance&search=search" target="_blank">Tugas Akhir UNSLA</a>
    </p>
    
</div>
<hr>
<div id="prosiding" class="anchor">
    <?php if(($this->session->userdata('status')=='login')){ ?>
    <div style="float:right"><a href="koleksi/edit_tabel/1"><button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Data Prosiding">Edit Data</button></a></div>
    <?php } ?>
    <h4>Prosiding : manual</h4>
    <p>Buku</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus ipsum inventore quas, enim pariatur consequatur adipisci laboriosam quo neque eos asperiores harum alias sequi perspiciatis? Totam necessitatibus veniam sunt nisi?</p> 
</div>
<hr>
<div id="jurnal" class="anchor">
    <?php if(($this->session->userdata('status')=='login')){ ?>
    <div style="float:right"><a href="koleksi/edit_tabel/2"><button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Data Jurnal">Edit Data</button></a></div>
    <?php } ?>
    <h4>Jurnal : manual</h4>
    <p>Buku</p>
    
</div>
<hr>
<div id="koran" class="anchor">
    <?php if(($this->session->userdata('status')=='login')){ ?>
    <div style="float:right"><a href="koleksi/edit_tabel/3"><button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Data Koran">Edit Data</button></a></div>
    <?php } ?>
    <h4>Koran dan Majalah : manual</h4>
    <p>Koran</p>
    <iframe class="jframe" src="<?php echo base_url() ?>koleksi/koran" frameborder="0"></iframe>
    <p>Majalah</p>
    <iframe class="jframe" src="<?php echo base_url() ?>koleksi/majalah" frameborder="0"></iframe>
    
</div>
<hr>
</div>