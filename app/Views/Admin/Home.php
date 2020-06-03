<div class="">
    <div class="card">
        <table border="1">
            <thead>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Stock Barang</th>
            </thead>
            <tbody>
                <?php
                    // var_dump($barang);
                    // die;
                    foreach($barang as $row){
  
                ?>
                    <tr>
                        <td><?php echo $row['kode_barang'];?></td>
                        <td><?php echo $row['nama_barang'];?></td>
                        <td><?php echo $row['stock'];?></td>
                        
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>