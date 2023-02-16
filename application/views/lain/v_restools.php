<div>
    <nav class="crumbs">
        <ol>
            <li class="crumb"><a href="#">Home</a></li>
            <li class="crumb"><a href="#">Informasi Lain</a></li>
            <li class="crumb">Data Research Tools</li>
        </ol>
    </nav>

    <div>
        <?php $no = 1; ?>
        Media Promosi
        <table class="table table-hover">
            <!-- <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Tautan</th>
                <?php //if($this->session->userdata('status')=='login'){ ?>
                    <th>Aksi</th>
                <?php //} ?>
            </tr> -->
            <?php foreach($restools as $row): ?>
            <tr>
                <td><?php echo $no++.'. '.$row->nama ?><br>
                &ensp;<?php echo $row->deskripsi ?><br>
                
                <a href="<?php echo $row->tautan ?>" target="_blank">Tautan <?php echo $row->nama ?></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>