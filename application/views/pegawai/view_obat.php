<div class="container-fluid">
    <div class="card">
        <h5 class = "card-header"><strong>Detail Obat</strong></h5>
        <div class="card-body">
            <div class="row">
                <?php foreach ($obat as $obt) : ?>
                <div class="col-md-4">
                    <img src="<?php echo base_url().'/uploads/'.$obt->gambar ?>" class="card-img-top">
                </div>

                <div class="col-md-8">
                    <table class="table table-striped">
                        <tr>
                            <td>Nama Obat</td>
                            <td><strong><?php echo $obt->nama_obat ?></strong></td>
                        </tr>
                        <tr>
                            <td>Manfaat</td>
                            <td><strong><?php echo $obt->manfaat ?></strong></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td><strong><?php echo $obt->kategori ?></strong></td>
                        </tr>
                        <tr>
                            <td>Konsumen</td>
                            <td><strong><?php echo $obt->konsumen ?></strong></td>
                        </tr>
                        <tr>
                            <td>Stock</td>
                            <td><strong><?php echo $obt->stock ?></strong></td>
                        </tr>
                        <tr>
                            <td>Harga Obat</td>
                            <td><strong><div class="btn btn-sm btn-danger">Rp. <?php echo number_format($obt->harga_obat, 0, '.','.') ?></div></strong></td>
                        </tr>
                        <tr>
                            <td>ID Supplier</td>
                            <td><strong><?php echo $obt->id_supplier ?></strong></td>
                        </tr>
                    </table>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="mt-2">
        <?php echo anchor('pegawai/obat_controller/', '<div class ="btn btn-primary">Go Back</div>') ?>
    </div>
    
</div>