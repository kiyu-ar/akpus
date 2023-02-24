<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="#">Home</a></li>
            <li class="breadcrumb-item "><a href="#">Informasi Lain</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Komponen</li>
        </ol>
    </nav>
<div style="float:left;">
  <button class="btn btn-primary" style="margin-bottom : 10px" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>Tambah Komponen</button>
  <button class="btn btn-success" style="margin-bottom : 10px" data-toggle="modal" data-target="#tambahjenis"><i class="fa fa-plus"></i>Tambah Jenis Komponen</button>
</div>
<?php $nomor = 1; $kolom=0; ?>
<div style="clear: both;">
        <?php foreach($komponen as $row):
            if($kolom != $row->jenis){ $nomor = 1; 
            if($kolom != 0){?></table> <hr> <?php } ?>
            <h4>Divisi <?php echo $row->jenis; ?> </h4>
            <table class="table">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <?php if($this->session->userdata('status')=="login"){?>
                    <th colspan=3>Aksi</th>
                <?php } ?>
            </tr>
            <?php $kolom=$row->jenis;} ?>
            <tr>
                <td><?php echo $nomor++ ?></td>
                <td><?php echo $row->nama ?></td>
                <td><?php echo $row->deskripsi ?></td>
                <td><?php ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php if($this->session->userdata('status')=="login"){ ?>
<!-- Modal tambah Divisi -->
<div class="modal fade" id="tambahjenis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Komponen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url().'lain/tambah_komponen_jenis'?>" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama Jenis Komponen</label>
            <input type="text" name="divisi" class="form-control" placeholder="Nama Divisi SOP">
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>



<?php } ?>
</div>