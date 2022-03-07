<div class="container-fluid">
    <h4>Laporan</h4>
    <br>

    <!-- Content Row -->
    <div class="row">

    <!-- Data Obat -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <?php echo anchor('pegawai/laporan_controller/data_obat/', '<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        <strong>Data Obat</strong></div>') ?>
                        
                        <div class="h6 mb-0 font-weight-bold text-gray-800"> <?= $total_obat ?> Obat</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-pills fa-2x text-danger-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pegawai -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <?php echo anchor('pegawai/laporan_controller/data_pegawai/', '<div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        <strong>Data Pegawai</strong></div>') ?>
                        
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pegawai ?> Pegawai</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-info-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Pembeli -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <?php echo anchor('pegawai/laporan_controller/data_pembeli/', '<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        <strong>Data Pembeli</strong></div>') ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pembeli ?> Pembeli</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-primary-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Supplier -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <?php echo anchor('pegawai/laporan_controller/data_supplier/', 
                    '<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        <strong>Data Supplier</strong></div>') ?>
                        
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$total_supplier?> Supplier</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-parachute-box fa-2x text-warning-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaksi -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <?php echo anchor('pegawai/laporan_controller/data_transaksi/', '<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        <strong>Data Transaksi</strong></div>') ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_transaksi ?> Transaksi</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-success-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    
</div>

<!-- Content Row
</div>

    <table class= "table table-bordered table-hover table-striped text-center">
        <tr>
            <th>ID Transaksi</th>
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
            <td><?php echo $lpn->id_pembeli ?></td>
            <td><?php echo $lpn->nama_pembeli ?></td>
            <td><?php echo $lpn->alamat_pembeli ?></td>
            <td><?php echo $lpn->tgl ?></td>
            <td><?php echo $lpn->status ?></td>
            <td><?php echo anchor('pegawai/laporan_controller/detail_laporan/'.$lpn->id_transaksi, '<div class="btn btn-sm btn-primary">Detail</div>') ?></td>
            <td><div class="btn btn-sm btn-warning">Print</div></td>
        </tr>

        <?php endforeach; ?>
    </table>

</div> -->