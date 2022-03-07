<div class="container-fluid col-md-8">
    <div class="card">
        <h5 class = "card-header"><strong>Detail Supplier</strong></h5>
        <div class="card-body">
            <div class="row">

                <?php foreach ($supplier as $sup) : ?>
                <div class="col-md-8">
                    <table class="table table-striped">
                        <tr>
                            <td>ID Supplier</td>
                            <td><strong><?php echo $sup->id_supplier ?></strong></td>
                        </tr>
                        <tr>
                            <td>Nama Supplier</td>
                            <td><strong><?php echo $sup->nama_supplier ?></strong></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><strong><?php echo $sup->alamat ?></strong></td>
                        </tr>
                    </table>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="mt-2 mb-2">
        <?php echo anchor('pegawai/supplier_controller/', '<div class ="btn btn-primary">Go Back</div>') ?>
    </div>
</div>

