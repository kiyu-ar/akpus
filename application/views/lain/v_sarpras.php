<div>
    <nav class="crumbs">
        <ol>
            <li class="crumb"><a href="#">Home</a></li>
            <li class="crumb"><a href="#">Informasi Lain</a></li>
            <li class="crumb">Data Sarana dan Prasarana</li>
        </ol>
    </nav>
    <?php $jenis=9; $subjenis=0;
        foreach ($sarpras as $row):
            if($jenis != $row->jenis){
                    if($jenis != 9){echo "</div></div></div>";}
                    echo "<div class='col-md-6'>\n\t\t<div class='div-card'>\n";
                    $jenis = $row->jenis;
                if($row->jenis == 0) 
                    echo "<label>Sarana</label>\n";
                else if($row->jenis == 1) 
                    echo "<label>Prasarana</label>\n";
                }
            if($row->subjenis == 0){
                echo "\t\t<div class='row line'>\n";
                echo "\t\t<label style='float:left;'>".$row->nama."</label>\n";
                echo "\t\t<input type='text' size='7' value='".$row->jumlah."'>\n";
                echo "\t\t</div>\n";
            }else if($row->subjenis != 0 && empty($row->jumlah)){
                echo "<div class='row line'>\n";
                echo "<label style='float:left;'>".$row->nama."</label>\n";
            }else{
                echo "<div class='row tab'>\n";
                echo "<label style='float:left;'>".$row->nama."</label>\n";
                echo "<input type='text' size='7' value='".$row->jumlah."'>\n";
                echo "</div>\n";
                }?>
            
    <?php endforeach;?>
            </div></div></div>
            </div>

</div>