<div class="container-fluid">
    <div>
        <h4>Laporan Transaksi</h4> 
        <a class="btn btn-danger mb-3" href="<?php echo base_url('pegawai/transaksi_controller/print_transaksi')?>">
        <i class= "fa fa-print"></i> Print Laporan Transaksi</a>
    </div>
    <div>
        <h6>Jumlah Transaksi : <?= $total_transaksi ?></h6> 
        <table class= "table table-bordered table-hover table-striped text-center">
            <tr>
                <th>ID Transaksi</th>
                <th>ID Pegawai</th>
                <th>ID Pemesan</th>
                <th>Nama Pemesan</th>
                <th>Alamat</th>
                <th>Tanggal Pemesanan</th>
                <th>Status</th> 
                <th colspan ="2">Aksi</th> 
            </tr>

            <?php foreach ($laporan as $lpn): ?>
            <tr>
                <td><?php echo $lpn->id_transaksi ?></td>
                <td><?php echo $lpn->id_pegawai ?></td>
                <td><?php echo $lpn->id_pembeli ?></td>
                <td><?php echo $lpn->nama_pembeli ?></td>
                <td><?php echo $lpn->alamat_pembeli ?></td>
                <td><?php echo $lpn->tgl ?></td>
                <td><?php echo $lpn->status ?></td>
                <td><?php echo anchor('pegawai/laporan_controller/detail_laporan/'.$lpn->id_transaksi, '<div class="btn btn-sm btn-primary">Detail</div>') ?></td>
                <td><?php echo anchor('pegawai/laporan_controller/print_detail_pesanan/'.$lpn->id_transaksi, '<div class="btn btn-sm btn-warning">Print</div>') ?></td>
                
            </tr>

            <?php endforeach; ?>
        </table>
    </div>
    

</div>
