<div class="container-fluid col-md-8">
    <div class="card ">
        <h5 class = "card-header"><strong>Detail Pembeli</strong></h5>
        <div class="card-body">
            <div class="row">

                <?php foreach ($pembeli as $pbl) : ?>
                <div class="col-md-8">
                    <table class="table table-striped">
                        <tr>
                            <td>ID Pembeli</td>
                            <td><strong><?php echo $pbl->id_pembeli ?></strong></td>
                        </tr>
                        <tr>
                            <td>Nama Pembeli</td>
                            <td><strong><?php echo $pbl->nama_pembeli ?></strong></td>
                        </tr>
                        <tr>
                            <td>alamat</td>
                            <td><strong><?php echo $pbl->alamat_pembeli ?></strong></td>
                        </tr>
                    </table>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div> 
    <div class="mt-2 mb-2">
        <?php echo anchor('pegawai/pembeli_controller/', '<div class ="btn btn-primary">Go Back</div>') ?>
    </div>   
</div>


    