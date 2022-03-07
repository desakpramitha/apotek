<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Custom fonts for this template -->

    <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'> -->

     <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/clean-blog.min.css')?>" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Print Detail</title>

</head>
<body>

<div class="container-fluid">
    <h4><div class= "text-center">Detail Pesanan</div></h4><br>
    <div class="btn btn-sm btn-warning mb-3">ID Pegawai : <?php echo $laporan->id_pegawai ?></div> <div class="btn btn-sm btn-success mb-3">No Transaksi : <?php echo $laporan->id_transaksi ?></div>


    <table class="table table-bordered table-hover table-striped text ">
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
            <td colspan="4" align="right">Grand Total</td>
            <td align="right">Rp. <?php echo number_format($total, 0,'.','.') ?></td>
        </tr>     
            
        
    </table>

    <div>
        <table class="table table-hover col-4">
            <tr>
                <td>Nama Pemesan</td>
                <td><?php echo $laporan->nama_pembeli ?></td>
                
            </tr>

            <tr>
                <td>Alamat Pemesan</td>
                <td><?php echo $laporan->alamat_pembeli ?></td>
            </tr>
        </table>
        </div>

    <script type="text/javascript">
        window.print();
    </script>
</div>

</body>
</html>