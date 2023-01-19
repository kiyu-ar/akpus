<div>
<nav class="crumbs">
        <ol>
            <li class="crumb"><a href="#">Home</a></li>
            <li class="crumb"><a href="#">Informasi Koleksi</a></li>
            <li class="crumb">Jenis Koleksi Cetak</li>
        </ol>
    </nav>
    <h5>Jumlah pustakawan menurut pendidikan perpustakaan</h5>
    <?php var_dump($tabel1); ?>
        <table class="table">
            <tr>
                <th>S3</th>
                <th>S2</th>
                <th>S1</th>
                <th>D4</th>
                <th>D3</th>
                <th>D2</th>
                <th>D1</th>
                <th>Lain</th>
                <th>Total</th>
            </tr>
            <tr>
                    <td><?php echo $tabel1['s3'] ?></td>
                    <td><?php echo $tabel1['s2'] ?></td>
                    <td><?php echo $tabel1['s1'] ?></td>
                    <td><?php echo $tabel1['d4'] ?></td>
                    <td><?php echo $tabel1['d3'] ?></td>
                    <td><?php echo $tabel1['d2'] ?></td>
                    <td><?php echo $tabel1['d1'] ?></td>
                    <td><?php echo $tabel1['lain'] ?></td>
                    <td><?php echo $tabel1['total'] ?></td>
            </tr>
        </table>
    <hr>
    <h5>Jumlah pustakawan menurut jabatan fungsional, kepangkatan, dan pendidikan <br>
        (Termasuk pendidikan non perpustakaan)</h5>
    <hr>
    <h5>Jumlah Staf Perpustakaan</h5>
    <hr>
    <h5>Jumlah pengembangan SDM perpustakaan yang diikuti</h5>
</div>