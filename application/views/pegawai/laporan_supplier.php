<div class="container-fluid">
    <div>
        <h4>Laporan Data Supplier</h4> 
        <a class="btn btn-danger mb-3" href="<?php echo base_url('pegawai/supplier_controller/print_supplier')?>">
        <i class= "fa fa-print"></i> Print Laporan Data Supplier</a>
    </div>
    <div>
        <h6>Jumlah Supplier: <?= $total_supplier?></h6> 
        <table class= "table table-bordered table-hover table-striped text-center">
        <tr>
            <th>NO</th>
            <th>Nama Supplier</th>
            <th>Alamat</th>
        </tr>

        <?php 
        $no=1;
            foreach($laporan as $sup) : ?>
            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo $sup->nama_supplier?></td>
                <td><?php echo $sup->alamat?></td>
            </tr>

            <?php endforeach; ?>
        </table>
    </div>
    

</div>
