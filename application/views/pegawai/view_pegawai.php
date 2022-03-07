<div class="container-fluid">
    <div class="card">
        <h5 class = "card-header"><strong>Detail Pegawai</strong></h5>
        <div class="card-body">
            <div class="row">

                <?php foreach ($pegawai as $pgw) : ?>
                <div class="col-md-4">
                    <img src="<?php echo base_url().'/uploads/'.$pgw->foto ?>" class="card-img-top" style="width: 300px">
                </div>
                <div class="col-md-8">
                    <table class="table table-striped">
                        <tr>
                            <td>ID Pegawai</td>
                            <td><strong><?php echo $pgw->id_pegawai ?></strong></td>
                        </tr>
                        <tr>
                            <td>Nama Pegawai</td>
                            <td><strong><?php echo $pgw->nama_pegawai ?></strong></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><strong><?php echo $pgw->email ?></strong></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><strong><?php echo $pgw->username ?></strong></td>
                        </tr>
                        
                    </table>
                </div>
                <?php endforeach; ?>
        </div>
    </div>  
    
</div>
<div class="mt-2">
    <?php echo anchor('pegawai/pegawai_controller/', '<div class ="btn btn-primary">Go Back</div>') ?>
</div>