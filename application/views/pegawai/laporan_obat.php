<div class="container-fluid">
    <div>
        <h4>Laporan Obat</h4> 
        <a class="btn btn-danger mb-3"  href="<?php echo base_url('pegawai/obat_controller/print_obat')?>">
        <i class= "fa fa-print"></i> Print Laporan Data Obat</a>
    </div>

    <div>
    <h6>Jumlah Obat : <?= $total_obat ?></h6> 
    <table class= "table table-striped">
        <tr>
            <th>NO</th>
            <th>Nama Obat</th>
            <th>Manfaat</th>
            <th>Kategori</th>
            <th>Konsumen</th>
            <th>Stock</th>
            <th>Harga</th>
            <th>Gambar</th>
        </tr>

        <?php 
        $no=1;
            foreach($laporan as $lpn) : ?>
            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo $lpn->nama_obat?></td>
                <td><?php echo $lpn->manfaat?></td>
                <td><?php echo $lpn->kategori?></td>
                <td><?php echo $lpn->konsumen?></td>
                <td><?php echo $lpn->stock?></td>
                <td><?php echo number_format($lpn->harga_obat, 0,'.','.')?></td>
                <td><img class="card-img-top" src="<?php echo base_url().'/uploads/'.$lpn->gambar?>" alt="Card image cap"></td>
            </tr>
            <?php endforeach;?>
    </table>
    </div>
    
</div>
