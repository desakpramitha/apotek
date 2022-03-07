<div class="container-fluid">
    <h4>Detail Pesanan </h4>
    <div class="btn btn-sm btn-warning mb-3">ID Pegawai : <?php echo $laporan->id_pegawai ?></div> <div class="btn btn-sm btn-success mb-3">No Transaksi : <?php echo $laporan->id_transaksi ?></div>

    <table class="table table-bordered table-hover table-striped text">
        <tr>
            <th>ID Obat</th>
            <th>Nama Obat</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Sub Total</th>
        </tr>

        <?php 
            $total = 0;
            foreach ($pesanan as $psn):
                $subtotal = $psn->jumlah * $psn->harga;
                $total += $subtotal;
        ?>

        <tr>
            <td><?php echo $psn->id_obat ?></td>
            <td><?php echo $psn->nama_obat ?></td>
            <td><?php echo $psn->jumlah ?></td>
            <td><?php echo number_format($psn->harga, 0,'.','.') ?></td>
            <td><?php echo number_format($subtotal, 0,'.','.') ?></td>
        </tr>

        <?php endforeach;?>

        <tr>
            <td colspan="4" style="text-align:right;">Grand Total</td>
            <td style="text-align:right;">Rp. <?php echo number_format($total, 0,'.','.') ?></td>
        </tr>
        
        <table class="table table-hover col-lg-4">
            <tr>
                <td>Nama Pemesan</td>
                <td><?php echo $laporan->nama_pembeli ?></td>
                
            </tr>

            <tr>
                <td>Alamat Pemesan</td>
                <td><?php echo $laporan->alamat_pembeli ?></td>
            </tr>
        </table>
            

    </table>

    <a href="<?php echo base_url('pegawai/transaksi_controller/data_transaksi')?>"><div class="btn btn-sm btn-danger">Go Back</div></a>
</div>