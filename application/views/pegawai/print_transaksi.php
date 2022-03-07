<html>
<head>
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Custom fonts for this template -->

    <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'> -->

     <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/clean-blog.min.css')?>" rel="stylesheet">
    <title>Rekapan Data Transaksi</title>
</head>
<body>
<div class="container-fluid">
    <h2 style ="text-align:center">Rekapan Data Transaksi</h2><hr><br>

    <h5>Jumlah Transaksi : <?= $total_transaksi ?></h5> 
    <table class="table table-bordered">
        <tr>
            <th>ID Transaksi</th>
            <th>ID Pegawai</th>
            <th>ID Pemesan</th>
            <th>Nama Pemesan</th>
            <th>Alamat</th>
            <th>Tanggal Pemesanan</th>
            <th>Status</th> 
        </tr>

        <?php 
        $no=1;
        foreach ($transaksi as $trs): ?>
            <tr>
                <td><?php echo $trs->id_transaksi ?></td>
                <td><?php echo $trs->id_pegawai ?></td>
                <td><?php echo $trs->id_pembeli ?></td>
                <td><?php echo $trs->nama_pembeli ?></td>
                <td><?php echo $trs->alamat_pembeli ?></td>
                <td><?php echo $trs->tgl ?></td>
                <td><?php echo $trs->status ?></td>
            </tr>
            <?php endforeach;?>
    </table>
    
    <script type="text/javascript">
        window.print();
    </script>

</div>
    
</body>

</html>