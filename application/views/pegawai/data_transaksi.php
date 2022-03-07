<div class="container-fluid">
  <div class="id">
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <div>
          <?php echo anchor('pegawai/transaksi_controller/index/', '<div class="btn btn-danger"><strong>Transaksi</strong></div>') ?>
        </div>

        <div class="topbar-divider d-none d-sm-block"></div>
        
        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline  ml-md-3 my-2 my-md-0 mw-100 navbar-search"
            method ="post" action="<?php echo base_url().'pegawai/transaksi_controller/search'?>">
                
            <div class="input-group">
                <input type="text" name="keyword" class="form-control bg-light border-0 small" placeholder="Search for..."
                  aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form> 

      </nav>
  </div>      
    <!-- Topbar Navbar -->

        
        <table class= "table table-bordered table-hover table-striped text-center">
            <tr>
                <th>ID Transaksi</th>
                <th>ID Pegawai</th>
                <th>ID Pemesan</th>
                <th>Nama Pemesan</th>
                <th>Alamat</th>
                <th>Tanggal Pemesanan</th>
                <th>Status</th> 
                <th colspan ="2">Aksi</th> 
            </tr>

            <?php foreach ($transaksi as $trans): ?>
            <tr>
                <td><?php echo $trans->id_transaksi ?></td>
                <td><?php echo $trans->id_pegawai ?></td>
                <td><?php echo $trans->id_pembeli ?></td>
                <td><?php echo $trans->nama_pembeli ?></td>
                <td><?php echo $trans->alamat_pembeli ?></td>
                <td><?php echo $trans->tgl ?></td>
                <td><?php echo $trans->status ?></td>
                <td><?php echo anchor('pegawai/transaksi_controller/view_detail_pesanan/'.$trans->id_transaksi, '<div class="btn btn-sm btn-primary">Detail</div>') ?></td>
                <td><?php echo anchor('pegawai/transaksi_controller/print_detail_pesanan/'.$trans->id_transaksi, '<div class="btn btn-sm btn-warning">Print</div>') ?></td>
            </tr>
            <?php endforeach;?>
        </table>

</div>