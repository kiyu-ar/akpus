<nav class="crumbs">
    <ol>
        <li class="crumb"><a href="<?=base_url()?>">Home</a></li>
        <li class="crumb"><a href="#">Informasi Koleksi</a></li>
        <li class="crumb">Data Pengadaan</li>
    </ol>
</nav>
<div>
    <div>
        <h4>Request Koleksi dari Web, Formulir, atau Wawancara</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, laboriosam! Ratione, eveniet delectus et corporis obcaecati, ea minima possimus quis quas natus nesciunt sequi nemo optio, adipisci voluptate ipsum qui.</p>
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Import File
    </button>
    <br>
    <?= $this->session->flashdata('message');?>
    <hr>
    <div>
        <h4>Rekapitulasi permintaan buku melalui surat ke Prodi</h4>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Animi, rerum veniam laborum odit autem molestias expedita vitae non nostrum reprehenderit ad sequi, vero, doloribus voluptatem culpa. Soluta amet ratione veritatis.</p>
    </div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?= site_url('import/excel') ?>" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                        <label class="col-form-label text-md-left">Masukkan file yang akan diupload</label> 
                                            <input type="file" class="form-control" name="file" accept=".xls, .xlsx" required>
                                            <div class="mt-1">
                                                <span class="text-secondary">File yang harus diupload : .xls, xlsx</span>
                                            </div>
                                            <?= form_error('file','<div class="text-danger">','</div>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Upload</button>
      </div>
    </form>
    </div>
  </div>
</div>