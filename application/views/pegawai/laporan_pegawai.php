<div class="container-fluid">
    <div>
        <h4>Laporan Data Pegawai</h4> 
        <a class="btn btn-danger mb-3" href="<?php echo base_url('pegawai/pegawai_controller/print_pegawai')?>">
        <i class= "fa fa-print"></i> Print Laporan Pegawai</a>
    </div>
    <div>
    <h6>Jumlah Pegawai : <?= $total_pegawai ?></h6> 
        <table class= "table table-bordered table-hover table-striped text-center">
        <tr>
            <th>NO</th>
            <th>ID Pegawai</th>
            <th>Nama Pegawai</th>
            <th>Email</th>
            <th>Username</th>           
        </tr>

        <?php 
        $no=1;
            foreach($laporan as $pgw) : ?>
            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo $pgw->id_pegawai?></td>
                <td><?php echo $pgw->nama_pegawai?></td>
                <td><?php echo $pgw->email?></td>
                <td><?php echo $pgw->username?></td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
    

</div>
