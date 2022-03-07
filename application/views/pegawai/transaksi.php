<div class="container-fluid">
    <div class="id">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search
        <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <?php echo form_open('pegawai/transaksi_controller/search') ?>
            <div class="input-group">
                <input type="text" name="keyword" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        <?php echo form_close() ?>
        </form> -->

        <!-- Topbar Navbar -->
        
        <!--$keranjang = 'Keranjang Belanja' -->
        <div class="navbar mr-auto ml-md-3 my-2 my-md-0 mw-100">
            <ul class="nav navbar-nav">
                <li><?php echo 'ID Pegawai : '.$this->session->userdata('id_pegawai'); ?></li>
            </ul>
        </div>
        <div class="navbar">
            <ul class="nav navbar-nav navbar-right">
                <?php echo anchor('pegawai/transaksi_controller/data_transaksi/', '<div class="btn btn-sm btn-success"><strong>Lihat Data Transaksi</strong></div>') ?>
            </ul>
            <div class="topbar-divider d-none d-sm-block"></div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php $pesanan = 'Pesanan Obat : ' .$this->cart->total_items(). ' items'  ?>
                    <?php echo anchor('pegawai/transaksi_controller/detail_pesanan', $pesanan) ?>
                    
                </li>
                
            </ul>
        </div>
    </div>

    <div><h5>DAFTAR OBAT</h5></div>
    <div class = "row text-center mt-3 ">
        <?php foreach ($obat as $obt) : ?> 
            <div class="card ml-3 mb-3" style="width: 16rem;">
                <img class="card-img-top" src="<?php echo base_url().'/uploads/'.$obt->gambar?>" alt="Obat">
                <div class="card-body">
                    <h5 class="card-title mb-1"><?php echo $obt->nama_obat?></h5>
                    <small><?php echo $obt->manfaat?></small><br>
                    <span class="badge badge-danger mb-3">Rp. <?php echo number_format($obt->harga_obat, 0,'.','.')?></span><br>
                    <?php 
                        if($obt->stock != 0){ ?> 
                          <?php  echo anchor('pegawai/transaksi_controller/beli/'. $obt->id_obat, '<div class ="btn btn-sm btn-success">Beli</div>') ?>
                    <?php    }        ?>
                      
                    <?php echo anchor('pegawai/transaksi_controller/detail/'. $obt->id_obat, '<div class ="btn btn-sm btn-info">Detail</div>') ?>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>