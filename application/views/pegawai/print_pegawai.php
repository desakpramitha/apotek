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
    <title>Rekapan Data Pegawai</title>
</head>
<body>
<div class="container-fluid">
    
    <h2 style ="text-align:center">Rekapan Data Pegawai</h2><hr><br>
    <h5>Jumlah Pegawai : <?= $total_pegawai ?></h5> 
    <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>ID Pegawai</th>
            <th>Nama Pegawai</th>
            <th>Email</th>
            <th>Username</th>
        </tr>

        <?php 
        $no=1;
            foreach($pegawai as $pgw) : ?>
            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo $pgw->id_pegawai?></td>
                <td><?php echo $pgw->nama_pegawai?></td>
                <td><?php echo $pgw->email?></td>
                <td><?php echo $pgw->username?></td>
            </tr>
            <?php endforeach;?>
    </table>

    <script type="text/javascript">
        window.print();
    </script>

</div>
    
</body>

</html>