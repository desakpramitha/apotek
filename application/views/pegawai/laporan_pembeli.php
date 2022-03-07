<div class="container-fluid">
    <div>
        <h4>Laporan Data Pembeli</h4> 
        <a class="btn btn-danger mb-3" href="<?php echo base_url('pegawai/pembeli_controller/print_pembeli')?>">
        <i class= "fa fa-print"></i> Print Laporan Data Pembeli</a>
    </div>
    <div>
        <h6>Jumlah Pembeli : <?= $total_pembeli ?></h6> 
        <table class= "table table-bordered table-hover table-striped text-center">
        <tr>
            <th>NO</th>
            <th>Nama pembeli</th>
            <th>Alamat</th>
            
        </tr>

        <?php 
        $no=1;
            foreach($laporan as $pbl) : ?>
            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo $pbl->nama_pembeli?></td>
                <td><?php echo $pbl->alamat_pembeli?></td>
            </tr>

            <?php endforeach; ?>
        </table>
    </div>
    

</div>
