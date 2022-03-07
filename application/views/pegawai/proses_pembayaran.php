<div class="controiner-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success">
                <?php 
                    $grandtotal = 0;
                    
                    if($pesanan = $this->cart->contents()){
                        foreach($pesanan as $items){
                            $grandtotal = $grandtotal + $items['subtotal'];
                        }

                        echo "<h5>Total Belanja : Rp. ".number_format($grandtotal, 0, '.','.');

                    
                ?>
            </div> <br><br>

                <!-- form data  -->
                <form method ="post" action="<?php echo base_url('pegawai/transaksi_controller/hitung') ?> ">

                    <h4>Input Pembayaran</h4><hr>
                    <!-- ID Pegawai -->
                    <div class="form-group">
                        <label for="">ID Pegawai <span style="color:red;">*</span></label>
                        <input type="text" name="id_pegawai" class="form-control" readonly value='<?php echo $this->session->userdata('id_pegawai'); ?>'>
                    </div>

                    <!-- Input Jumlah Bayar -->
                    <div class="form-group">
                        <label for="">Input pembayaran <span style="color:red;">*</span></label>
                        <input type="text" name="bayar" class="form-control" value='<?php echo $bayar ?>' required>
                    </div>

                    <!-- Kembalian -->
                    <div class="form-group">
                        <label for="">Kembalian <span style="color:red;">*</span></label>
                        <input type="text" name="kembali" class="form-control" readonly value='<?php echo $kembali ?>'>
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                    <label for="">Status<span style="color:red;">*</span></label>
                        <input type="text" name="status" class="form-control" readonly value='<?php echo $status?>'>
                    </div>
                    
                    <br>

                    <h4>Input Data Pembeli</h4><hr>
                    
                    <!-- Nama -->
                    <div class="form-group">
                        <label for="">Nama Lengkap<span style="color:red;">*</span></label>
                        <input type="text" name="nama_pembeli" class="form-control" >
                    </div>

                    <!-- Alamat -->
                    <div class="form-group">
                        <label for="">Alamat<span style="color:red;">*</span></label>
                        <input type="text" name="alamat_pembeli" class="form-control">
                    </div>

                    <button type= "submit" class="btn btn-sm btn-primary mb-3">Pesan</button>

                </form>

            <?php 
                } else {
                    echo "<h4> Belum melakukan pemesanan obat</h4>";
                }
            ?>


        </div>
        <div class="col-md-2"></div>
    </div>
</div>